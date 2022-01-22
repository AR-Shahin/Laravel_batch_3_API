<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    function index()
    {

        // if (View::exists('emails.customer')) {
        //     //
        // }
        return view()->exists('test') ? view('test') : abort(404);
        return view('test');
    }

    function adminPage()
    {

        // return view('admin.index', [
        //     'nums' => [1, 2, 3, 4, 5]
        // ]);

        // $nums = [10, 20, 30, 40, 50];
        $users = [
            "Shahin", "Asik"
        ];
        return view('admin.index', compact('users'))->with('title', 'This is title');
    }

    public function abcPage()
    {
        return view('abc');
    }
}
