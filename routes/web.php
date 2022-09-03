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



Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/register', [UserController::class, 'register']);

Route::post('/register', [UserController::class, 'create']);

Route::get('/manage_account', [UserController::class, 'show_manage_account']);

Route::post('/manage_account', [UserController::class, 'update_account']);

Route::post('/user/authenticate', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('authcheck');

Route::get('/advertiser/dashboard', [AdvertiserController::class, 'dashboard'])->middleware('authcheck');

Route::get('/advertiser/ads', [AdvertiserController::class, 'get_my_ads'])->middleware('authcheck');

Route::get('/advertiser/create', [AdvertiserController::class, 'show_create'])->middleware('authcheck');

Route::post('/advertiser/create', [AdvertiserController::class, 'store'])->middleware('authcheck');

Route::get('/advertiser/served', [AdvertiserController::class, 'show_serve'])->middleware('authcheck');

Route::get('/advertiser/enable', [AdvertiserController::class, 'ad_enable'])->middleware('authcheck');

Route::get('/advertiser/ad/{id}', [AdvertiserController::class, 'show_ad'])->middleware('authcheck');

Route::POST('/advertiser/update/{id}', [AdvertiserController::class, 'update'])->middleware('authcheck');

Route::get('/advertiser/pay_served_ad/{id}', [AdvertiserController::class, 'pay_served_ad'])->middleware('authcheck');

Route::get('/advertiser/pay_tot_charges/{id}', [AdvertiserController::class, 'pay_tot_charges'])->middleware('authcheck');