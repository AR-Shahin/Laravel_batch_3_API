<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function index()
    {
        // Category::withOnly(['products'])->get();
        // Category::without('products')->get();

        return $categories = Category::get();
        return view('one-to-many');
    }

    public function category(Category $category)
    {
        return $category->load('oldest_product');
    }
}
