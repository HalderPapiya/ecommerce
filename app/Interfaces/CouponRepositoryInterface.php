<?php

namespace App\Interfaces;

interface CouponRepositoryInterface 
{
    public function getAllCoupons();
    public function getCouponById($couponId);
    public function deleteCoupon($couponId);
    public function createCoupon(array $couponIdDetails);
    public function updateCoupon($couponId, array $newDetails);
    public function updateCouponStatus($couponId, array $newDetails);
    
    // public function getFulfilledCategories();
}