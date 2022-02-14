<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'getAllProduct');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::post('update/{id}', 'update');
    Route::delete('/{id}', 'delete');
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
