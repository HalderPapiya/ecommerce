<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\BaseController;
use App\Models\Product;
use App\Models\LevelOneCategory;
use App\Models\LevelTwoCategory;
use App\Models\LevelThreeCategory;
use App\Models\LevelFourCategory;
use App\Models\LevelFiveCategory;
use App\Models\Brand;
use App\Models\Saller;
use App\Models\Image;


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
        $levelOneCategories= LevelOneCategory::get();
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
        // $this->validate($request, [
        //     'name' => 'required|max:191',
        //     'email' => 'required',
        //     'phone' => 'required'
        // ]);

        // $productDetails = $request->except(['_token']);
        
        // $product = $this->productRepository->createProduct($productDetails);

        
    $product = new Product;

    $product->category_level_one_id = $request['category_level_one_id'];
    $product->category_level_two_id = $request['category_level_two_id'];
    $product->category_level_three_id = $request['category_level_three_id'];
    $product->category_level_four_id =$request['category_level_four_id'];
    $product->category_level_five_id = $request['category_level_five_id'];
    $product->seller_id = $request['seller_id'];
    $product->brand_id = $request['brand_id'];
    $product->name = $request['name'];
    $product->description = $request['description'];
    $product->save();
    $product_id = $product->id;
    // dd($product_id);
    if($request->hasfile('image')){
        $Images = [];
        foreach ($request->file('image') as $file) {
            $imageName = time().".".$file->getClientOriginalName();
            $imagePath = $file->move("product/",$imageName);
            // $imagePath = imageUpload($file, 'ladyAdvertisement');
            $Images[] = [
                'product_id' => $product_id,
                'image' => $imagePath,
            ];
        }
        if(count($Images) > 0){
            Image::insert($Images);
        }
    }



        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating Product Management.', 'error', true, true);
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

        $product = $this->productRepository->updateProductStatus($productId,$newDetails);

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
    public function edit(Request $request, $id)
    {
        $targetProduct = $this->productRepository->getProductById($id);
        $levelOneCategories= LevelOneCategory::get();
        $levelTwoCategories= LevelTwoCategory::get();
        $levelThreeCategories= LevelThreeCategory::get();
        $levelFourCategories= LevelFourCategory::get();
        $levelFiveCategories= LevelFiveCategory::get();
        $brands= Brand::get();
        $sellers= Saller::get();
        $images = Image::where('product_id', $id)->get();
        // dd($images);
        $this->setPageTitle('ProductProduct Management', 'Edit ProductProduct Management : '.$targetProduct->title);
        return view('admin.product.edit', compact('images','targetProduct','levelOneCategories','levelTwoCategories','levelThreeCategories','levelFourCategories','levelFiveCategories','brands','sellers'));
    }

    public function deleteImage(Request $req)
    {
        $rules = [
            'product_id' => 'required|min:1|numeric',
            'imageId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $image = Image::where('id',$req->imageId)->where('product_id',$req->product_id)->first();
            if($image){
                $image->delete();
                return response()->json(['error' => false,'message' => 'deleted Success']);
            }
            return response()->json(['error' => true,'message' => 'Invalid Object Detected']);
        }
        return response()->json(['error' => true,'message' => $validator->errors()->first()]);
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
        // $this->validate($request, [
        //     'name' => 'required|max:191',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     // 'address' => 'required',
        // ]);

        // dd($request->all());

        $productId = $request->id;
      
        // $product = new Product;
        $product = Product::findOrFail($productId);

        $product->category_level_one_id = $request['category_level_one_id'];
        $product->category_level_two_id = $request['category_level_two_id'];
        $product->category_level_three_id = $request['category_level_three_id'];
        $product->category_level_four_id =$request['category_level_four_id'];
        $product->category_level_five_id = $request['category_level_five_id'];
        $product->seller_id = $request['seller_id'];
        $product->brand_id = $request['brand_id'];
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->update();
        // $product_id = $product->id;
        if($request->hasfile('image')){
            $Images = [];
            foreach ($request->file('image') as $file) {
                $imageName = time().".".$file->getClientOriginalName();
                $imagePath = $file->move("product/",$imageName);
                // $imagePath = imageUpload($file, 'ladyAdvertisement');
                $Images[] = [
                    'product_id' => $productId,
                    'image' => $imagePath,
                ];
            }
            if($Images){
                Image::insert($Images);
            }
        }
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
    public function manage(Request $request)
    {
        $categoryid = $request->val;
        // dd($categoryid);
        $subcategories = LevelTwoCategory::where('parent_id', $categoryid)->get();
        return response()->json(['sub' => $subcategories]);
    }
    public function manageLavelTwo(Request $request)
    {
        $categoryid = $request->val;
        // dd($categoryid);
        $subcategories = LevelThreeCategory::where('parent_id', $categoryid)->get();
        return response()->json(['sub' => $subcategories]);
    }
    public function manageLavelThree(Request $request)
    {
        $categoryid = $request->val;
        // dd($categoryid);
        $subcategories = LevelFourCategory::where('parent_id', $categoryid)->get();
        return response()->json(['sub' => $subcategories]);
    }
    public function manageLavelFour(Request $request)
    {
        $categoryid = $request->val;
        // dd($categoryid);
        $subcategories = LevelThreeCategory::where('parent_id', $categoryid)->get();
        return response()->json(['sub' => $subcategories]);
    }
    public function manageLavelFive(Request $request)
    {
        $categoryid = $request->val;
        // dd($categoryid);
        $subcategories = LevelFourCategory::where('parent_id', $categoryid)->get();
        return response()->json(['sub' => $subcategories]);
    }
}