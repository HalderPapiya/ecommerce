<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Customer;
use App\Http\Controllers\BaseController;

class CustomerController extends BaseController
{
    private CustomerRepositoryInterface $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository) 
    {
        $this->customerRepository = $customerRepository;
    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Customer', 'List of customer');
        $customers = $this->customerRepository->getAllCustomers();
        return view('admin.customer.index', compact('customers'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Customer', 'Add customer');
        return view('admin.customer.add');
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
        ]);

        $customerDetails = $request->except(['_token']);
        
        $customer = $this->customerRepository->createCustomer($customerDetails);

        if (!$customer) {
            return $this->responseRedirectBack('Error occurred while creating customer.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.customer.list', 'Customer has been created successfully' ,'success',false, false);
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
        
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $customerId = $request->id;
        $newDetails = $request->except('_token');

        $customer = $this->customerRepository->updateCustomerStatus($customerId,$newDetails);

        if ($customer) {
            return response()->json(array('message'=>'Customer status has been successfully updated'));
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
        $targetCustomer = $this->customerRepository->getCustomerById($id);
        
        $this->setPageTitle('Customer', 'Edit Customer : '.$targetCustomer->title);
        return view('admin.customer.edit', compact('targetCustomer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
        ]);

        $customerId = $request->id;
        $newDetails = $request->except('_token');

        $customer = $this->customerRepository->updateCustomer($customerId, $newDetails);

        if (!$customer) {
            return $this->responseRedirectBack('Error occurred while updating customer.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Customer has been updated successfully' ,'success',false, false);
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
        $customer = $this->customerRepository->deleteCustomer($id);

        if (!$customer) {
            return $this->responseRedirectBack('Error occurred while deleting customer.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.customer.list', 'Customer has been deleted successfully' ,'success',false, false);
        }
    }
}