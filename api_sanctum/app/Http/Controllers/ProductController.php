<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repository\Product\ProductInterface;

class ProductController extends Controller
{

    protected $product;
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }
    public function getAllProduct()
    {
        return $this->product->getAllProduct();
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:products,name,'],
            'price' => ['required'],
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return sendErrorResponse("Validation Error!", $validator->errors(), 422);
        }

        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        $this->product->store($data);
    }

    public function show($id)
    {
        return $this->product->show($id);
    }

    public function delete($id)
    {
        return $this->product->delete($id);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:products,name,' . $id],
            'price' => ['required'],
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return sendErrorResponse("Validation Error!", $validator->errors(), 422);
        }

        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        return $this->product->update($data, $id);
    }
}
