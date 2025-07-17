<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductionController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PurchasesController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductSectionController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductUnitController;
use App\Http\Controllers\Api\MoneyReceiptController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\RawMaterialController;
use App\Http\Controllers\Api\FinishedGoodController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EmployeeSalaryController;
use App\Http\Controllers\Api\OrderDetailController;

// Authenticated user route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Test route
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});


Route::get('/productsections/{id}/filter',[ProductSectionController::class,'filter']);
Route::get('/productcategorys/{id}/filter',[ProductCategoryController::class,'filter']);
Route::get('/productcategorys',[ProductCategoryController::class,'index']);
Route::get('/productUnits',[ProductUnitController::class,'index']);
Route::get('/productsections',[ProductSectionController::class,'index']);

// Route::post('/purchases', [PurchasesController::class, 'store']);


// If only index is defined:
Route::apiResources([
    'products' => ProductController::class,
    'purchases'=>PurchasesController::class,
    'orders'=>OrderController::class,
    'orderdetails'=>OrderDetailController::class,
    'mrs'=>MoneyReceiptController::class,
    'suppliers'=> SupplierController::class,
    'stocks' => StockController::class,
    'productions' => ProductionController::class,
    'rawmaterials' => RawMaterialController::class,
    'finishedgoods' => FinishedGoodController::class,
    'customers' => CustomerController::class,
    'sales' => SalesController::class,
    'employees' => EmployeeController::class,
    'employeesalarys' => EmployeeSalaryController::class,
    
]);




