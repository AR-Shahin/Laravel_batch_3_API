<?php

namespace App\Http\Controllers;

use App\Action\File;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{

    public function getAllMovie()
    {
        try {
            $movies = Movie::with('categories')->latest()->get();
            return sendSuccessResponse($movies);
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }


    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:movies,name'],
            'image' => ['required', 'mimes:png,jpg'],
        ]);

        if ($validator->fails()) {
            return sendErrorResponse("Validation Error!", $validator->errors(), 422);
        }

        try {
            $data = $validator->validated();
            $data['slug'] = str($data['name'])->slug();
            $data['image'] = File::upload($request->file('image'), 'movie');
            $data['description'] = $request->description;
            $movie = Movie::create($data);
            if ($movie && $request->categories) {
                $movie->categories()->sync($request->categories);
            }
            return sendSuccessResponse($movie->load('categories'), "Movie Created Successfully!", 201);
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }

    public function view($id)
    {
        try {
            $movie = Movie::whereId($id)->first();
            if ($movie) {
                return sendSuccessResponse($movie->load('categories'));
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
            $movie = Movie::whereId($id)->first();
            if ($movie) {

                if ($request->hasFile('image')) {
                    // return 1;
                    $validator = Validator::make($request->all(), [
                        'name' => ['required', 'unique:movies,name,' . $id],
                        'image' => ['required', 'mimes:png,jpg'],
                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'name' => ['required', 'unique:movies,name,' . $id],
                    ]);
                }


                if ($validator->fails()) {
                    return sendErrorResponse("Validation Error!", $validator->errors(), 422);
                }

                // return $request->all();
                try {
                    $data = $validator->validated();
                    $data['slug'] = str($data['name'])->slug();
                    $data['description'] = $request->description;

                    if ($request->hasFile('image')) {
                        // If Has Image
                        $oldImg = $movie->image;
                        $data['image'] = File::upload($request->file('image'), 'movie');
                        $movie->update($data);
                        File::deleteFile($oldImg);
                    } else {
                        $movie->update($data);
                    }
                    // Category
                    if ($movie && $request->categories) {
                        $movie->categories()->sync($request->categories);
                    }
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
            $movie = Movie::whereId($id)->first();
            $image = $movie->image;
            if ($movie) {
                $movie->delete();
                File::deleteFile($image);
                return sendSuccessResponse([], "Data Deleted Successfully!", 200);
            } else {
                return sendErrorResponse("Invalid Key!", [], 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }
}
