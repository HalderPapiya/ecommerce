<?php

namespace App\Repositories;

use App\Interfaces\SallerRepositoryInterface;
use App\Models\Saller;

class SallerRepository implements SallerRepositoryInterface 
{
    public function getAllSallers()
    {
        return Saller::all();
    }

    public function getSallerById($sallerId)
    {
        return Saller::findOrFail($sallerId);
    }

    public function deleteSaller($sallerId)
    {
        return Saller::destroy($sallerId);
    }

    public function createSaller(array $sallerIdDetails)
    {
       
        return Saller::create($sallerIdDetails);
    }

    public function updateSaller($sallerId, array $newDetails) 
    {
        return Saller::whereId($sallerId)->update($newDetails);

       
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateSallerStatus($sallerId, array $newDetails)
    {
        return Saller::whereId($sallerId)->update($newDetails);
    }

}