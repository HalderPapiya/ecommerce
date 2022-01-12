<?php

namespace App\Repositories;

use App\Interfaces\AddressRepositoryInterface;
use App\Models\Address;
use Auth;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Cache;

class AddressRepository implements AddressRepositoryInterface 
{
    public function getAllAddresses()
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

    public function createAddress(array $addressDetails)
    {
       
        // return Address::create($addressIdDetails);
    //     $address = new Address;
    //     $address->street = $request->input('street');
    //     $address->city = $request->input('city');
    //     $address->state = $request->input('state');
    //     $address->pin_code = $request->input('pin_code');
    //     $address->country = $request->input('country');
    //     $address->type = $request->input('type');
    //     $address->user_id =  Auth::user()->id;
    //     // $category->status = 1;
    // $address->save();
    // return $address;

    $collection = collect($addressDetails);
    // $userId=Auth::user()->id;
    $address = new Address;
    $address->street = $collection['street'];
    $address->city = $collection['city'];
    $address->state = $collection['state'];
    $address->pin_code = $collection['pin_code'];
    $address->country = $collection['country'];
    $address->type = $collection['type'];
    $address->user_id =  Auth::user()->id;
    $address->save();
    // dd($address);
    return $address;

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