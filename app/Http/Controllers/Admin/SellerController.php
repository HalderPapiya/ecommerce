<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\sellerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Seller;
use App\Http\Controllers\BaseController;

class SellerController extends BaseController
{
    private sellerRepositoryInterface $sellerRepository;

    public function __construct(sellerRepositoryInterface $sellerRepository) 
    {
        $this->sellerRepository = $sellerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Seller', 'List of seller');
        $sellers = $this->sellerRepository->getAllsellers();
        return view('admin.seller-management.index', compact('sellers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Seller', 'Add seller');
        return view('admin.seller-management.add');
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

        $sellerDetails = $request->except(['_token']);
        
        $seller = $this->sellerRepository->createseller($sellerDetails);

        if (!$seller) {
            return $this->responseRedirectBack('Error occurred while creating Seller.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.seller-management.list', 'Seller has been created successfully' ,'success',false, false);
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

        $sellerId = $request->id;
        $newDetails = $request->except('_token');

        $seller = $this->sellerRepository->updatesellerStatus($sellerId,$newDetails);

        if ($seller) {
            return response()->json(array('message'=>'Seller status has been successfully updated'));
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
        $targetseller = $this->sellerRepository->getsellerById($id);
        
        $this->setPageTitle('Seller Management', 'Edit Seller : '.$targetseller->title);
        return view('admin.seller-management.edit', compact('targetseller'));
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

        $sellerId = $request->id;
        $newDetails = $request->except('_token');

        $seller = $this->sellerRepository->updateseller($sellerId, $newDetails);

        if (!$seller) {
            return $this->responseRedirectBack('Error occurred while updating seller management.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Seller has been updated successfully' ,'success',false, false);
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
        $seller = $this->sellerRepository->deleteseller($id);

        if (!$seller) {
            return $this->responseRedirectBack('Error occurred while deleting seller.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.seller-management.list', 'Seller has been deleted successfully' ,'success',false, false);
        }
    }
}
