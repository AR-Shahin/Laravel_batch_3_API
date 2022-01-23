<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function sessionStore()
    {
        session()->put('putValue', true);
        session(['name' => 'Shahin', 'age' => 21]);
        session()->flash('status', 'Task was successful!');
        return 1;
    }

    public function sessionGet()
    {
        Session::get('name');
        if (session()->exists('name')) {
            echo "Ache";
        } else {
            echo  "Nai";
        }
        echo session()->get('status');
        echo "<br>";
        echo session()->get('putValue');
        echo "<br>";

        echo session()->get('name');
        echo "<br>";
        echo session()->get('age');
    }

    public function sessionDelete()
    {
        session()->forget('name');
        session()->forget(['name', 'age']);
        session()->flush();
    }
}
