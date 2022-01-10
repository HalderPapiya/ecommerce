<?php

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface 
{
    public function getAllCustomers()
    {
        return Customer::all();
    }

    public function getCustomerById($customerId)
    {
        return Customer::findOrFail($customerId);
    }

    public function deleteCustomer($customerId)
    {
        return Customer::destroy($customerId);
    }

    public function createCustomer(array $customerIdDetails)
    {
        return Customer::create($customerIdDetails);
    }

    public function updateCustomer($customerId, array $newDetails) 
    {
        return Customer::whereId($customerId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateCustomerStatus($customerId, array $newDetails)
    {
        return Customer::whereId($customerId)->update($newDetails);
    }

}