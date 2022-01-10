<?php

namespace App\Repositories;

use App\Interfaces\CouponRepositoryInterface;
use App\Models\Coupon;

class CouponRepository implements CouponRepositoryInterface 
{
    public function getAllCoupons()
    {
        return Coupon::all();
    }

    public function getCouponById($bannerId)
    {
        return Banner::findOrFail($bannerId);
    }

    public function deleteBanner($bannerId)
    {
        return Banner::destroy($bannerId);
    }

    public function createBanner(array $bannerIdDetails)
    {
        return Banner::create($bannerIdDetails);
    }

    public function updateBanner($bannerId, array $newDetails) 
    {
        return Banner::whereId($bannerId)->update($newDetails);
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