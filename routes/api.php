<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ItemController;
use App\Http\Controllers\Api\V1\ListController;
use App\Http\Controllers\Api\V1\ProductController;

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

Route::prefix('v1')->group(function () {
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('product', ProductController::class);
    Route::apiResource('list', ListController::class);
    Route::apiResource('item', ItemController::class);

    Route::get('/lists/{listId}/items', [ListController::class, 'showItems']);
    Route::get('/item/{itemId}/incrementQuantity', [ItemController::class, 'incrementQuantityItem']);
    Route::get('/item/{itemId}/decrementQuantity', [ItemController::class, 'decrementQuantityItem']);
    Route::get('/item/{itemId}/check', [ItemController::class, 'checkItem']);
});


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});
