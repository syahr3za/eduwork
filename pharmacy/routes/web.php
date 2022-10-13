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


//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//supplier
Route::resource('/suppliers',App\Http\Controllers\SupplierController::class);
Route::get('/api/suppliers', [App\Http\Controllers\SupplierController::class, 'api']);

//customer
Route::resource('/customers',App\Http\Controllers\CustomerController::class);
Route::get('/api/customers', [App\Http\Controllers\CustomerController::class, 'api']);

//form
Route::resource('/forms',App\Http\Controllers\FormController::class);
Route::get('/api/forms', [App\Http\Controllers\FormController::class, 'api']);

//classification
Route::resource('/classifications',App\Http\Controllers\ClassificationController::class);
Route::get('/api/classifications', [App\Http\Controllers\ClassificationController::class, 'api']);

//item
Route::resource('/items',App\Http\Controllers\ItemController::class);
Route::get('/api/items', [App\Http\Controllers\ItemController::class, 'api']);

//sale
Route::resource('/sales',App\Http\Controllers\SaleController::class);

//purchase
Route::resource('/purchases',App\Http\Controllers\PurchaseController::class);
Route::get('/api/purchases', [App\Http\Controllers\PurchaseController::class, 'api']);

//stock out
Route::resource('/stock_outs',App\Http\Controllers\StockOutController::class);
