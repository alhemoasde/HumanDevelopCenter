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
| @version: 1.0
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    $users = User::where('profile','=','Speaker')
    ->where('status','=','1')->get();
    return view('intro', compact('users'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth')->except('show');
Route::get('/speaker/{id}', [App\Http\Controllers\UserController::class, 'showProfile'])->name('users.show');

Route::resource('contacts', App\Http\Controllers\ContactsController::class)->except(['create','store','edit','update','destroy'])->middleware('auth');
Route::get('/contacts-create', [App\Http\Controllers\ContactsController::class, 'create'])->name('contacts.create');
Route::post('/contacts-store', [App\Http\Controllers\ContactsController::class, 'store'])->name('contacts.store');

Route::resource('bussiness', App\Http\Controllers\BussinessController::class)->middleware('auth')->except('destroy','show');

Route::resource('events', App\Http\Controllers\EventsController::class)->middleware('auth');

Route::resource('products', App\Http\Controllers\ProductController::class)->middleware('auth');

Route::resource('videos', App\Http\Controllers\VideosController::class)->middleware('auth');

Route::resource('subscribers', App\Http\Controllers\SubscriberController::class)->except(['create','store'])->middleware('auth');
Route::get('/subscriber-create', [App\Http\Controllers\SubscriberController::class, 'create'])->name('subscribers.create');
Route::get('/subscriber-welcome', [App\Http\Controllers\SubscriberController::class, 'welcome'])->name('subscribers.welcome');
Route::post('/subscriber-store', [App\Http\Controllers\SubscriberController::class, 'store'])->name('subscribers.store');



/**
 * Rutas Cart
 */
Route::get('/shop', [App\Http\Controllers\CartController::class, 'shop'])->name('shop');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.store');
Route::post('/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
