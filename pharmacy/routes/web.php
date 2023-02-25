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

Route::group(['middleware' => ['role:admin|cashier']], function () {    
    //customer
    Route::resource('/customers',App\Http\Controllers\CustomerController::class);
    Route::get('/api/customers', [App\Http\Controllers\CustomerController::class, 'api']);

    //transaction
    Route::get('/transaction/new', [App\Http\Controllers\SaleController::class, 'create'])->name('transaction.new');
    Route::post('/transaction/save', [App\Http\Controllers\SaleController::class, 'store'])->name('transaction.save');
    Route::get('/transaction/finish', [App\Http\Controllers\SaleController::class, 'finish'])->name('transaction.finish');
    Route::get('/transaction/receipt', [App\Http\Controllers\SaleController::class, 'receipt'])->name('transaction.receipt');
    Route::get('/transaction/{id}/data', [App\Http\Controllers\SaleDetailController::class, 'data'])->name('transaction.data');
    Route::get('/transaction/loadform/{diskon}/{total}/{receive}', [App\Http\Controllers\SaleDetailController::class, 'loadForm'])->name('transaction.load_form');
    Route::resource('/transaction', App\Http\Controllers\SaleDetailController::class)
    ->except('show','create','edit');

    //sale
    Route::get('/sales/data', [App\Http\Controllers\SaleController::class, 'data'])->name('sale.data');
    Route::get('/sales', [App\Http\Controllers\SaleController::class, 'index'])->name('sale.index');
    Route::get('/sales/{id}', [App\Http\Controllers\SaleController::class, 'show'])->name('sale.show');
    Route::delete('/sales/{id}', [App\Http\Controllers\SaleController::class, 'destroy'])->name('sale.destroy');

    //home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/home/spatie', [App\Http\Controllers\HomeController::class, 'spatie']);
});

Route::group(['middleware' => ['role_or_permission:admin|all access']], function () {
    //supplier
    Route::resource('/suppliers',App\Http\Controllers\SupplierController::class);
    Route::get('/api/suppliers', [App\Http\Controllers\SupplierController::class, 'api']);    

    //form
    Route::resource('/forms',App\Http\Controllers\FormController::class);
    Route::get('/api/forms', [App\Http\Controllers\FormController::class, 'api']);

    //classification
    Route::resource('/classifications',App\Http\Controllers\ClassificationController::class);
    Route::get('/api/classifications', [App\Http\Controllers\ClassificationController::class, 'api']);

    //item
    Route::resource('/items',App\Http\Controllers\ItemController::class);
    Route::get('/api/items', [App\Http\Controllers\ItemController::class, 'api']);
    Route::post('/items/delete-selected', [App\Http\Controllers\ItemController::class, 'deleteSelected'])->name('items.delete_selected');

    //purchase
    Route::get('/purchases/data', [App\Http\Controllers\PurchaseController::class, 'data'])->name('purchase.data');
    Route::get('/purchases/{id}/create', [App\Http\Controllers\PurchaseController::class, 'create'])->name('purchase.create');
    Route::resource('/purchases', App\Http\Controllers\PurchaseController::class)
    ->except('create');

    //purchase detail
    Route::get('/purchases_details/{id}/data', [App\Http\Controllers\PurchasesDetailController::class, 'data'])->name('purchase_detail.data');
    Route::get('/purchases_details/loadform/{diskon}/{total}', [App\Http\Controllers\PurchasesDetailController::class, 'loadForm'])->name('purchase_detail.load_form');
    Route::resource('/purchases_details', App\Http\Controllers\PurchasesDetailController::class)
    ->except('create', 'show', 'edit');

    //report
    Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
    Route::get('/report/data/{first}/{last}', [App\Http\Controllers\ReportController::class, 'data'])->name('report.data');
    Route::get('/report/data/pdf/{first}/{last}', [App\Http\Controllers\ReportController::class, 'exportPDF'])->name('report.export_pdf');

    //stock out
    Route::resource('/stock_outs',App\Http\Controllers\StockOutController::class)->except('destroy');
    Route::get('/api/stock_outs', [App\Http\Controllers\StockOutController::class, 'api']);
    Route::delete('/stock_outs/{id}', [App\Http\Controllers\StockOutController::class, 'destroy'])->name('stock_outs.destroy');
});

    

