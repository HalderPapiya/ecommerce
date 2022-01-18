<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface 
{
    public function getAllBlogs()
    {
        return Blog::all();
    }

    public function getBlogById($blogId)
    {
        return Blog::findOrFail($blogId);
    }

    public function deleteBlog($blogId)
    {
        return Blog::destroy($blogId);
    }

    public function createBlog(array $blogIdDetails)
    {
        // return Blog::create($blogIdDetails);

        $collection = collect($blogIdDetails);

        $Blog = new Blog;
        $Blog->title = $collection['title'];
        $Blog->description = $collection['description'];

        $profile_image = $collection['image'];
        $imageName = time().".".$profile_image->getClientOriginalName();
        $profile_image->move("blogs/",$imageName);
        $uploadedImage = $imageName;
        $Blog->image = $uploadedImage;
        
        $Blog->save();

        return $Blog;
    }

    public function updateBlog($blogId, array $newDetails) 
    {
        return Blog::whereId($blogId)->update($newDetails);
    }

    // public function getFulfilledCategories()
    // {
    //     return Order::where('is_fulfilled', true);
    // }

    public function updateBlogStatus($blogId, array $newDetails)
    {
        return Blog::whereId($blogId)->update($newDetails);
    }

}