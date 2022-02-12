<?php

namespace App\Repository\Product;

use App\Models\Product;

class ProductRepository implements ProductInterface
{

    public function getAllProduct()
    {
        $data = Product::get();
        return sendSuccessResponse($data);
    }
    public function store($data = [])
    {
        //return $data;
        Product::create($data);
        return sendSuccessResponse([], 'Data Created Successfully!', 201);
    }
    public function show($id)
    {
        $data = Product::find($id);
        if ($data) {
            return sendSuccessResponse($data);
        } else {
            return sendErrorResponse([], 'Data Not found!', 404);
        }
    }
    public function update($data = [], $id)
    {
        return $data;
        $data = Product::find($id)->update($data);
        return sendSuccessResponse($data, 'Data Updated Successfully!');
    }
    public function delete($id)
    {
        $product =  Product::find($id);
        if ($product) {
            $product->delete();
            return sendSuccessResponse([], 'Data Deleted Successfully!', 200);
        }
    }
    public function getDataWithPagination()
    {
        Product::latest()->paginate(5);
    }
}
