<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogPost;
use Illuminate\Http\Request;

class FrontendBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function FrontendBlog()
    {
        $blogcategorys = BlogCategory::latest()->get();
        $blogPosts = BlogPost::latest()->get();
    	return view('frontend.blog.blog_post_view',compact('blogcategorys','blogPosts'));
    }

    public function DetailsBlogPost($id){
        $blogcategorys = BlogCategory::latest()->get();
    	$blogPost = BlogPost::findOrFail($id);
    	return view('frontend.blog.blog_post_details',compact('blogPost','blogcategorys'));
    }

    public function BlogCatPost($id){
        $blogcategorys = BlogCategory::latest()->get();
        $blogPosts = BlogPost::where('category_id', $id)->orderBy('id', 'DESC')->get();
    	return view('frontend.blog.cat_blog_post_view',compact('blogcategorys','blogPosts'));
    }

    
}
