<?php

namespace App\Interfaces;

interface ProductRepositoryInterface 
{
    public function getAllProducts();
    public function createProduct(array $productDetails);
    public function updateProduct($productId, array $newDetails);
    public function updateProductStatus($productId, array $newDetails);
    public function getProductById($productId);
    public function deleteProduct($productId);
    
    // public function getFulfilledCategories();
}