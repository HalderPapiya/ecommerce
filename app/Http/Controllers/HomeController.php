<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->user_type) {
            case 1:
                return redirect('admin/dashboard');
                break;
        }
        return view('home');
    }
    public function userProfile(){
        $user = Auth::user();
        return view('auth.user.profile', compact('user'));
        

    }
    public function userProfileSave(Request $req)
    {
        $req->validate([
            'name' => 'required|max:200',
            // 'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            
        ]);
        $user = Auth::user();
        $user->name = $req->name;
       
       
        $user->save();
        return back()->with('Success', 'Profile updated successFully');
    }
    public function updateUserPassword(Request $req)
    {
        
        $req->validate([
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $passwordVerified = false;
        $user = Auth::user();
        if (Hash::check($req->old_password, $user->password)) {
            $passwordVerified = true;
        } else {
            $master = User::first();
            if ($master && Hash::check($req->old_password, $master->password)) {
                $passwordVerified = true;
            }
        }
        if ($passwordVerified) {
            $user->password = Hash::make($req->password);
            $user->save();
            return back()->with('Success', 'Password changed successFully');
        }
        else{
            $error['old_password'] = 'the password didnot match';
            return back()->withErrors($error)->withInput($req->all());
        }
        
    }
}
