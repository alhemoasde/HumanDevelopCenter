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
use App\Models\Events;

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

/* Route::get('/', function () {
    $users = User::where('profile','=','Speaker')
    ->where('status','=','1')->get();
    $event = Events::where('status','=','Programado')->where('active','=','1')->orWhere('status','=','En Desarrollo')->first();
    return view('intro', compact(['users', 'event']));
}); */

Route::get('/donation', function(){
    return view('donation');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('admin');

Route::get('/player/{email}', [App\Http\Controllers\HomeController::class, 'indexSuscriptor'])->name('player');
Route::get('/download/{id}', [App\Http\Controllers\HomeController::class, 'downloadProduct'])->name('download');

Route::resource('users', App\Http\Controllers\UserController::class)->middleware('admin')->except('show');
Route::get('/speaker/{id}', [App\Http\Controllers\UserController::class, 'showProfile'])->name('users.show');

Route::resource('contacts', App\Http\Controllers\ContactsController::class)->except(['create','store','edit','update','destroy'])->middleware('admin');
Route::get('/', [App\Http\Controllers\ContactsController::class, 'create'])->name('contacts.create');
Route::post('/contacts-store', [App\Http\Controllers\ContactsController::class, 'store'])->name('contacts.store');

Route::resource('bussiness', App\Http\Controllers\BussinessController::class)->middleware('admin')->except('destroy','show');

Route::resource('events', App\Http\Controllers\EventsController::class)->middleware('admin');

Route::resource('eventActivitys', App\Http\Controllers\EventActivitysController::class)->except('index','create')->middleware('admin');
Route::get('/activity-list/{event}', [App\Http\Controllers\EventActivitysController::class, 'index'])->name('activitys.index')->middleware('admin');
Route::get('/activity-create/{event}', [App\Http\Controllers\EventActivitysController::class, 'create'])->name('activitys.create')->middleware('admin');

Route::resource('products', App\Http\Controllers\ProductController::class)->middleware('admin');

Route::resource('videos', App\Http\Controllers\VideosController::class)->middleware('admin');

Route::resource('subscribers', App\Http\Controllers\SubscriberController::class)->except(['create','store'])->middleware('admin');
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
Route::get('/update-checkout/{ref_transaction}', [App\Http\Controllers\CartController::class, 'updateCheckout'])->name('updateCheckout')->middleware('admin');
Route::post('/saveCart', [App\Http\Controllers\CartController::class, 'saveCart'])->name('saveCart');


Route::get('/view-day/{day}', [App\Http\Controllers\CartController::class, 'viewDay'])->name('cart.shopDay');


Route::get('/response', function(){
    return response('Confirmación Recibida', 200)->header('success', true);
});