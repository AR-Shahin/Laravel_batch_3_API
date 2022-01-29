<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DBController extends Controller
{
    // 'password' => Hash::make('password')
    function insert()
    {
        DB::table('users')->insert([
            [
                'name' => 'Shahin',
                'email' => 's1@Mail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Raihan',
                'email' => 'r@Mail.com',
                'password' => bcrypt('password'),
            ],
        ]);
        return 11;
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return 1;
    }

    public function index()
    {
        // return User::all();
        // return DB::table('users')->select('name')->get();
        // return DB::table('users')->select('name as nam')->get();
        // return DB::table('users')
        //     // ->where('name', 'shahin')
        //     // ->whereName('shahin')
        //     // ->whereRememberToken(null)
        //     // ->orWhere('roll', '<', 10)
        //     // ->where('name', 'like', '%s%')
        //     ->where([
        //         ['name','=','shahin'],
        //         ['roll','=','10'],
        //     ])
        //     ->get();

        // $deleted = DB::table('users')->whereId(1)->delete();
        // return DB::table('users')->whereId(1)->update([
        //     'name' => 'Update'
        // ]);

        // DB::table('users')->whereId(2)->increment('roll', 10);

        // DB::table('users')->whereId(2)->decrement('roll', 10);
        // return   DB::table('users')
        //     // ->where('finalized', 1)
        //     // ->max('roll');
        //     ->count();
        // return DB::table('users')->whereBetween('roll', [10, 100])->get();;

        // return DB::table('users')->orderBy('name', 'desc')->get();;

        // return  DB::table('users')->paginate(15);
        return view('index', [
            'users' => DB::table('users')->paginate(10)
        ]);
    }
}
