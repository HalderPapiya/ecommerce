<?php

namespace App\Repositories;

use App\Interfaces\LeveltwocategoryRepositoryInterface;
use App\Models\LevelTwoCategory;

class LeveltwocategoryRepository implements LeveltwocategoryRepositoryInterface 
{
    public function getAllCategories()
    {
        return LevelTwoCategory::all();
    }

    public function getCategoryById($categoryId)
    {
        return LevelTwoCategory::findOrFail($categoryId);
    }

    public function deleteCategory($categoryId)
    {
        return LevelTwoCategory::destroy($categoryId);
    }

    public function createCategory(array $categoryDetails)
    {
        return LevelTwoCategory::create($categoryDetails);
    }

    public function updateCategory($categoryId, array $newDetails) 
    {
        return LevelTwoCategory::whereId($categoryId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateCategoryStatus($categoryId, array $newDetails)
    {
        return LevelTwoCategory::whereId($categoryId)->update($newDetails);
    }

}