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
use App\Http\Controllers\Admin\SallerController;
use App\Http\Controllers\Admin\AddressController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'],function(){
    Route::get('admin/profile', [HomeController::class,'userProfile'])->name('user.profile');
    Route::post('admin/profile', [HomeController::class,'userProfileSave'])->name('user.profile.save');
    // Route::get('user/change/password','HomeController@changePassword')->name('user.changepassword');
    Route::post('admin/change/password', [HomeController::class,'updateUserPassword'])->name('admin.changepassword.save');

});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    // require 'custom/admin.php';
    Route::get('dashboard',function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    

    // category
    Route::group(['prefix' => 'category'], function() {
        Route::get('/', [CategoryController::class,'index'])->name('admin.category.list');
        Route::get('/create', [CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('/update', [CategoryController::class,'update'])->name('admin.category.update');
        Route::post('/updateStatus', [CategoryController::class,'updateStatus'])->name('admin.category.updateStatus');
        Route::get('/delete/{id}', [CategoryController::class,'destroy'])->name('admin.category.delete');
    });

    Route::group(['prefix' => 'level-two-category'], function() {
        Route::get('/', [LevelTwoCategoryController::class,'index'])->name('admin.level-two-category.list');
        Route::get('/create', [LevelTwoCategoryController::class,'create'])->name('admin.level-two-category.create');
        Route::post('/store', [LevelTwoCategoryController::class,'store'])->name('admin.level-two-category.store');
        Route::get('/edit/{id}', [LevelTwoCategoryController::class,'edit'])->name('admin.level-two-category.edit');
        Route::post('/update', [LevelTwoCategoryController::class,'update'])->name('admin.level-two-category.update');
        Route::post('/updateStatus', [LevelTwoCategoryController::class,'updateStatus'])->name('admin.level-two-category.updateStatus');
        Route::get('/delete/{id}', [LevelTwoCategoryController::class,'destroy'])->name('admin.level-two-category.delete');
    });
    

    Route::group(['prefix' => 'level-three-category'], function() {
        Route::get('/', [LevelThreeCategoryController::class,'index'])->name('admin.level-three-category.list');
        Route::get('/create', [LevelThreeCategoryController::class,'create'])->name('admin.level-three-category.create');
        Route::post('/store', [LevelThreeCategoryController::class,'store'])->name('admin.level-three-category.store');
        Route::get('/edit/{id}', [LevelThreeCategoryController::class,'edit'])->name('admin.level-three-category.edit');
        Route::post('/update', [LevelThreeCategoryController::class,'update'])->name('admin.level-three-category.update');
        Route::post('/updateStatus', [LevelThreeCategoryController::class,'updateStatus'])->name('admin.level-three-category.updateStatus');
        Route::get('/delete/{id}', [LevelThreeCategoryController::class,'destroy'])->name('admin.level-three-category.delete');
    });

    Route::group(['prefix' => 'level-four-category'], function() {
        Route::get('/', [LevelFourCategoryController::class,'index'])->name('admin.level-four-category.list');
        Route::get('/create', [LevelFourCategoryController::class,'create'])->name('admin.level-four-category.create');
        Route::post('/store', [LevelFourCategoryController::class,'store'])->name('admin.level-four-category.store');
        Route::get('/edit/{id}', [LevelFourCategoryController::class,'edit'])->name('admin.level-four-category.edit');
        Route::post('/update', [LevelFourCategoryController::class,'update'])->name('admin.level-four-category.update');
        Route::post('/updateStatus', [LevelFourCategoryController::class,'updateStatus'])->name('admin.level-four-category.updateStatus');
        Route::get('/delete/{id}', [LevelFourCategoryController::class,'destroy'])->name('admin.level-four-category.delete');
    });

    Route::group(['prefix' => 'level-five-category'], function() {
        Route::get('/', [LevelFiveCategoryController::class,'index'])->name('admin.level-five-category.list');
        Route::get('/create', [LevelFiveCategoryController::class,'create'])->name('admin.level-five-category.create');
        Route::post('/store', [LevelFiveCategoryController::class,'store'])->name('admin.level-five-category.store');
        Route::get('/edit/{id}', [LevelFiveCategoryController::class,'edit'])->name('admin.level-five-category.edit');
        Route::post('/update', [LevelFiveCategoryController::class,'update'])->name('admin.level-five-category.update');
        Route::post('/updateStatus', [LevelFiveCategoryController::class,'updateStatus'])->name('admin.level-five-category.updateStatus');
        Route::get('/delete/{id}', [LevelFiveCategoryController::class,'destroy'])->name('admin.level-five-category.delete');
    });

    Route::group(['prefix' => 'setting'], function() {
        Route::get('/', [SettingController::class,'index'])->name('admin.setting.list');
        Route::get('/create', [SettingController::class,'create'])->name('admin.setting.create');
        Route::post('/store', [SettingController::class,'store'])->name('admin.setting.store');
        Route::get('/edit/{id}', [SettingController::class,'edit'])->name('admin.setting.edit');
        Route::post('/update', [SettingController::class,'update'])->name('admin.setting.update');
        Route::post('/updateStatus', [SettingController::class,'updateStatus'])->name('admin.setting.updateStatus');
        Route::get('/delete/{id}', [SettingController::class,'destroy'])->name('admin.setting.delete');
    });

    Route::group(['prefix' => 'banner'], function() {
        Route::get('/', [BannerController::class,'index'])->name('admin.banner.list');
        Route::get('/create', [BannerController::class,'create'])->name('admin.banner.create');
        Route::post('/store', [BannerController::class,'store'])->name('admin.banner.store');
        Route::get('/edit/{id}', [BannerController::class,'edit'])->name('admin.banner.edit');
        Route::post('/update', [BannerController::class,'update'])->name('admin.banner.update');
        Route::post('/updateStatus', [BannerController::class,'updateStatus'])->name('admin.banner.updateStatus');
        Route::get('/delete/{id}', [BannerController::class,'destroy'])->name('admin.banner.delete');
    });

    Route::group(['prefix' => 'blog'], function() {
        Route::get('/', [BlogController::class,'index'])->name('admin.blog.list');
        Route::get('/create', [BlogController::class,'create'])->name('admin.blog.create');
        Route::post('/store', [BlogController::class,'store'])->name('admin.blog.store');
        Route::get('/edit/{id}', [BlogController::class,'edit'])->name('admin.blog.edit');
        Route::post('/update', [BlogController::class,'update'])->name('admin.blog.update');
        Route::post('/updateStatus', [BlogController::class,'updateStatus'])->name('admin.blog.updateStatus');
        Route::get('/delete/{id}', [BlogController::class,'destroy'])->name('admin.blog.delete');
    });

    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', [CustomerController::class,'index'])->name('admin.customer.list');
        Route::get('/create', [CustomerController::class,'create'])->name('admin.customer.create');
        Route::post('/store', [CustomerController::class,'store'])->name('admin.customer.store');
        Route::get('/edit/{id}', [CustomerController::class,'edit'])->name('admin.customer.edit');
        Route::post('/update', [CustomerController::class,'update'])->name('admin.customer.update');
        Route::post('/updateStatus', [CustomerController::class,'updateStatus'])->name('admin.customer.updateStatus');
        Route::get('/delete/{id}', [CustomerController::class,'destroy'])->name('admin.customer.delete');
    });

    Route::group(['prefix' => 'coupon'], function() {
        Route::get('/', [CouponController::class,'index'])->name('admin.coupon.list');
        Route::get('/create', [CouponController::class,'create'])->name('admin.coupon.create');
        Route::post('/store', [CouponController::class,'store'])->name('admin.coupon.store');
        Route::get('/edit/{id}', [CouponController::class,'edit'])->name('admin.coupon.edit');
        Route::post('/update', [CouponController::class,'update'])->name('admin.coupon.update');
        Route::post('/updateStatus', [CouponController::class,'updateStatus'])->name('admin.coupon.updateStatus');
        Route::get('/delete/{id}', [CouponController::class,'destroy'])->name('admin.coupon.delete');
    });

    Route::group(['prefix' => 'brand'], function() {
        Route::get('/', [BrandController::class,'index'])->name('admin.brand.list');
        Route::get('/create', [BrandController::class,'create'])->name('admin.brand.create');
        Route::post('/store', [BrandController::class,'store'])->name('admin.brand.store');
        Route::get('/edit/{id}', [BrandController::class,'edit'])->name('admin.brand.edit');
        Route::post('/update', [BrandController::class,'update'])->name('admin.brand.update');
        Route::post('/updateStatus', [BrandController::class,'updateStatus'])->name('admin.brand.updateStatus');
        Route::get('/delete/{id}', [BrandController::class,'destroy'])->name('admin.brand.delete');
    });

    Route::group(['prefix' => 'saller-management'], function() {
        Route::get('/', [SallerController::class,'index'])->name('admin.saller-management.list');
        Route::get('/create', [SallerController::class,'create'])->name('admin.saller-management.create');
        Route::post('/store', [SallerController::class,'store'])->name('admin.saller-management.store');
        Route::get('/edit/{id}', [SallerController::class,'edit'])->name('admin.saller-management.edit');
        Route::post('/update', [SallerController::class,'update'])->name('admin.saller-management.update');
        Route::post('/updateStatus', [SallerController::class,'updateStatus'])->name('admin.saller-management.updateStatus');
        Route::get('/delete/{id}', [SallerController::class,'destroy'])->name('admin.saller-management.delete');
    });

    Route::group(['prefix' => 'address'], function() {
        Route::get('/', [AddressController::class,'index'])->name('admin.address.list');
        Route::get('/create', [AddressController::class,'create'])->name('admin.address.create');
        Route::post('/store', [AddressController::class,'store'])->name('admin.address.store');
        Route::get('/edit/{id}', [AddressController::class,'edit'])->name('admin.address.edit');
        Route::post('/update', [AddressController::class,'update'])->name('admin.address.update');
        Route::post('/updateStatus', [AddressController::class,'updateStatus'])->name('admin.address.updateStatus');
        Route::get('/delete/{id}', [AddressController::class,'destroy'])->name('admin.address.delete');
    });
});