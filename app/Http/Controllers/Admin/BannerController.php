<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\BannerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Banner;
use App\Http\Controllers\BaseController;
use Validator;

class BannerController extends BaseController
{

    private BannerRepositoryInterface $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository) 
    {
        $this->bannerRepository = $bannerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Banner', 'List of all banner');
        $banners = $this->bannerRepository->getAllBanners();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Banner', 'Add baner');
        return view('admin.banner.add');
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
            'image'     =>  'required|mimes:jpg,jpeg,png|max:1000',
            'description' => 'required',
            'redirect_link' => 'required|url',
        ]);

        $bannerDetails = $request->except(['_token']);
        
        $banner = $this->bannerRepository->createBanner($bannerDetails);

        if (!$banner) {
            return $this->responseRedirectBack('Error occurred while creating banner.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.banner.list', 'Banner has been banner successfully' ,'success',false, false);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $bannerId = $request->id;
        $newDetails = $request->except('_token');

        $banner = $this->bannerRepository->updateBannerStatus($bannerId,$newDetails);

        if ($banner) {
            return response()->json(array('message'=>'Banner status has been successfully updated'));
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
        $targetBanner = $this->bannerRepository->getBannerById($id);
        
        $this->setPageTitle('Levevl  one Banner', 'Edit Level One Banner : '.$targetBanner->title);
        return view('admin.banner.edit', compact('targetBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'title' => 'required|max:191',
        // ]);

        // $bannerId = $request->id;
        // $newDetails = $request->except('_token');

        // $banner = $this->bannerRepository->updateBanner($bannerId, $newDetails);

        // if (!$banner) {
        //     return $this->responseRedirectBack('Error occurred while updating Banner.', 'error', true, true);
        // } else {
        //     return $this->responseRedirectBack('Banner has been updated successfully' ,'success',false, false);
        // }


        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'redirect_link' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time().".".$request->image->getClientOriginalName();
            $request->image->move("banners/",$imageName);
            $image = $imageName;
       
            Banner::where('id', $id)->update([
                'image' => $image,
            ]);
        }

       
        Banner::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'redirect_link' => $request->redirect_link,
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
        $banner = $this->bannerRepository->deleteBanner($id);

        if (!$banner) {
            return $this->responseRedirectBack('Error occurred while deleting banner.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.banner.list', 'Banner has been deleted successfully' ,'success',false, false);
        }
    }
}