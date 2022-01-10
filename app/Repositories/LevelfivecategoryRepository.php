<?php

namespace App\Repositories;

use App\Interfaces\LevelfivecategoryRepositoryInterface;
use App\Models\LevelFiveCategory;

class LevelfivecategoryRepository implements LevelfivecategoryRepositoryInterface 
{
    
    public function getAllCategories()
    {
        return LevelFiveCategory::all();
    }

    public function getCategoryById($categoryId)
    {
        return LevelFiveCategory::findOrFail($categoryId);
    }

    public function deleteCategory($categoryId)
    {
        return LevelFiveCategory::destroy($categoryId);
    }

    public function createCategory(array $categoryDetails)
    {
        return LevelFiveCategory::create($categoryDetails);
    }

    public function updateCategory($categoryId, array $newDetails) 
    {
        return LevelFiveCategory::whereId($categoryId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateCategoryStatus($categoryId, array $newDetails)
    {
        return LevelFiveCategory::whereId($categoryId)->update($newDetails);
    }

}