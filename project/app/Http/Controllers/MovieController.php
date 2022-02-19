<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class MovieController extends Controller
{
    public function getAllMovie()
    {
        try {
            $movies = Movie::latest()->get();
            return sendSuccessResponse($movies);
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:movies,name'],
            'description' => ['required', 'unique:movies,description']
        ]);

        if ($validator->fails()) {
            return sendErrorResponse("Validation Error!", $validator->errors(), 422);
        }

        try {
            $data = $validator->validated();
            $data['slug'] = str($data['name'])->slug();
            $data['description'];
            Movie::create($data);
            return sendSuccessResponse([], "Movie Created Successfully!", 201);
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }

    public function view($id)
    {
        try {
            $Movie = Movie::whereId($id)->first();
            if ($Movie) {
                return sendSuccessResponse($Movie);
            } else {
                return sendErrorResponse("Invalid Key!", [], 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $Movie = Movie::whereId($id)->first();
            if ($Movie) {
                $validator = Validator::make($request->all(), [
                    'name' => ['required', 'unique:movies,name,' . $id]
                ]);

                if ($validator->fails()) {
                    return sendErrorResponse("Validation Error!", $validator->errors(), 422);
                }

                try {
                    $data = $validator->validated();
                    $data['slug'] = str($data['name'])->slug();

                    $Movie->update($data);
                    return sendSuccessResponse([], "Movie Updated Successfully!", 202);
                } catch (QueryException $e) {
                    return sendErrorResponse("Server Error!", $e->getMessage(), 500);
                }
            } else {
                return sendErrorResponse("Not Found!", [], 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $Movie = Movie::whereId($id)->first();
            if ($Movie) {
                $Movie->delete();
                return sendSuccessResponse([], "Data Deleted Successfully!", 200);
            } else {
                return sendErrorResponse("Invalid Key!", [], 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }
}

