<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    MovieController,
    CategoryController,
    CustomerAuthController,
    CustomerController
};




# Category API

Route::prefix('category')->controller(CategoryController::class)->group(function () {

    Route::get('/', 'getAllCategory');
    Route::post('/', 'store');
    Route::get('/{id}', 'view');
    Route::delete('/{id}', 'delete');
    Route::post('update/{id}', 'update');
});

# Movie API

Route::prefix('movie')->controller(MovieController::class)->group(function () {

    Route::get('/', 'getAllMovie');
    Route::post('/', 'store');
    Route::get('/{id}', 'view');
    Route::delete('/{id}', 'delete');
    Route::post('update/{id}', 'update');
});


# Customer API

Route::prefix('customer')->controller(CustomerAuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware('auth:customer_api');
    Route::post('me', 'me')->middleware('auth:customer_api');
});

# Auth
Route::post('add-fev', [CustomerController::class, 'addToFavourite'])->middleware('auth:customer_api');
Route::post('fev-movies', [CustomerController::class, 'movies'])->middleware('auth:customer_api');
