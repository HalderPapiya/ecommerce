<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LevelTwoCategoryController;
use App\Http\Controllers\Admin\LevelThreeCategoryController;
use App\Http\Controllers\Admin\LevelFourCategoryController;
use App\Http\Controllers\Admin\LevelFiveCategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('admin/login', [LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');

// Route::group(['middleware' => 'auth'],function(){
//     Route::get('admin/profile', [HomeController::class,'userProfile'])->name('user.profile');
//     Route::post('admin/profile', [HomeController::class,'userProfileSave'])->name('user.profile.save');
//     // Route::get('user/change/password','HomeController@changePassword')->name('user.changepassword');
//     Route::post('admin/change/password', [HomeController::class,'updateUserPassword'])->name('admin.changepassword.save');
// });
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    require 'custom/admin.php';
   
});