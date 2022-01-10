<?php

namespace App\Repositories;

use App\Interfaces\LevelfourcategoryRepositoryInterface;
use App\Models\LevelFourCategory;

class LevelfourcategoryRepository implements LevelfourcategoryRepositoryInterface 
{
    
    public function getAllCategories()
    {
        return LevelFourCategory::all();
    }

    public function getCategoryById($categoryId)
    {
        return LevelFourCategory::findOrFail($categoryId);
    }

    public function deleteCategory($categoryId)
    {
        return LevelFourCategory::destroy($categoryId);
    }

    public function createCategory(array $categoryDetails)
    {
        return LevelFourCategory::create($categoryDetails);
    }

    public function updateCategory($categoryId, array $newDetails) 
    {
        return LevelFourCategory::whereId($categoryId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateCategoryStatus($categoryId, array $newDetails)
    {
        return LevelFourCategory::whereId($categoryId)->update($newDetails);
    }

}