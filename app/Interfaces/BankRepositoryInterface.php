<?php

namespace App\Interfaces;

interface BankRepositoryInterface 
{
    public function getAllBank();
    public function getBankById($bankId);
    public function deleteBank($bankId);
    public function createBank(array $bankIdDetails);
    public function updateBank($bankId,array $newDetails);
    public function updateBankStatus($bankId, array $newDetails);
    
    // public function getFulfilledCategories();
}