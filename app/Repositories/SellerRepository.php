<?php

namespace App\Repositories;

use App\Interfaces\sellerRepositoryInterface;
use App\Models\seller;

class sellerRepository implements sellerRepositoryInterface 
{
    public function getAllsellers()
    {
        return seller::all();
    }

    public function getsellerById($sellerId)
    {
        return seller::findOrFail($sellerId);
    }

    public function deleteseller($sellerId)
    {
        return seller::destroy($sellerId);
    }

    public function createseller(array $sellerIdDetails)
    {
       
        return seller::create($sellerIdDetails);
    }

    public function updateseller($sellerId, array $newDetails) 
    {
        return seller::whereId($sellerId)->update($newDetails);

       
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updatesellerStatus($sellerId, array $newDetails)
    {
        return seller::whereId($sellerId)->update($newDetails);
    }

}