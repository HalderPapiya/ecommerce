<?php

namespace App\Repositories;

use App\Interfaces\BannerRepositoryInterface;
use App\Models\Banner;

class BannerRepository implements BannerRepositoryInterface 
{
    public function getAllBanners()
    {
        return Banner::all();
    }

    public function getBannerById($bannerId)
    {
        return Banner::findOrFail($bannerId);
    }

    public function deleteBanner($bannerId)
    {
        return Banner::destroy($bannerId);
    }

    public function createBanner(array $bannerDetails)
    {
        $collection = collect($bannerDetails);

        $Banner = new Banner;
        $Banner->title = $collection['title'];
        $Banner->description = $collection['description'];
        $Banner->redirect_link = $collection['redirect_link'];

        $profile_image = $collection['image'];
        $imageName = time().".".$profile_image->getClientOriginalName();
        $profile_image->move("banners/",$imageName);
        $uploadedImage = $imageName;
        $Banner->image = $uploadedImage;
        
        $Banner->save();

        return $Banner;
        // return Banner::create($bannerIdDetails);
    }

    public function updateBanner($bannerId, array $newDetails) 
    {
        // return Banner::whereId($bannerId)->update($newDetails);

        // $collection = Banner::whereId($bannerId)->update($newDetails);
        $collection = collect($newDetails)->except('_token'); 
        $Banner = new Banner;
        $Banner->title = $collection['title'];
        $Banner->description = $collection['description'];
        $Banner->redirect_link = $collection['redirect_link'];
       if(has-)
        $profile_image = $collection['image'];
        $imageName = time().".".$profile_image->getClientOriginalName();
        $profile_image->move("banners/",$imageName);
        $uploadedImage = $imageName;
        $Banner->image = $uploadedImage;
       

        $Banner->save();

        return $Banner;
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateBannerStatus($bannerId, array $newDetails)
    {
        return Banner::whereId($bannerId)->update($newDetails);
    }

}