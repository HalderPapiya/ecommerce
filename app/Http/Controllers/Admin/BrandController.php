<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\BrandRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Brand;
use App\Http\Controllers\BaseController;

class BrandController extends BaseController
{

    private BrandRepositoryInterface $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository) 
    {
        $this->brandRepository = $brandRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Brand', 'List of all brand');
        $brandes = $this->brandRepository->getAllBrandes();
        return view('admin.brand.index', compact('brandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Brand', 'Add brand');
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brandDetails=$this->validate($request, [
            'name' => 'required|max:191',
            // 'logo' => 'required',
        ]);
       
        $brandDetails = $request->except(['_token']);
        $brand = $this->brandRepository->createBrand($brandDetails);

        if (!$brand) {
            return $this->responseRedirectBack('Error occurred while creating brand.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.brand.list', 'Brand has been brand successfully' ,'success',false, false);
        }
    }

     /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $brandId = $request->id;
        $newDetails = $request->except('_token');

        $brand = $this->brandRepository->updateBrandStatus($brandId,$newDetails);

        if ($brand) {
            return response()->json(array('message'=>'Brand status has been successfully updated'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $targetBrand = $this->brandRepository->getBrandById($id);
        
        $this->setPageTitle('Brand', 'Edit Brand : '.$targetBrand->title);
        return view('admin.brand.edit', compact('targetBrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            // 'logo' => 'required',
        ]);

        // $brandId = $request->id;

        // $newDetails = $request->only([
        //     'name',
        //     'logo',
        //     'description',
        //     'title'
        // ]);
        // $logo = $collection['image'];
        // $imageName = time().".".$logo->getClientOriginalName();
        // $logo->move("banners/",$imageName);
        // $uploadedImage = $imageName;
        // $newDetails->image = $uploadedImage;
        // // $newDetails = $request->except('_token');

        // $brand = $this->brandRepository->updateBrand($brandId, $newDetails);

        // if (!$brand) {
        //     return $this->responseRedirectBack('Error occurred while updating Brand.', 'error', true, true);
        // } else {
        //     return $this->responseRedirectBack('Brand has been updated successfully' ,'success',false, false);
        // }


        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'name' => 'required',
            'logo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('logo')) {
            $imageName = time().".".$request->logo->getClientOriginalName();
            $request->logo->move("brands/",$imageName);
            $image = $imageName;
       
            Brand::where('id', $id)->update([
                'logo' => $image,
            ]);
        }

       
        Brand::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'name' => $request->name,
        ]);
        return $this->responseRedirectBack('Banner has been updated successfully' ,'success',false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = $this->brandRepository->deleteBrand($id);

        if (!$brand) {
            return $this->responseRedirectBack('Error occurred while deleting brand.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.brand.list', 'Brand has been deleted successfully' ,'success',false, false);
        }
    }
}
