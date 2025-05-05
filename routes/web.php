<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\categoryProduct;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\productcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [authcontroller::class, 'showlogin'])->name('login');
Route::post('/logout', [authcontroller::class, 'logout'])->name('logout');
Route::post('/login', [authcontroller::class, 'login'])->name('login');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');
    Route::get('/produk', [productcontroller::class, 'index'])->name('produk');
    Route::get('/categoryProduct', [categoryProduct::class, 'index'])->name('category');
});