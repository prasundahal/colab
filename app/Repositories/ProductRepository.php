<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Cache;

class ProductRepository implements ProductRepositoryInterface{
    public function getAllProducts(){
        $products = Cache::remember('allProducts','60*60', function(){
            return Product::orderBy('id','desc')->get();
        });
        return $products;
    }
    public function getProductById($ProductId){
        return Product::findOrFail($ProductId);
    }
    public function deleteProduct($ProductId){
        Cache::forget('allProducts');
        return Product::destroy($ProductId);
    }
    public function createProduct(object $ProductDetails){
        Cache::forget('allProducts');       
        $data = [
            'name' => $ProductDetails->name,
            'description' => $ProductDetails->description,
        ];
        if($ProductDetails->file('image')){
            $uploadFile = uploadFile($ProductDetails->file('image'),'products'); //uploadFile from helper.php
            $data['image'] = $uploadFile;
        }
        $data['created_by'] = Auth()->user()->id;
        return Product::create($data);
    }
    public function updateProduct($ProductId, object $newDetails){   
        Cache::forget('allProducts');     
        $data = [
            'name' => $newDetails->name,
            'description' => $newDetails->description,
        ];
        if($newDetails->file('image')){
            $uploadFile = uploadFile($newDetails->file('image'),'products'); //uploadFile from helper.php
            $data['image'] = $uploadFile;
        }
        return Product::whereId($ProductId)->update($data);
    }
}