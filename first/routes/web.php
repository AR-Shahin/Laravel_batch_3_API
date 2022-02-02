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
use App\Models\Student;

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


# Model

Route::get('model', function () {

    // return Student::multi()->get();
    // return 1;
    return  Student::create([
        'name' => 'Shddddahin',
        'email' => 'sddd@mail.com',
        'is_active' => false,
        'vote' => rand(100, 200)
    ]);

    // $student = new Student();
    // $student->name = "Raihan";
    // $student->email = "Raihan@mail.com";
    // $student->is_active = false;
    // $student->vote = 10;
    // $student->save();

    // return $student;

    // return Student::where('vote', '<', 100)->get();

    // return Student::findOrFail(200);
    // return Student::findOrFail(1)->update([
    //     'name' => 'Updated Name'
    // ]);

    // return Student::find(1)->delete();
});
