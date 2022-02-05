<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    function index()
    {

        // return $user = User::find(10)->profile()->create([
        //     'city' => 'Dhaka',
        //     'zip_code' => '1203',
        //     'view' => 10,
        //     'phone' => '123'

        // ]);
        // return   $users = User::whereHas('profile')->get()->count();
        // $users = User::doesntHave('profile')->get()->count();

        // $users = User::whereHas('profile', function ($q) {
        //     $q->whereNull('zip_code');
        // })->get();

        // $users = User::whereHas('profile', function ($q) {
        //     $q->whereNotNull('zip_code');
        // })->get();
        // $users = User::with('profile')->get();
        // $users = User::get();
        // $users->load('profile');
        $profiles = Profile::get();
        return view('one-to-one', compact('profiles'));
    }
}
