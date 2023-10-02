<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/{product_id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product-edit');
Route::put('/products/{product_id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product-update');
Route::get('/products-create', [\App\Http\Controllers\ProductController::class, 'create']);
Route::post('/products-store', [\App\Http\Controllers\ProductController::class, 'store'])->name('product-store');
Route::post('/products-export', [\App\Http\Controllers\ProductController::class, 'export'])->name('products-export');
