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

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'username' => ['required', 'min:4'],
            'password' => 'required'
        ]);

        $url = Config::get('app.adserver_url') . '/login';
        try{
            $response = Http::asForm()->post($url, $formFields);
            if($response->successful()){
                // Config::set('app.username', $formFields["username"]);
                $request->session()->put('username', $formFields["username"]);
                $cookie_exp = time() + 3600 * 5;
                $jwt = $response->json()["access_token"];
                setcookie("jwt", $jwt, $cookie_exp);
                return redirect('/')->with('success-message', 'You are logged in now!');
            }
            else{
                return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
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
}
