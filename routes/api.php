<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/product/manage', [ProductController::class,'manage'])->name('admin.product.manage.category');
Route::post('/product/manage/level-two', [ProductController::class,'manageLavelTwo'])->name('admin.product.manage.category.level-two');
Route::post('/product/manage/level-three', [ProductController::class,'manageLavelThree'])->name('admin.product.manage.category.level-three');
Route::post('/product/manage/level-four', [ProductController::class,'manageLavelFour'])->name('admin.product.manage.category.level-four');
Route::post('/product/manage/level-five', [ProductController::class,'manageLavelFive'])->name('admin.product.manage.category.level-five');