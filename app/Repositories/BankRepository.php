<?php

namespace App\Repositories;

use App\Interfaces\BankRepositoryInterface;
use App\Models\Bank;
use Auth;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Cache;

class BankRepository implements BankRepositoryInterface 
{
    public function getAllBank()
    {
        return Bank::all();
    }

    public function getBankById($bankId)
    {
        return Bank::findOrFail($bankId);
    }

    public function deleteBank($bankId)
    {
        return Bank::destroy($bankId);
    }

    public function createBank(array $bankDetails)
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

    $collection = collect($bankDetails);
    // $userId=Auth::user()->id;
    $bank = new Bank;
    $bank->bank_name = $collection['bank_name'];
    $bank->beneficiary_name = $collection['beneficiary_name'];
    $bank->IFSC = $collection['IFSC'];
    $bank->branch_name = $collection['branch_name'];
    $bank->acount_no = $collection['acount_no'];
    $bank->type = $collection['type'];
    $bank->user_id =  Auth::user()->id;
    $bank->save();
    // dd($address);
    return $bank;

    }

    public function updateBank($bankId, array $newDetails) 
    {
        return Bank::whereId($bankId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateBankStatus($bankId, array $newDetails)
    {
        return Bank::whereId($bankId)->update($newDetails);
    }

}