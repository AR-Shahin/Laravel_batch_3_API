<?php

use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\OneToOneController;
use App\Models\Country;
use App\Models\Mechanic;
use App\Models\Product;
use App\Models\Tag;
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


Route::get('has-many-through', function () {
    return Country::with('districts')->find(2);
});


Route::get('many-to-many', function () {

    // Product::find(1)->tags()->detach([1, 2]);

    // Product::find(1)->tags()->attach(3);
    // Product::find(1)->tags()->attach([3, 4]);
    // return Tag::with('products')->find(1);

    // Product::find(1)->tags()->sync([2, 5, 3]);
    // Product::find(1)->tags()->toggle([2, 5, 3]);

    return Product::with('my_pivot')->find(1);
});


Route::get('products', function () {
    return Product::find(1);
    return Product::latest_products(3);
});
