<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\LevelOneCategory;

class CategoryRepository implements CategoryRepositoryInterface 
{
    public function getAllCategories()
    {
        return LevelOneCategory::all();
    }

    public function getCategoryById($categoryId)
    {
        return LevelOneCategory::findOrFail($categoryId);
    }

    public function deleteCategory($categoryId)
    {
        return LevelOneCategory::destroy($categoryId);
    }

    public function createCategory(array $categoryDetails)
    {
        return LevelOneCategory::create($categoryDetails);
    }

    public function updateCategory($categoryId, array $newDetails) 
    {
        return LevelOneCategory::whereId($categoryId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateCategoryStatus($categoryId, array $newDetails)
    {
        return LevelOneCategory::whereId($categoryId)->update($newDetails);
    }

}