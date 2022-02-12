<?php


namespace App\Repository\Product;


interface ProductInterface
{
    public function getAllProduct();
    public function store($data = []);
    public function show($id);
    public function update($data = [], $id);
    public function delete($id);
    public function getDataWithPagination();
}
