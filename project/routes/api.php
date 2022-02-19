<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    MovieController,
    CategoryController
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
