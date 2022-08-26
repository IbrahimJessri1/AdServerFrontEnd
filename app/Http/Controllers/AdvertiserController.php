<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class AdvertiserController extends Controller
{
    public function dashboard(){
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');
        return view('advertiser.dashboard', [
            "username" => $username,
            "simpleheader" => true
        ]);
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
                return redirect('/advertiser/dashboard')->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            return redirect('/advertiser/dashboard')->with('error-message', 'Something went wrong!');
        }


        

        return view('advertiser.myads', [
            "username" => $username,
            "simpleheader" => true,
            "data" => $data
        ]);
    }

    public function create(){
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');
        return view('advertiser.create', [
            "username" => $username,
            "simpleheader" => true
        ]);
    }
}
