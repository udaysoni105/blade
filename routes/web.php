<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

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

Route::get('/test', function () {
    return view('test');
});


//Filestorage
Route::get('/upload', function () {
    return view('upload');
});

Route::post('upload', [ContactController::class, 'upload']);


Route::get('form', [productController::class, 'form']);
Route::post('form', [productController::class, 'store']);


Route::get('/test', [ProductController::class, 'index']);
Route::post('/test', [ProductController::class, 'store']);
Route::get('/test/view', [ProductController::class, 'view']);


Route::get('product', [productController::class, 'index']);
Route::post('product/delete/{product}', [ProductController::class, 'delete'])->name('delete');
Route::post('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::get('product/get', [ProductController::class, 'getproduct'])->name('get.product');
Route::get('product/{id}',[productController::class,'show']);

// Your login logic here
Route::get('/login', function () {
})->name('login');
Route::get('/register', function () {
})->name('register');


