<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\BankRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Bank;
use App\Http\Controllers\BaseController;
use Auth;

class BankController extends BaseController
{

    private BankRepositoryInterface $bankRepository;

    public function __construct(BankRepositoryInterface $bankRepository) 
    {
        $this->bankRepository = $bankRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Bank', 'List of all bank');
        $banks = $this->bankRepository->getAllBank();
        return view('admin.bank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Bank', 'Add Bank');
        return view('admin.bank.add');
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
            'bank_name' => 'required|max:191',
            'beneficiary_name' => 'required|max:191',
            'branch_name' => 'required|max:191',
            'acount_no' => 'required|max:191',
        ]);
        $userId =  Auth::user()->id;
        
        $bankDetails = $request->except(['_token']);
     
        // dd($addressDetails);
        $bank = $this->bankRepository->createBank($bankDetails, $userId);

        if (!$bank) {
            return $this->responseRedirectBack('Error occurred while creating bank.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.bank.list', 'Bank has been bank successfully' ,'success',false, false);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $bankId = $request->id;
        $newDetails = $request->except('_token');

        $bank = $this->bankRepository->updateBankStatus($bankId,$newDetails);

        if ($bank) {
            return response()->json(array('message'=>'Bank status has been successfully updated'));
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
        $targetBank = $this->bankRepository->getBankById($id);
        
        $this->setPageTitle('Bank', 'Edit Bank : '.$targetBank->title);
        return view('admin.bank.edit', compact('targetBank'));
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
            'bank_name' => 'required|max:191',
            'beneficiary_name' => 'required|max:191',
            'branch_name' => 'required|max:191',
            'acount_no' => 'required|max:191',
        ]);

        $bankId = $request->id;
        $userId =  Auth::user()->id;
        $newDetails = $request->except('_token');
        // dd($newDetails);
        $bank = $this->bankRepository->updateBank( $bankId,$newDetails,$userId);
        // dd($address);
        if (!$bank) {
            return $this->responseRedirectBack('Error occurred while updating Bank.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Bank has been updated successfully' ,'success',false, false);
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
        $bank = $this->bankRepository->deleteBank($id);

        if (!$bank) {
            return $this->responseRedirectBack('Error occurred while deleting bank.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.bank.list', 'Bank has been deleted successfully' ,'success',false, false);
        }
    }
}
