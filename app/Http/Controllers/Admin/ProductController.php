<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Http\Controllers\BaseController;

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
        $this->setPageTitle('Saller Management', 'List of saller management');
        $sallers = $this->productRepository->getAllSallers();
        return view('admin.saller-management.index', compact('sallers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Saller', 'Add sallers');
        return view('admin.saller-management.add');
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

        $sallerDetails = $request->except(['_token']);
        
        $saller = $this->productRepository->createSaller($sallerDetails);

        if (!$saller) {
            return $this->responseRedirectBack('Error occurred while creating Saller Management.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.saller-management.list', 'Saller Management has been created successfully' ,'success',false, false);
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

        $customerId = $request->id;
        $newDetails = $request->except('_token');

        $customer = $this->productRepository->updateSallerStatus($customerId,$newDetails);

        if ($customer) {
            return response()->json(array('message'=>'Saller Management status has been successfully updated'));
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
        $targetSaller = $this->productRepository->getSallerById($id);
        
        $this->setPageTitle('Saller Management', 'Edit Saller Management : '.$targetSaller->title);
        return view('admin.saller-management.edit', compact('targetSaller'));
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

        $sallerId = $request->id;
        $newDetails = $request->except('_token');

        $saller = $this->productRepository->updateSaller($sallerId, $newDetails);

        if (!$saller) {
            return $this->responseRedirectBack('Error occurred while updating saller management.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Saller Management has been updated successfully' ,'success',false, false);
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
        $saller = $this->productRepository->deleteSaller($id);

        if (!$saller) {
            return $this->responseRedirectBack('Error occurred while deleting customer.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.saller-management.list', 'Customer has been deleted successfully' ,'success',false, false);
        }
    }
}