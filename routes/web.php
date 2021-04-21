<?php

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

Route::get('/', [\App\Http\Controllers\FrontController::class, 'index'])->name('front-home');
Route::get('/menu', [\App\Http\Controllers\FrontController::class, 'menu'])->name('front-menu');
Route::get('/about', [\App\Http\Controllers\FrontController::class, 'about'])->name('front-about');
Route::get('/slider',function (){ return view('front.slider');});



Auth::routes();

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.main');
    Route::resource('/menus', App\Http\Controllers\MenuController::class);
    Route::resource('statuses', App\Http\Controllers\StatusController::class);
    Route::resource('orders', App\Http\Controllers\OrderController::class);
});

Route::get('cart', [App\Http\Controllers\FrontController::class,'cart'])->name('cart');
Route::get('order', [App\Http\Controllers\FrontController::class,'createOrder'])->name('order');
Route::get('ordering', [App\Http\Controllers\FrontController::class,'ordering'])->name('ordering');

Route::get('add-to-cart/{id}', [App\Http\Controllers\FrontController::class,'addToCart']);

Route::patch('update-cart', [App\Http\Controllers\FrontController::class,'update']);

Route::delete('remove-from-cart', [App\Http\Controllers\FrontController::class,'remove']);


