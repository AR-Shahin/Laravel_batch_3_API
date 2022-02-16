<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function getAllCategory()
    {
        try {
            $categories = Category::latest()->get();
            return sendSuccessResponse($categories);
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:categories,name']
        ]);

        if ($validator->fails()) {
            return sendErrorResponse("Validation Error!", $validator->errors(), 422);
        }

        try {
            $data = $validator->validated();
            $data['slug'] = str($data['name'])->slug();
            Category::create($data);
            return sendSuccessResponse([], "Category Created Successfully!", 201);
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }

    public function view($id)
    {
        try {
            $category = Category::whereId($id)->first();
            if ($category) {
                return sendSuccessResponse($category);
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
            $category = Category::whereId($id)->first();
            if ($category) {
                $validator = Validator::make($request->all(), [
                    'name' => ['required', 'unique:categories,name,' . $id]
                ]);

                if ($validator->fails()) {
                    return sendErrorResponse("Validation Error!", $validator->errors(), 422);
                }

                try {
                    $data = $validator->validated();
                    $data['slug'] = str($data['name'])->slug();

                    $category->update($data);
                    return sendSuccessResponse([], "Category Updated Successfully!", 202);
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
            $category = Category::whereId($id)->first();
            if ($category) {
                $category->delete();
                return sendSuccessResponse([], "Data Deleted Successfully!", 200);
            } else {
                return sendErrorResponse("Invalid Key!", [], 404);
            }
        } catch (QueryException $e) {
            return sendErrorResponse("Server Error!", $e->getMessage(), 500);
        }
    }
}
