<?php

namespace App\Interfaces;

interface CustomerRepositoryInterface 
{
    public function getAllCustomers();
    public function getCustomerById($customerId);
    public function deleteCustomer($customerId);
    public function createCustomer(array $customerIdDetails);
    public function updateCustomer($customerId, array $newDetails);
    public function updateCustomerStatus($customerId, array $newDetails);
    
    // public function getFulfilledCategories();
}