<?php

namespace App\Interfaces;

interface ProductRepositoryInterface 
{
    public function getAllProducts();
    public function getProductById($ProductId);
    public function deleteProduct($ProductId);
    public function createProduct(object $ProductDetails);
    public function updateProduct($ProductId, object $newDetails);
}