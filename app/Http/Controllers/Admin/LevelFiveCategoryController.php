<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\LevelfivecategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\LevelFiveCategory;
use App\Models\LevelFourCategory;
use App\Http\Controllers\BaseController;

class LevelFiveCategoryController extends BaseController
{

    private LevelfivecategoryRepositoryInterface $levelfiecategoryRepository;

    public function __construct(LevelfivecategoryRepositoryInterface $levelfivecategoryRepository) 
    {
        
        $this->levelfivecategoryRepository = $levelfivecategoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Level Five Category', 'List of all level five categories');
        $categories = $this->levelfivecategoryRepository->getAllCategories();
        return view('admin.level-five-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Level One Category', 'Add level one categories');
        $categories= LevelFourCategory::get();
        return view('admin.level-five-category.add',compact('categories'));
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
        
        $category = $this->levelfivecategoryRepository->createCategory($categoryDetails);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.level-five-category.list', 'Category has been created successfully' ,'success',false, false);
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
        $categories= LevelFourCategory::get();
        $targetCategory = $this->levelfivecategoryRepository->getCategoryById($id);
        
        $this->setPageTitle('Level One Category', 'Edit Level One Category : '.$targetCategory->title);
        return view('admin.level-five-category.edit', compact('targetCategory','categories'));
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

    // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:191',
            'parent_id' => 'required',
        ]);

        $categoryId = $request->id;
        $newDetails = $request->except('_token');

        $category = $this->levelfivecategoryRepository->updateCategory($categoryId, $newDetails);
        // dd($category);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while updating category.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Category has been updated successfully' ,'success',false, false);
        }
    }


    public function updateStatus(Request $request){

        // dd($request->all());
        $categoryId = $request->id;
        $newDetails = $request->except('_token');

        $category = $this->levelfivecategoryRepository->updateCategoryStatus($categoryId,$newDetails);

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
        $category = $this->levelfivecategoryRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.level-five-category.list', 'Category has been deleted successfully' ,'success',false, false);
        }
    }
}