<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\BaseController;
use App\Models\Product;
use App\Models\LevelTwoCategory;
use App\Models\LevelThreeCategory;
use App\Models\LevelFourCategory;
use App\Models\LevelFiveCategory;
use App\Models\Brand;
use App\Models\Saller;


class ProductController extends BaseController
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) 
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Product Management', 'List of product management');
        $products = $this->productRepository->getAllProducts();
        return view('admin.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('ProductProduct', 'Add Product');
        $levelOneCategories= Category::get();
        $levelTwoCategories= LevelTwoCategory::get();
        $levelThreeCategories= LevelThreeCategory::get();
        $levelFourCategories= LevelFourCategory::get();
        $levelFiveCategories= LevelFiveCategory::get();
        $brands= Brand::get();
        $sellers= Saller::get();
        return view('admin.product.add',compact('levelOneCategories','levelTwoCategories','levelThreeCategories','levelFourCategories','levelFiveCategories','brands','sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $productDetails = $request->except(['_token']);
        
        $productproduct = $this->productRepository->createProductProductProduct($productDetails);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating ProductProduct Management.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.product.list', 'Product Management has been created successfully' ,'success',false, false);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $productId = $request->id;
        $newDetails = $request->except('_token');

        $product = $this->productRepository->updateProductProductStatus($cproductId,$newDetails);

        if ($product) {
            return response()->json(array('message'=>'Product Management status has been successfully updated'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $targetProduct = $this->productRepository->getProductById($id);
        
        $this->setPageTitle('ProductProduct Management', 'Edit ProductProduct Management : '.$targetProduct->title);
        return view('admin.product.edit', compact('targetProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required',
            'phone' => 'required',
            // 'address' => 'required',
        ]);

        $productId = $request->id;
        $newDetails = $request->except('_token');

        $productproduct = $this->productRepository->updateProduct($productId, $newDetails);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product management.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Product Management has been updated successfully' ,'success',false, false);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->deleteProduct($id);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while deleting customer.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.product.list', 'Customer has been deleted successfully' ,'success',false, false);
        }
    }
}