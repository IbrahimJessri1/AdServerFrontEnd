<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');
        return view('homepage', [
            'username' => $username
        ]);
    }
}
