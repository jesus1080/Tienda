<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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
    $products = Product::all();
    return view('home', compact('products'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//perfil 

Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil');

Route::post('/perfil', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update');



Route::middleware(['product.gestion'])->group(function () {

    //products
    
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/products/create', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::patch('product/{id}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
    //pago
   
    Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'index'])->name('pay.index');
    Route::patch('/payment/{id}', [App\Http\Controllers\PaymentController::class, 'toDeliver'])->name('payments.update');
 });
//cart

Route::get('/add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

//pago
Route::get('/pay', [App\Http\Controllers\PaymentController::class, 'processPayment'])->name('pay');

//users
Route::middleware(['cuentas.gestion'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    Route::patch('/user/{id}', [App\Http\Controllers\UserController::class, 'updateRol'])->name('user.update');
    Route::patch('/user/{id}/update', [App\Http\Controllers\UserController::class, 'userSupervisor'])->name('user.supervisor');
});











