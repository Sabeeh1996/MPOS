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
Route::resource('products','App\Http\Controllers\ProductController');
Route::resource('suppliers','App\Http\Controllers\SupplierController');
//Route::resource('suppliers\create','App\Http\Controllers\SupplierController\create');
//Route::resource('suppliers/create','App\Http\Controllers\SupplierController@create');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/suppliers/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('suppliers.create');
//Route::get('/suppliers/create', 'SupplierController@create')->name('supplier');