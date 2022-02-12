<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repository\Product\ProductInterface;
use Illuminate\Http\Request;

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
        //return $request->all();
        $this->product->store($request->all());
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
        return $request->all();
        return $this->product->update($request->all(), $id);
    }
}
