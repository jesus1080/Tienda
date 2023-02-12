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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil');

Route::post('/perfil', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');

Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');

Route::post('/products/create', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

Route::patch('product/{id}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');

Route::delete('products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

