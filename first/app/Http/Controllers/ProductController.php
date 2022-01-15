<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function submit(Request $request)
    {
        return $request->file('data');
        if ($request->hasFile('file')) {
            return $request->file('file')->extension();
        } else {
            return 0;
        }
        return $request->file('file');
        return $request->fullUrl();
        return $request->is('submit');

        return $request->ip();
        return $request->method();
        return $request->path();
        return $request->input('email');
    }
}
