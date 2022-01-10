<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\BlogRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Blog;
use App\Http\Controllers\BaseController;

class BlogController extends BaseController
{
    private BlogRepositoryInterface $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository) 
    {
        $this->blogRepository = $blogRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Blog', 'List of all blog');
        $blogs = $this->blogRepository->getAllBlogs();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Blog', 'Add blog');
        return view('admin.blog.add');
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
        ]);

        $blogDetails = $request->except(['_token']);
        
        $blog = $this->blogRepository->createBlog($blogDetails);

        if (!$blog) {
            return $this->responseRedirectBack('Error occurred while creating blog.', 'error', true, true);
        }
        else{
            return $this->responseRedirect('admin.blog.list', 'Banner has been blog successfully' ,'success',false, false);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $blogId = $request->id;
        $newDetails = $request->except('_token');

        $blog = $this->blogRepository->updateBlogStatus($blogId,$newDetails);

        if ($blog) {
            return response()->json(array('message'=>'Blog status has been successfully updated'));
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
        $targetBlog = $this->blogRepository->getBlogById($id);
        
        $this->setPageTitle('Levevl  one Blog', 'Edit Level One Blog : '.$targetBlog->title);
        return view('admin.blog.edit', compact('targetBlog'));
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
            'title' => 'required|max:191',
        ]);

        $blogId = $request->id;
        $newDetails = $request->except('_token');

        $blog = $this->blogRepository->updateBlog($blogId, $newDetails);

        if (!$blog) {
            return $this->responseRedirectBack('Error occurred while updating Blog.', 'error', true, true);
        } else {
            return $this->responseRedirectBack('Blog has been updated successfully' ,'success',false, false);
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
        $blog = $this->blogRepository->deleteBlog($id);

        if (!$blog) {
            return $this->responseRedirectBack('Error occurred while deleting blog.', 'error', true, true);
        } else {
            return $this->responseRedirect('admin.blog.list', 'Blog has been deleted successfully' ,'success',false, false);
        }
    }
}