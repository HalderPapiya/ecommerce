<?php

namespace App\Interfaces;

interface BlogRepositoryInterface 
{
    public function getAllBlogs();
    public function getBlogById($blogId);
    public function deleteBlog($blogId);
    public function createBlog(array $blogIdIdDetails);
    public function updateBlog($blogId, array $newDetails);
    public function updateBlogStatus($blogId, array $newDetails);
    
    // public function getFulfilledCategories();
}