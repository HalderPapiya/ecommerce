<?php

namespace App\Repositories;

use App\Interfaces\LevelthreecategoryRepositoryInterface;
use App\Models\LevelThreeCategory;

class LevelthreecategoryRepository implements LevelthreecategoryRepositoryInterface 
{
    
    public function getAllCategories()
    {
        return LevelThreeCategory::all();
    }

    public function getCategoryById($categoryId)
    {
        return LevelThreeCategory::findOrFail($categoryId);
    }

    public function deleteCategory($categoryId)
    {
        return LevelThreeCategory::destroy($categoryId);
    }

    public function createCategory(array $categoryDetails)
    {
        return LevelThreeCategory::create($categoryDetails);
    }

    public function updateCategory($categoryId, array $newDetails) 
    {
        return LevelThreeCategory::whereId($categoryId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateCategoryStatus($categoryId, array $newDetails)
    {
        return LevelThreeCategory::whereId($categoryId)->update($newDetails);
    }

}