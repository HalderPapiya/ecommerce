<?php

namespace App\Interfaces;

interface LevelfourcategoryRepositoryInterface
{
    public function getAllCategories();
    public function getCategoryById($categoryId);
    public function deleteCategory($categoryId);
    public function createCategory(array $categoryDetails);
    public function updateCategory($categoryId, array $newDetails);
    public function updateCategoryStatus($categoryId, array $newDetails);
    
    // public function getFulfilledCategories();
}