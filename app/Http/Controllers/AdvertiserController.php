<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class AdvertiserController extends Controller
{
    public function dashboard(Request $request){
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');

        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertisement/get_stats';
            $response = Http::withToken($jwt)->get($url);
            if($response->successful()){
                return view('advertiser.dashboard', [
                    "username" => $username,
                    "simpleheader" => true,
                    "data" => $response->json()
                ]);
            }
            else if($response->status() == 401)
                return redirect('/login')->with('info-message', 'You need to be logged in!'); 
            else
                return back()->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            return back()->with('error-message', 'Something went wrong!');
        }
    }


    public function get_my_ads(Request $request){
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');
        $data = [];

        $skip = 0;
        $limit = 5;
        $interactive = 2;
        $type = "all";
        $shape = "all";
        if($request->ajax()){
            if(isset($request->skip)){
                $skip = $request->skip;
            }
            if(isset($request->limit))
                $limit = $request->limit;
            if(isset($request->interactive))
                $interactive = $request->interactive;
            if(isset($request->type))
                $type = $request->type;
            if(isset($request->shape))
                $shape = $request->shape;
        }
        
        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertisement/my_ads';
            $response = Http::withToken($jwt)->get($url, ["interactive" => $interactive, "skip" => $skip, "limit" => $limit, "type" => $type, "shape" => $shape]);
            if($response->status() == 200){
                if($request->ajax()){
                    $data = $response->json();
                    // if(empty($data)){
                    //     return response()->json(["html" => "nothing"]);
                    // }
                    $view = view('advertiser.ad-cards', compact('data'))->render();
                    return response()->json(["html" => $view]);
                }
                $data = $response->json();
            }
            else if($response->status() == 401)
                return redirect('/login')->with('info-message', 'You need to be logged in!'); 
            else
                return back()->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            return back()->with('error-message', 'Something went wrong!');
        }


        

        return view('advertiser.myads', [
            "username" => $username,
            "simpleheader" => true,
            "data" => $data
        ]);
    }

    public function show_create(){
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');
        return view('advertiser.create-ad', [
            "username" => $username,
            "simpleheader" => true
        ]);
        
    }

    public function store(Request $request){
        // dd($request);
        $formFields = $request->validate([
            'type' => ['required',Rule::in(['image', 'gif', 'video'])],
            'shape' => ['required', Rule::in(['rectangular', 'horizontal', 'vertical'])],
            'width' => 'required',
            'height' => 'required',
            'url' => 'required',
            'target_gender' => ['required',Rule::in(['both', 'male', 'female'])],
            'language' => ['required',Rule::in(['any', 'en', 'ar'])],
            'raise_percentage' => 'required',
            'max_cpc' => 'required',
            'categories' => 'required',
            'target_age' => 'required'
        ]);

        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');



        $age = explode(',', $request->target_age);
        $location = "any";
        if($request->location !== null)
            $location = $request->location;
        
        $user_info = ["age" => $age, "location" => $location, "gender" => $request->target_gender, "language" => $request->language];
        // dd(json_encode($user_info));
        $max_cpc = floatval($request->max_cpc);
        $raise_percentage = floatval($request->raise_percentage);
        $text = "";
        if($request->text !== null)
            $text =$request->text;
        $type = $request->type;
        $shape = $request->shape;
        $width = intval($request->width);
        $height = intval($request->height);
        $url = $request->url;
        $redirect_url = "";
        if($request->redirect_url !== null)
            $redirect_url = $request->redirect_url;
        $categoires = explode(',', $request->categories);
        $keywords = [];
        if($request->keywords !== null)
            $keywords = explode('#', $request->keywords);
        
        $data = [
            "target_user_info" => $user_info,
            "max_cpc" => $max_cpc,
            "type" => $type,
            "categories" => $categoires,
            "url" => $url,
            "raise_percentage" => $raise_percentage,
            "keywords" => $keywords,
            "text" => $text,
            "width" => $width,
            "height" => $height,
            "shape" => $shape
        ];
        if($redirect_url != "")
            $data["redirect_url"] = $redirect_url;
        
        // dd($data);
        try{
            $jwt = $request->cookie('jwt');
            $ad_url = '/advertisement/create_ad';
            if(isset($data['redirect_url']))
                $ad_url = '/advertisement/create_interactive_ad';
            $create_url = Config::get('app.adserver_url') . $ad_url;
            $response = Http::withToken($jwt)->post($create_url, $data);
            if($response->successful()){
                return redirect('/advertiser/create')->with('success-message', 'Advertisement Created Successfully!'); 
            }
            else if($response->status() == 401)
                return redirect('/login')->with('info-message', 'You need to be logged in!'); 
            else
                return back()->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            return back()->with('error-message', 'Something went wrong!');
        }
    }

    public function show_ad(Request $request){
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');

        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertisement/' .$request->id;
            $response = Http::withToken($jwt)->get($url);
            $res = $response->json();
            if($res['target_user_info']['age'] == ['all ages'])
                $res['target_user_info']['age'] = ['kids', 'youths','adults', 'old'];
            if($response->successful()){
                return view('advertiser.ad-show', [
                    "username" => $username,
                    "simpleheader" => true,
                    "ad" => $res
                ]);
            }
            else if($response->status() == 401)
                return redirect('/login')->with('info-message', 'You need to be logged in!'); 
            else
                return back()->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            return back()->with('error-message', 'Something went wrong!');
        }

    }



    public function update(Request $request){
        // dd($request->id);
        // dd($request);
        $formFields = $request->validate([
            'shape' => ['required', Rule::in(['rectangular', 'horizontal', 'vertical'])],
            'width' => 'required',
            'height' => 'required',
            'target_gender' => ['required',Rule::in(['both', 'male', 'female'])],
            'language' => ['required',Rule::in(['any', 'en', 'ar'])],
            'raise_percentage' => 'required',
            'max_cpc' => 'required',
            'categories' => 'required',
            'target_age' => 'required'
        ]);

        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');



        $age = explode(',', $request->target_age);
        $location = "any";
        if($request->location !== null)
            $location = $request->location;
        
        $user_info = ["age" => $age, "location" => $location, "gender" => $request->target_gender, "language" => $request->language];
        // dd(json_encode($user_info));
        $max_cpc = floatval($request->max_cpc);
        $raise_percentage = floatval($request->raise_percentage);
        $text = "";
        if($request->text !== null)
            $text =$request->text;
        $type = $request->type;
        $shape = $request->shape;
        $width = intval($request->width);
        $height = intval($request->height);
        $categoires = explode(',', $request->categories);
        $keywords = [];
        if($request->keywords !== null)
            $keywords = explode('#', $request->keywords);
        
        $data = [
            "id" => $request->id,
            "target_user_info" => $user_info,
            "max_cpc" => $max_cpc,
            "type" => $type,
            "categories" => $categoires,
            "raise_percentage" => $raise_percentage,
            "keywords" => $keywords,
            "text" => $text,
            "width" => $width,
            "height" => $height,
            "shape" => $shape
        ];
        // dd($data);
        try{
            $jwt = $request->cookie('jwt');
            $create_url = Config::get('app.adserver_url') . '/advertisement/';
            $response = Http::withToken($jwt)->put($create_url, $data);
            if($response->successful()){
                return back()->with('success-message', 'Advertisement Updated Successfully!'); 
            }
            else if($response->status() == 401)
                return redirect('/login')->with('info-message', 'You need to be logged in!'); 
            else
                return back()->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            return back()->with('error-message', 'Something went wrong!');
        }
    }


    public function show_serve(Request $request){
        
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');
        $data = [];

        $skip = 0;
        $limit = 5;
        if($request->ajax()){
            
            if(isset($request->skip)){
                $skip = $request->skip;
            }
            if(isset($request->limit))
                $limit = $request->limit;
        }
        
        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertisement/my_served_ads';
            $response = Http::withToken($jwt)->get($url, ["skip" => $skip, "limit" => $limit]);
            if($response->status() == 200){
                if($request->ajax()){
                    $data = $response->json();
                    $view = view('advertiser.ad-served-cards', compact('data'))->render();
                    return response()->json(["html" => $view]);
                }
                $data = $response->json();
            }
            else if($response->status() == 401)
                return redirect('/login')->with('info-message', 'You need to be logged in!'); 
            else
                return back()->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            return back()->with('error-message', 'Something went wrong!');
        }


        return view('advertiser.served', [
            "username" => $username,
            "simpleheader" => true,
            "data" => $data
        ]);
    }


    public function ad_enable(Request $request){
        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertisement/enable/'. $request->id;
            $response = Http::withToken($jwt)->post($url);
        }
        catch(Exception $e){
            dd($request);
        }
    }

    public function pay_served_ad(Request $request){
        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertisement/pay/'. $request->id;
            $response = Http::withToken($jwt)->post($url);
            if($response->status() == 200){
                return back()->with('success-message', 'paid successfully!');
            }
            else if($response->status() == 401)
                return redirect('/login')->with('info-message', 'You need to be logged in!'); 
            else
                return back()->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            return back()->with('error-message', 'Something went wrong!'); 
        }
    }

    public function pay_tot_charges(Request $request){
        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertisement/pay_tot_charges/'. $request->id;
            $response = Http::withToken($jwt)->post($url);
            if($response->status() == 200){
                return back()->with('success-message', 'paid successfully!');
            }
            else if($response->status() == 401)
                return redirect('/login')->with('info-message', 'You need to be logged in!'); 
            else
                return back()->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            return back()->with('error-message', 'Something went wrong!'); 
        }
    }

}
