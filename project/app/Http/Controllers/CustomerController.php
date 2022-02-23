<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function addToFavourite(Request $request)
    {
        $data = auth('customer_api')->user()->favourites()->create([
            'movie_id' => $request->input('movie_id')
        ]);

        return sendSuccessResponse([]);
    }

    public function movies()
    {
        $data = auth('customer_api')->user()->favourites;
        return sendSuccessResponse($data);
    }
}
