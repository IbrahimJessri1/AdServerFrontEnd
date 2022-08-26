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
        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertisement/my_ads';
            $response = Http::withToken($jwt)->get($url, ["interactive" => 1]);
            
            if($response->status() == 200)
                $data = $response->json();
            else if($response->status() == 401)
                return redirect('/login')->with('info-message', 'You need to be logged in!'); 
            else
                return redirect('/advertiser/dashboard')->with('error-message', 'Something went wrong!'); 
        }
        catch(Exception $e){
            dd($e);
            return redirect('/advertiser/dashboard')->with('error-message', 'Something went wrong!');
        }
        return view('advertiser.myads', [
            "username" => $username,
            "simpleheader" => true,
            "data" => $data
        ]);
    }
}
