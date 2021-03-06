<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [ProductController::class, 'index']);
Route::get('detail/{id}', [ProductController::class, 'show']);
Route::get('search', [ProductController::class, 'search']);
Route::post('add-to-cart', [ProductController::class, 'addToCart']);
Route::get('cart-list', [ProductController::class, 'cartList']);
Route::get('remove-cart/{id}', [ProductController::class, 'removeCart']);
Route::get('order-now', [ProductController::class, 'orderNow']);
Route::post('order-place', [ProductController::class, 'orderPlace']);
Route::get('my-orders', [ProductController::class, 'myOrders']);

Route::view('register', 'register');
Route::get('login', function () {
    return view('login');
});
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('logout', function () {
    Session::forget('user');
    return redirect('/login');
});
