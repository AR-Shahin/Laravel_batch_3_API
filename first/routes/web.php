<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryControler;
use App\Http\Controllers\CustomerControler;
use App\Http\Controllers\DBController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ValidateController;
use App\Http\Controllers\ViewController;

// Route::get('/', function () {

//     // info('i am info');

//     return view('welcome');
// })->name('home');

Route::get('/', [ProductController::class, "index"])->name('home');
Route::post('/submit', [ProductController::class, "submit"])->name('submit');

// Route::resource('customer', CustomerControler::class);




// Route::view('test', 'test');

// Route::view('ss', 'test');

Route::get('test', [ViewController::class, 'index']);
Route::get('abc', [ViewController::class, 'abcPage']);
Route::get('admin-page', [ViewController::class, 'adminPage']);

# Session Route

Route::get('session-store', [SessionController::class, 'sessionStore']);
Route::get('session-get', [SessionController::class, 'sessionGet']);
Route::get('session-delete', [SessionController::class, 'sessionDelete']);


# Validate

Route::get('validate', [ValidateController::class, 'showForm']);
Route::post('validate', [ValidateController::class, 'submitForm']);


# DB

Route::get('insert', [DBController::class, 'insert'])->name('insert');
Route::get('create', [DBController::class, 'create'])->name('create');
Route::post('store', [DBController::class, 'store'])->name('store');
Route::get('index', [DBController::class, 'index'])->name('index');
