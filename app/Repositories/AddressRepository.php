<?php

namespace App\Repositories;

use App\Interfaces\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository implements AddressRepositoryInterface 
{
    public function getAllAddresss()
    {
        return Address::all();
    }

    public function getAddressById($addressId)
    {
        return Address::findOrFail($addressId);
    }

    public function deleteAddress($addressId)
    {
        return Address::destroy($addressId);
    }

    public function createAddress(array $addressIdDetails)
    {
       
        return Address::create($addressIdDetails);
    }

    public function updateAddress($addressId, array $newDetails) 
    {
        return Address::whereId($addressId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateAddressStatus($addressId, array $newDetails)
    {
        return Address::whereId($addressId)->update($newDetails);
    }

}