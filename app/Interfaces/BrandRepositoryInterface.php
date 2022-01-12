<?php

namespace App\Interfaces;

interface BrandRepositoryInterface 
{
    public function getAllBrandes();
    public function getBrandById($brandId);
    public function deleteBrand($brandId);
    public function createBrand(array $brandIdIdDetails);
    public function updateBrand($brandId, array $newDetails);
    public function updateBrandStatus($brandId, array $newDetails);
    
    // public function getFulfilledCategories();
}