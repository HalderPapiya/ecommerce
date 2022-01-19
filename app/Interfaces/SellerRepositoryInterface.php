<?php

namespace App\Interfaces;

interface sellerRepositoryInterface 
{
    public function getAllsellers();
    public function getsellerById($sellerId);
    public function deleteseller($sellerId);
    public function createseller(array $sellerIdDetails);
    public function updateseller($sellerId, array $newDetails);
    public function updatesellerStatus($sellerId, array $newDetails);
    
    // public function getFulfilledCategories();
}