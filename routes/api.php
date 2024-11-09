<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\APIProductController;
use App\Http\Controllers\Api\APIStockController;
use App\Http\Controllers\Api\APIStoreController;
use App\Http\Controllers\Api\APICategoryController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/stores', [APIStoreController::class,'index']);
Route::get('/stores/{store}', [APIStoreController::class,'view']);
Route::post('/stores/store', [APIStoreController::class,'store']);
Route::patch('/stores/{store}/update', [APIStoreController::class,'update']);
Route::delete('stores/{store}/delete', [APIStoreController::class,'destroy']);


Route::get('/categories', [APICategoryController::class,'index']);
Route::get('/categories/{category}', [APICategoryController::class,'view']);
Route::post('/categories/store', [APICategoryController::class,'store']);
Route::patch('/categories/{category}/update', [APICategoryController::class,'update']);
Route::delete('categories/{category}/delete', [APICategoryController::class,'destroy']);


Route::get('/products', [APIProductController::class,'index']);
Route::get('/products/{product}', [APIProductController::class,'view']);
Route::post('/products/store', [APIProductController::class,'store']);
Route::patch('products/{product}/update', [APIProductController::class,'update']);
Route::delete('products/{product}/delete', [APIProductController::class,'destroy']);

Route::get('/stores/{store}/stocks', [APIStockController::class,'index']);
Route::get('/stores/{store}/notInStocks', [APIStockController::class,'productsNotInStock']);
Route::post('/stores/{store}/stocks/{product}/store', [APIStockController::class,'store']);

Route::get('/stores/{store}/stocks/{stock}/view', [APIStockController::class,'view']);


Route::patch('/stores/{store}/stocks/{stock}/addQuantity', [APIStockController::class,'addQuantity']);
Route::patch('/stores/{store}/stocks/{stock}/substractQuantity', [APIStockController::class,'substractQuantity']);
Route::patch('/stores/{store}/stocks/{stock}/bulkAddQuantity', [APIStockController::class,'bulkAddQuantity']);
Route::patch('/stores/{store}/stocks/{stock}/bulkSubstractQuantity', [APIStockController::class,'bulkAddQuantity']);
Route::delete('/stores/{store}/stocks/{stock}/delete', [APIStockController::class,'deleteStock']);