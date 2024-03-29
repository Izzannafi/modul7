<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/product/(slug}', [App\Http\Controllers\HomeController::class, ' detail'])->name('detail');
Route::get('/lacak', [App/Http/Controllers\User\DashboardController::class, 'lacak'])->name('cekresi');

Route::middleware(['auth', 'role: user, admin', 'dontback'])->group(function() {
    Route::post('/', [App\Http\Controllers\HomeController::class, 'cart'])->name('addtocart');
    Route::get('/cart', [App/Http/Controllers\HomeController::class, 'showcart'])->name('cart');
    Route::get('/cart/{id}', [App\Http\Controllers\HomeController::class, 'deletecart'])->name('cartDelete');
    Route::get('/payment', [App/Http/Controllers\HomeController::class, 'payment'])->name('pay');
    Route::get('/invoice/{id}', [App\Http\Controllers\HomeController::class, 'invoice'])->name('inv');
    Route::get('/dashboard', [App/Http/Controllers\User\DashboardController::class, 'index'])->name('dashboard');
});