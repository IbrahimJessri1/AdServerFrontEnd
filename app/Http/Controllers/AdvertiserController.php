<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    public function index(){
        return view('advertiser.index', [
            'data' => 'someData'
        ]);
    }
}
