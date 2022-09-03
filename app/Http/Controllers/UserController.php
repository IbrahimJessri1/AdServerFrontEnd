<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(){
        return view("user.login", ["footer" => false, "simpleheader" => true]);
    }
    public function register(){
        return view("user.login", ["footer" => false, "simpleheader" => true]);
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'username' => ['required', 'min:4'],
            'password' => 'required'
        ]);

        $url = Config::get('app.adserver_url') . '/login';
        try{
            $response = Http::asForm()->post($url, $formFields);
            if($response->successful()){
                $request->session()->put('username', $formFields["username"]);
                $cookie_exp = time() + 3600 * 5;
                $jwt = $response->json()["access_token"];
                return redirect('/')->with('success-message', 'You are logged in now!')->withCookie('jwt', $jwt, $cookie_exp);
            }
            else{
                return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
            }
        }
        catch(Exception $e){
            return back()->with('error-message', "something went wrong.. try again later");
        }

    }

    public function create(Request $request){
        $formFields = $request->validate([
            'username' => ['required', 'min:3'],
            'password' => 'required|confirmed|min:8',
            'membership' => 'required'
        ]);
        try{
            $url = Config::get('app.adserver_url') . '/advertiser/signup';
            $response = Http::post($url, $formFields);
            if($response->successful()){
                $url = Config::get('app.adserver_url') . '/login';
                unset($formFields['membership']);
                $response = Http::asForm()->post($url, $formFields);
                if($response->successful()){
                    $request->session()->put('username', $formFields["username"]);
                    $cookie_exp = time() + 3600 * 5;
                    $jwt = $response->json()["access_token"];
                    return redirect('/')->with('success-message', 'You are logged in now!')->withCookie('jwt', $jwt, $cookie_exp);
                }
                else{
                    return back()->with('error-message', "Account created but couldn't log in");
                }
            }
            else{
                return back()->with('error-message', 'Something went wrong!');
            }
        }
        catch(Exception $e){
            return back()->with('error-message', "something went wrong.. try again later");
        }
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('warning-message', 'You have been logged out!');
    }

    public function show_manage_account(Request $request){
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');

        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertiser/';
            $response = Http::withToken($jwt)->get($url);
            if($response->successful()){
               $user = $response->json();
            }
            else{
                return back()->with('error-message', 'something went wrong');
            }
        }
        catch(Exception $e){
            return back()->with('error-message', "something went wrong.. try again later");
        }


        return view("user.manage_account", ["username" => $username, "footer" => false, "simpleheader" => true, "user" => $user]);
    }

    public function update_account(Request $request){
        $formFields = $request->validate([
            'password' => 'confirmed',
            'membership' => 'required'
        ]);
        if($request->password == null)
            unset($formFields['password']);
        
        try{
            $jwt = $request->cookie('jwt');
            $url = Config::get('app.adserver_url') . '/advertiser/account';
            $response = Http::withToken($jwt)->put($url, $formFields);
            if($response->successful()){
                return back()->with('success-message', 'Account Changed Successfully');
            }
            else{
                return back()->with('error-message', 'something went wrong');
            }
        }
        catch(Exception $e){
            return back()->with('error-message', "something went wrong.. try again later");
        }

    }
}
