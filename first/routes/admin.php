<?php

use Illuminate\Support\Facades\Route;


Route::get('admin', function () {
    return 'Admin';
})->middleware('example');


// interface AnyInterface
// {
//     public function abstractMethodOne();
//     public function abstractMethodTwo($data);
// }

// class AnyClass implements AnyInterface
// {
//     public function abstractMethodOne()
//     {
//         // TODO : any task
//     }
//     public function abstractMethodTwo($data)
//     {
//         // TODO : any task
//     }
// }
