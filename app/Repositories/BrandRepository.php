<?php

namespace App\Repositories;

use App\Interfaces\BrandRepositoryInterface;
use App\Models\Brand;

class BrandRepository implements BrandRepositoryInterface 
{
    public function getAllBrandes()
    {
        return Brand::all();
    }

    public function getBrandById($brandId)
    {
        return Brand::findOrFail($brandId);
    }

    public function deleteBrand($brandId)
    {
        return Brand::destroy($brandId);
    }

    public function createBrand(array $brandDetails)
    {
        $collection = collect($brandDetails);

        $Brand = new Brand;
        $Brand->title = $collection['title'];
        $Brand->name = $collection['name'];
        $Brand->description = $collection['description'];

        $profile_image = $collection['logo'];
        $imageName = time().".".$profile_image->getClientOriginalName();
        $profile_image->move("brands/",$imageName);
        $uploadedImage = $imageName;
        $Brand->logo = $uploadedImage;
        
        $Brand->save();

        return $Brand;
        // return Brand::create($brandDetails);
    }

    public function updateBrand($brandId, array $newDetails) 
    {
        // return Brand::whereId($brandId)->update($newDetails);
        return Brand::whereId($brandId)->update($newDetails);
        
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateBrandStatus($brandId, array $newDetails)
    {
        return Brand::whereId($brandId)->update($newDetails);
    }

}