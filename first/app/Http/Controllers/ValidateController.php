<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateController extends Controller
{
    public function showForm()
    {
        return view('validate');
    }

    public function submitForm(Request $request)
    {
        // $validated =  Validator::make($request->all(), [
        //     'name' => 'required'
        // ]);
        // $request->validate([
        //     'name' => ['required', 'min:3', 'max:5'],
        //     'email' => ['required', 'email'],
        // ]);
        return;
    }
}
