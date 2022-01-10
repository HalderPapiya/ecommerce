<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\SettingRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Stting;
use App\Http\Controllers\BaseController;

class SettingController extends BaseController
{

    private SettingRepositoryInterface $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository) 
    {
        $this->settingRepository = $settingRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Setting', 'List of all settings');
        $settings = $this->settingRepository->getAllSettings();
        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Setting', 'Add  Settings');
        return view('admin.setting.add');
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

        $settingDetails = $request->except(['_token']);
        
        $setting = $this->settingRepository->createSetting($settingDetails);

        if (!$setting) {
            return $this->responseRedirectBack('Error occurred while creating setting.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.setting.list', 'Setting has been created successfully' ,'success',false, false);
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
        $targetSetting = $this->settingRepository->getSettingById($id);
        
        $this->setPageTitle('Setting', 'Edit Setting : '.$targetSetting->title);
        return view('admin.setting.edit', compact('targetSetting'));
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
        ]);

        $settingId = $request->id;
        $newDetails = $request->except('_token');

        $setting = $this->settingRepository->updateSetting($settingId, $newDetails);
        // dd($setting);

        if (!$setting) {
            return $this->responseRedirectBack('Error occurred while updating settng.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Setting has been updated successfully' ,'success',false, false);
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
        $category = $this->settingRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while deleting setting.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.setting.list', 'Sttinge has been deleted successfully' ,'success',false, false);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $settingId = $request->id;
        $newDetails = $request->except('_token');

        $category = $this->settingRepository->updateSettingStatus($settingId,$newDetails);

        if ($category) {
            return response()->json(array('message'=>'Setting status has been successfully updated'));
        }
    }
}