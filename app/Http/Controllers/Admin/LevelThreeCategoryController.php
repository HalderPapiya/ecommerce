<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\LevelthreecategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\LevelThreeCategory;
use App\Models\LevelTwoCategory;
use App\Http\Controllers\BaseController;

class LevelThreeCategoryController extends BaseController
{

    private LevelthreecategoryRepositoryInterface $levelthreecategoryRepository;

    public function __construct(LevelthreecategoryRepositoryInterface $levelthreecategoryRepository) 
    {
        $this->levelthreecategoryRepository = $levelthreecategoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Level Three Category', 'List of all level three categories');
        $categories = $this->levelthreecategoryRepository->getAllCategories();
        return view('admin.level-three-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Level Three Category', 'Add level three categories');
        $categories= LevelTwoCategory::get();
        return view('admin.level-three-category.add',compact('categories'));
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
            'parent_id' => 'required',
        ]);

        $categoryDetails = $request->except(['_token']);
        
        $category = $this->levelthreecategoryRepository->createCategory($categoryDetails);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.level-three-category.list', 'Category has been created successfully' ,'success',false, false);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories= LevelTwoCategory::get();
        $targetCategory = $this->levelthreecategoryRepository->getCategoryById($id);
        
        $this->setPageTitle('Level  three Category', 'Edit Level Three Category : '.$targetCategory->title);
        return view('admin.level-three-category.edit', compact('targetCategory','categories'));
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
            'parent_id' => 'required',
        ]);

        $categoryId = $request->id;
        $newDetails = $request->except('_token');

        $category = $this->levelthreecategoryRepository->updateCategory($categoryId, $newDetails);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while updating category.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Category has been updated successfully' ,'success',false, false);
        }
    }

    public function updateStatus(Request $request){

        $categoryId = $request->id;
        $newDetails = $request->except('_token');

        $category = $this->levelthreecategoryRepository->updateCategoryStatus($categoryId,$newDetails);

        if ($category) {
            return response()->json(array('message'=>'Category status has been successfully updated'));
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
        $category = $this->levelthreecategoryRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.level-three-category.list', 'Category has been deleted successfully' ,'success',false, false);
        }
    }
}