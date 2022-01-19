<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\Admin\AdminService;

class ProfileController extends BaseController
{
    protected $adminService;
    
    /**
     * ProfileController constructor
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userProfile()
    {
		$profile = $this->adminService->fetchProfile(Auth::user()->id);
        $this->setPageTitle('Profile', 'Manage Profile');
        return view('auth.user.profile', compact('profile'));
    }

    /**
     * @param Request $request
     */
    public function userProfileSave(Request $request)
    {
        $updateRequest = $request->all();
        $id = Auth::user()->id;

        $this->adminService->updateProfile($updateRequest, $id);
        return back()->with('Success', 'Profile updated successFully');
    }

    /**
     * @param Request $request
     */
    public function updateUserPassword(Request $request) {
        $id = Auth::user()->id;
        $info = $this->adminService->changePassword($request, $id);

        if ($info['type'] == 'error') {
            return $this->responseRedirectBack($info['message'], $info['type'], true, true, '#password');
        } else {
            return $this->responseRedirectBack($info['message'], $info['type'], false, false, '#password');
        }
    }





    // public function userProfile(){
    //     $user = Auth::user();
    //     return view('auth.user.profile', compact('user'));
        

    // }
    // public function userProfileSave(Request $req)
    // {
    //     $req->validate([
    //         'name' => 'required|max:200',
    //         // 'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            
    //     ]);
    //     $user = Auth::user();
    //     $user->name = $req->name;
       
       
    //     $user->save();
    //     return back()->with('Success', 'Profile updated successFully');
    // }
    // public function updateUserPassword(Request $req)
    // {
        
    //     $req->validate([
    //         'old_password' => ['required', 'string'],
    //         'password' => ['required', 'string', 'min:6', 'confirmed'],
    //     ]);
    //     $passwordVerified = false;
    //     $user = Auth::user();
    //     if (Hash::check($req->old_password, $user->password)) {
    //         $passwordVerified = true;
    //     } else {
    //         $master = Admin::first();
    //         if ($master && Hash::check($req->old_password, $master->password)) {
    //             $passwordVerified = true;
    //         }
    //     }
    //     if ($passwordVerified) {
    //         $user->password = Hash::make($req->password);
    //         $user->save();
    //         return back()->with('Success', 'Password changed successFully');
    //     }
    //     else{
    //         $error['old_password'] = 'the password didnot match';
    //         return back()->withErrors($error)->withInput($req->all());
    //     }
        
    // }
}



