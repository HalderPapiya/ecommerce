<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CouponRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Customer;
use App\Http\Controllers\BaseController;

class CouponController extends BaseController
{
    private CouponRepositoryInterface $couponRepository;

    public function __construct(CouponRepositoryInterface $couponRepository) 
    {
        $this->couponRepository = $couponRepository;
    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Coupon', 'List of coupon');
        $coupons = $this->couponRepository->getAllCoupons();
        return view('admin.coupon.index', compact('coupons'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Coupon', 'Add coupon');
        return view('admin.coupon.add');
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
            'title' => 'required|max:191',
        ]);

        $couponDetails = $request->except(['_token']);
        
        $coupon = $this->couponRepository->createCoupon($couponDetails);

        if (!$coupon) {
            return $this->responseRedirectBack('Error occurred while creating coupon.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.coupon.list', 'Coupon has been created successfully' ,'success',false, false);
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

        $couponId = $request->id;
        $newDetails = $request->except('_token');

        $coupon = $this->couponRepository->updateCouponStatus($couponId,$newDetails);

        if ($coupon) {
            return response()->json(array('message'=>'Coupon status has been successfully updated'));
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
        $targetCoupon = $this->couponRepository->getCouponById($id);
        
        $this->setPageTitle('Coupon', 'Edit Coupon : '.$targetCoupon->title);
        return view('admin.coupon.edit', compact('targetCoupon'));
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
            'title' => 'required|max:191',
        ]);

        $couponId = $request->id;
        $newDetails = $request->except('_token');

        $coupon = $this->couponRepository->updateCoupon($couponId, $newDetails);

        if (!$coupon) {
            return $this->responseRedirectBack('Error occurred while updating coupon.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Coupon has been updated successfully' ,'success',false, false);
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
        $coupon = $this->couponRepository->deleteCoupon($id);

        if (!$coupon) {
            return $this->responseRedirectBack('Error occurred while deleting coupon.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.coupon.list', 'Coupon has been deleted successfully' ,'success',false, false);
        }
    }
}
