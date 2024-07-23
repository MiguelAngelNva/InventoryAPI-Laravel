<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'ProductController@index'])->name("index");
Route::post('/products', [ProductController::class, 'ProductController@registerProduct'])->name('registerProduct');
Route::put('/products/{id}', [ProductController::class, 'ProductController@editProduct'])->name('editProduct');
Route::post('/deleteProduct/{id}', [ProductController::class, 'ProductController@deleteProduct'])->name('deleteProduct');