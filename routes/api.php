<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\MajorCategoryController;
use App\Http\Controllers\Api\CartController;

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

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products-all', [ProductController::class, 'allProducts']);
Route::get('/get-product-by-code/{id}', [ProductController::class, 'getProductById']);
Route::get('/electronic-products', [ProductController::class, 'allElectronicProducts']);
Route::get('/furniture-products', [ProductController::class, 'allFurnitureProducts']);
Route::get('/clothing-products', [ProductController::class, 'allClothingProducts']);

Route::get('/all-categories', [MajorCategoryController::class, 'index']);
Route::get('/shop-categories', [MajorCategoryController::class, 'all_categories']);
Route::get('/get-top-categories', [MajorCategoryController::class, 'getTopEightCategories']);

Route::get('/health-check', function () {
    return response()->json(['status' => 'ok']);
});

Route::middleware('api')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::get('/cart', [CartController::class, 'get']);
    Route::delete('/cart/{id}', [CartController::class, 'remove']);
});

Route::get('/products-filtered', [ProductController::class, 'filteredProducts']);
