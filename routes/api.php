<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Blade\ApiUserController;
use App\Services\BannerService;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


# Api Clients
Route::post('/login', [ApiAuthController::class, 'login']);

Route::group(['middleware' => 'api-auth'], function () {
    Route::post('/me', [ApiAuthController::class, 'me']);
    Route::post('/tokens', [ApiAuthController::class, 'getAllTokens']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::group(['middleware' => 'ajax.check'], function () {
    Route::post('/api-user/toggle-status/{user_id}', [ApiUserController::class, 'toggleUserActivation']);
    Route::post('/api-token/toggle-status/{token_id}', [ApiUserController::class, 'toggleTokenActivation']);
});

# Api Products
Route::get('/get/products', [ProductController::class, 'allProduct'])->name('productApiAll');
Route::get('/get/product/{id}', [ProductController::class, 'showProduct'])->name('productApiDetails');
Route::post('/product/update/{id}', [ProductController::class, 'updateProduct'])->name('productApiUpdate');
Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('productApiDelete');

// Route::post('/get/orders',[OrderController::class, 'getOrders'])->name('orderAll');
// Route::delete('/order/delete/{id}',[OrderController::class, 'deleteOrder'])->name('orderDelete');
// Route::post('/order/complete/{id}',[OrderController::class, 'completeOrder'])->name('orderComplate');
// Route::post('/order/update/{id}',[OrderController::class, 'updateOrderStatus'])->name('orderUpdate');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Banner Analytics - Track Views & Clicks
Route::post('/banners/{id}/view', function ($id) {
    try {
        app(BannerService::class)->trackView($id);
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false], 500);
    }
});

Route::post('/banners/{id}/click', function ($id) {
    try {
        app(BannerService::class)->trackClick($id);
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false], 500);
    }
});
