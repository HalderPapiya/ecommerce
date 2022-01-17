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
   
    // $product = new Product;
    // $product->category_level_one_id = $collection['category_level_one_id'];
    // $product->category_level_two_id = $collection['category_level_two_id'];
    // $product->category_level_three_id = $collection['category_level_three_id'];
    // $product->category_level_four_id = $collection['category_level_four_id'];
    // $product->category_level_five_id = $collection['category_level_five_id'];
    // $product->seller_id = $collection['seller_id'];
    // $product->name = $collection['name'];
    // $product->description = $collection['description'];
    // $product->status = $collection['status'];
   
    // $product->save();
    // // dd($address);
    // return $product;


   


    // $image = new Image;
    //     if($request->hasfile('image'))
    //     {
    //        foreach($request->file('image') as $key => $file)
    //        {
    //            $path = $file->store('product/image');
    //            $name = $file->getClientOriginalName();
    
    //            $insert[$key]['image'] = $name;
    //         //    $insert[$key]['path'] = $path;
    
    //        }
    //     }
    //     Image::create([
        
    //         'image' =>$insert

    //     ]);

    //     $product = new Product;
    //     $collection = collect($productDetails);

    //     Product::create([
    //         $product->category_level_one_id => $collection['category_level_one_id'],
    //         $product->category_level_two_id => $collection['category_level_two_id'],
    //         $product->category_level_three_id => $collection['category_level_three_id'],
    //         $product->category_level_four_id => $collection['category_level_four_id'],
    //         $product->category_level_five_id => $collection['category_level_five_id'],
    //         $product->seller_id => $collection['seller_id'],
    //         $product->name => $collection['name'],
    //         $product->description => $collection['description'],
    //         $product->status => $collection['status'],
    //     ]);


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