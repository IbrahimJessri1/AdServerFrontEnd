<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

Route::get('/', [HomeController::class, 'index']);


Route::get('/login', [UserController::class, 'login'])->name('login');


Route::post('/user/authenticate', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('authcheck');

Route::get('/advertiser/dashboard', [AdvertiserController::class, 'dashboard'])->middleware('authcheck');

Route::get('/advertiser/ads', [AdvertiserController::class, 'get_my_ads'])->middleware('authcheck');

Route::get('/advertiser/create', [AdvertiserController::class, 'create'])->middleware('authcheck');


