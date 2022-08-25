<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AdvertiserController extends Controller
{
    public function dashboard(){
        $username = "";
        if (session()->has('username'))
            $username = session()->get('username');
        return view('advertiser.dashboard', [
            "username" => $username,
            "simple_header" => true
        ]);
    }
}
