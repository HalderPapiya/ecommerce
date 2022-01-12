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
        // $collection = collect($bannerIdDetails);

        // $Banner = new Banner;
        // $Banner->title = $collection['title'];
        // $Banner->description = $collection['description'];
        // $Banner->redirect_link = $collection['redirect_link'];

        // $profile_image = $collection['image'];
        // $imageName = time().".".$profile_image->getClientOriginalName();
        // $profile_image->move("banners/",$imageName);
        // $uploadedImage = $imageName;
        // $Banner->image = $uploadedImage;
        
        // $Banner->save();

        // return $Banner;
        return Brand::create($brandDetails);
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