<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminOrderController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('signup', [UserController::class, 'store']);
Route::post('login', [UserController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function() {

    // users
    Route::get('profile', [UserController::class, 'show']);
    Route::get('logout', [UserController::class, 'logout']);

    // product
    Route::get('product', [GiftController::class, 'index']);
    Route::get('product/{id}', [GiftController::class, 'show']);

    // coupons
    Route::get('coupon', [CouponController::class, 'index']);

    // addresses
    Route::resource('address', AddressController::class);

    // orders
    Route::get('order', [OrderController::class, 'index']);
    Route::post('order', [OrderController::class, 'store']);

});

Route::group(['middleware' => ['auth:sanctum', 'admin']], function() {

    Route::apiResource('admin/product', AdminProductController::class);
    Route::post('admin/product/{id}', [AdminProductController::class, 'update']);
    Route::post('admin/bulk_product', [AdminProductController::class, 'bulkInsert']);

    Route::apiResource('admin/coupon', AdminCouponController::class);
    Route::post('admin/coupon/{id}', [AdminCouponController::class, 'update']);
    Route::post('admin/bulk_coupon', [AdminCouponController::class, 'bulkInsert']);

    Route::apiResource('admin/order', AdminOrderController::class);
    Route::post('admin/order/{id}', [AdminOrderController::class, 'update']);
    Route::post('admin/bulk_order', [AdminOrderController::class, 'bulkInsert']);

});