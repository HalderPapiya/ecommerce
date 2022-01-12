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

    public function getCouponById($couponId)
    {
        return Coupon::findOrFail($couponId);
    }

    public function deleteCoupon($couponId)
    {
        return Coupon::destroy($couponId);
    }

    public function createCoupon(array $couponIdDetails)
    {
        return Coupon::create($couponIdDetails);
    }

    public function updateCoupon($couponId, array $newDetails) 
    {
        return Coupon::whereId($couponId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateCouponStatus($couponId, array $newDetails)
    {
        return Coupon::whereId($couponId)->update($newDetails);
    }

}