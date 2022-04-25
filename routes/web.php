<?php

/*
|--------------------------------------------------------------------------
| Web Autor Data
|--------------------------------------------------------------------------
|
| @autor: Alejandro Herrera Montilla.
| @data: marzo de 2022.
| contact: 
| @telephone: (057) 320 829 2559
| @email: alhemoasde@gmail.com
| @linkedin: https://www.linkedin.com/in/alhemoasde/
|
*/

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

Route::resource('products', App\Http\Controllers\ProductController::class)->middleware('auth');

/**
 * Rutas Cart
 */
Route::get('/shop', [App\Http\Controllers\CartController::class, 'shop'])->name('shop');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.store');
Route::post('/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::get('checkout', [App\Http\Controllers\CartController::class, 'checkout']);
