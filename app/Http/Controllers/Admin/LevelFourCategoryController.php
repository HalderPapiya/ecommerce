<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\LevelfourcategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\LevelFourCategory;
use App\Models\LevelThreeCategory;
use App\Http\Controllers\BaseController;

class LevelFourCategoryController extends BaseController
{

    
    private LevelfourcategoryRepositoryInterface $levelfourcategoryRepository;

    public function __construct(LevelfourcategoryRepositoryInterface $levelfourcategoryRepository) 
    {
        
        $this->levelfourcategoryRepository = $levelfourcategoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $this->setPageTitle('Level Four Category', 'List of all level four categories');
        
        $categories = $this->levelfourcategoryRepository->getAllCategories();
        return view('admin.level-four-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Level Four Category', 'Add level four categories');
        
        $categories= LevelThreeCategory::get();
        return view('admin.level-four-category.add',compact('categories'));
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
        
        $category = $this->levelfourcategoryRepository->createCategory($categoryDetails);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.level-four-category.list', 'Category has been created successfully' ,'success',false, false);
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
        $categories= LevelThreeCategory::get();
        $targetCategory = $this->levelfourcategoryRepository->getCategoryById($id);
        
        $this->setPageTitle('Level Four Category', 'Edit Level Four Category : '.$targetCategory->title);
        return view('admin.level-four-category.edit', compact('targetCategory','categories'));
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

        $category = $this->levelfourcategoryRepository->updateCategory($categoryId, $newDetails);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while updating category.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Category has been updated successfully' ,'success',false, false);
        }
    }

    public function updateStatus(Request $request){

        $categoryId = $request->id;
        $newDetails = $request->except('_token');

        $category = $this->levelfourcategoryRepository->updateCategoryStatus($categoryId,$newDetails);

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
        $category = $this->levelfourcategoryRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.level-four-category.list', 'Category has been deleted successfully' ,'success',false, false);
        }
    }
}