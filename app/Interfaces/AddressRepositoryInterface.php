<?php

namespace App\Interfaces;

interface AddressrRepositoryInterface 
{
    public function getAllAddresses();
    public function getAddressById($addressId);
    public function deleteAddress($addressId);
    public function createAddress(array $addressIddDetails);
    public function updateAddress($addressId, array $newDetails);
    public function updateAddressStatus($addressId, array $newDetails);
    
    // public function getFulfilledCategories();
}