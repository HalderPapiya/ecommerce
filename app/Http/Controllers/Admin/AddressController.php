<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\AddressRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Address;
use App\Http\Controllers\BaseController;
use Auth;

class AddressController extends BaseController
{

    private AddressRepositoryInterface $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository) 
    {
        $this->addressRepository = $addressRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Address', 'List of all address');
        $addresses = $this->addressRepository->getAllAddresses();
        return view('admin.address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Address', 'Add address');
        return view('admin.address.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($userId);
        $this->validate($request, [
            'type' => 'required',
            'street' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'user_type' => 'required',
        ]);

        $userId =  Auth::user()->id;
        
        $addressDetails = $request->except(['_token']);
     
        // dd($addressDetails);
        $address = $this->addressRepository->createAddress($addressDetails, $userId);

        if (!$address) {
            return $this->responseRedirectBack('Error occurred while creating address.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.address.list', 'Address has been address successfully' ,'success',false, false);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        // $addressId = $request->id;
        $newDetails = $request->except('_token');

        $address = $this->addressRepository->updateAddressStatus($addressId,$newDetails);

        if ($address) {
            return response()->json(array('message'=>'Address status has been successfully updated'));
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
        $targetAddress = $this->addressRepository->getAddressById($id);
        
        $this->setPageTitle('Address', 'Edit Address : '.$targetAddress->title);
        return view('admin.address.edit', compact('targetAddress'));
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
            // 'title' => 'required|max:191',
        ]);

        $addressId = $request->id;
        $userId =  Auth::user()->id;
        $newDetails = $request->except('_token');
        // dd($newDetails);
        $address = $this->addressRepository->updateAddress( $addressId,$newDetails,$userId);
        // dd($address);
        if (!$address) {
            return $this->responseRedirectBack('Error occurred while updating Address.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Address has been updated successfully' ,'success',false, false);
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
        $address = $this->addressRepository->deleteAddress($id);

        if (!$address) {
            return $this->responseRedirectBack('Error occurred while deleting address.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.address.list', 'Address has been deleted successfully' ,'success',false, false);
        }
    }
}