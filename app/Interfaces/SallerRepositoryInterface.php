<?php

namespace App\Interfaces;

interface SallerRepositoryInterface 
{
    public function getAllSallers();
    public function getSallerById($sallerId);
    public function deleteSaller($sallerId);
    public function createSaller(array $sallerIdDetails);
    public function updateSaller($sallerId, array $newDetails);
    public function updateSallerStatus($sallerId, array $newDetails);
    
    // public function getFulfilledCategories();
}