<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Sales\OrderController;

use App\Http\Controllers\Purchases\PurchasesController;

use App\Http\Controllers\MoneyReceiptController;

use App\Http\Controllers\Sales\CustomerController;
use App\Http\Controllers\Sales\SaleController;
use App\Http\Controllers\Sales\SalesDetailsController;
use App\Http\Controllers\Purchases\SupplierController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\EmployeeSalaryController;

use App\Http\Controllers\Inventory\RawMaterialController;
use App\Http\Controllers\Inventory\StockController;
use App\Http\Controllers\Inventory\FinishedGoodsController;
use App\Http\Controllers\ProductionController;



Route::get('/', function () {

  
    return view('pages.home');
});

// Product

Route::get('/products/{id}/confirm',[ProductController::class,'confirm']);
Route::resource('products',productController::class);

// Order


Route::get('/orders/{id}/confirm',[OrderController::class,'confirm']);
Route::resource('orders',OrderController::class);




Route::get('/customers/{id}/confirm',[CustomerController::class,'confirm']);
Route::resource('customers',CustomerController::class);


Route::get('/sales/{id}/confirm',[saleController::class,'confirm']);
Route::resource('sales',SaleController::class);


Route::get('/purchases/{id}/confirm',[purchasesController::class,'confirm']);
Route::get('/purchases/due',[purchasesController::class,'due']);
Route::resource('purchases',purchasesController::class);


Route::get('/suppliers/{id}/confirm',[SupplierController::class,'confirm']);
Route::get('/suppliers/{id}/history',[SupplierController::class,'history']);

Route::resource('suppliers',SupplierController::class);


Route::get('/rawMaterials/{id}/confirm',[RawMaterialController::class,'confirm']);
Route::resource('rawMaterials',RawMaterialController::class);

Route::get('/finishedGoods/{id}/confirm',[FinishedGoodsController::class,'confirm']);
Route::resource('finishedGoods',FinishedGoodsController::class);


Route::get('/productions/{id}/confirm',[ProductionController::class,'confirm']);
Route::get('/productions/productionReport',[ProductionController::class,'productionReport']);
Route::resource('productions',ProductionController::class);


Route::get('/stocks/{id}/confirm',[StockController::class,'confirm']);
Route::resource('stocks',StockController::class);

Route::get('/mrs/{id}/confirm',[MoneyReceiptController::class,'confirm']);
Route::resource('mrs',MoneyReceiptController::class);


Route::get('/employees/{id}/confirm',[EmployeeController::class,'confirm']);
Route::resource('employees',EmployeeController::class);


Route::get('/employeesalarys/{id}/confirm',[EmployeeSalaryController::class,'confirm']);
Route::resource('employeesalarys',EmployeeSalaryController::class);