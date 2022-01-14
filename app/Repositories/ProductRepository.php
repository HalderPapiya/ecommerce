<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Auth;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Cache;

class ProductRepository implements ProductRepositoryInterface 
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($productId)
    {
        return Product::findOrFail($productId);
    }

    public function deleteProduct($productId)
    {
        return Product::destroy($productId);
    }

    public function createProduct(array $productDetails)
    {
       
        return Product::create($productDetails);
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

    // $collection = collect($productDetails);
    // // $userId=Auth::user()->id;
    // $address = new Address;
    // $address->street = $collection['street'];
    // $address->user_type = $collection['user_type'];
    // $address->city = $collection['city'];
    // $address->state = $collection['state'];
    // $address->pin_code = $collection['pin_code'];
    // $address->country = $collection['country'];
    // $address->type = $collection['type'];
    // $address->user_id =  Auth::user()->id;
    // $address->save();
    // // dd($address);
    // return $address;

    }

    public function updateProduct($productId, array $newDetails) 
    {
        return Product::whereId($productId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateProductStatus($productId, array $newDetails)
    {
        return Product::whereId($productId)->update($newDetails);
    }

}