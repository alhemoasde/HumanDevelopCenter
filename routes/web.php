<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('intro');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('contacts', App\Http\Controllers\ContactsController::class)->except(['edit','update','destroy']);

Route::resource('bussiness', App\Http\Controllers\BussinessController::class)->middleware('auth')->except('destroy','show');

Route::resource('events', App\Http\Controllers\EventsController::class)->middleware('auth');
