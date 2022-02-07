<?php

use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\OneToOneController;
use App\Models\Mechanic;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::get('one-to-one', [OneToOneController::class, 'index']);
Route::get('one-to-many', [OneToManyController::class, 'index']);
Route::get('has-one-through', function () {
    return Mechanic::with('owner')->find(2);
});
Route::get('category/{category}', [OneToManyController::class, 'category']);
