<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogPost;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('role');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function BlogCategory()
    {
        $blogcategorys = BlogCategory::latest()->get();
    	return view('backend.blog.category.category_view',compact('blogcategorys'));
    } // End Method
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function BlogCategoryStore(Request $request)
    {
        $this->validate($request, [
            'blog_category_name_en' => 'required',
            'blog_category_name_bn' => 'required',
        ], [
            'blog_category_name_en.required' => 'Input Blog Category English',
            'blog_category_name_bn.required' => 'Input Blog Category Bangla',
        ]);
        
         // slug insert 
         $str_en   = $request->blog_category_name_en;  
         $str_bn   = $request->blog_category_name_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
         
         // Date insert
         BlogCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_bn' => $request->blog_category_name_bn,
            'blog_category_slug_en' => $slug_en,
            'blog_category_slug_bn' => $slug_bn,
            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Blog Category Inserted Successfully');
        return redirect()->back();
    } // End Method

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function BlogCategoryEdit($id)
    {
        $blogcategory = BlogCategory::find($id);
    	return view('backend.blog.category.category_edit',compact('blogcategory'));
    } // End Method

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function BlogCategoryUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'blog_category_name_en' => 'required',
            'blog_category_name_bn' => 'required',
        ], [
            'blog_category_name_en.required' => 'Input Blog Category English',
            'blog_category_name_bn.required' => 'Input Blog Category Bangla',
        ]);
        
         // slug insert 
         $str_en   = $request->blog_category_name_en;  
         $str_bn   = $request->blog_category_name_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
         
         // Date insert
         BlogCategory::find($id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_bn' => $request->blog_category_name_bn,
            'blog_category_slug_en' => $slug_en,
            'blog_category_slug_bn' => $slug_bn,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Blog Category Update Successfully');
        return redirect()->route('blog.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function BlogCategoryDestroy($id)
    {
        BlogCategory::find($id)->delete();
        
        Session::flash('warning', 'Blog Category Delete');
        return redirect()->back();
    }
    

    // ==================================
    // ==========All Blog Post==========
    // ==================================

    public function AllBlogPost()
    {
        $allBlogPosts = BlogPost::latest()->get();
    	return view('backend.blog.post.all_blog_post',compact('allBlogPosts'));
    } // End Method

    public function BlogPostAdd()
    {
        $blogcategorys = BlogCategory::latest()->get();
    	return view('backend.blog.post.add_blog_post', compact('blogcategorys'));
    } // End Method

    public function BlogPostStore(Request $request)
    {
        $this->validate($request, [
            'post_title_en' => 'required',
            'post_title_bn' => 'required',
            'category_id' => 'required',
            'post_image' => 'required',
            'post_details_en' => 'required',
            'post_details_bn' => 'required',
        ]);
        
         // slug insert 
         $str_en   = $request->post_title_en;  
         $str_bn   = $request->post_title_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));

         // Thumbnail Image insert
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('upload/blog/post/'.$name_gen);
        $save_url = 'upload/blog/post/'.$name_gen;
         
         // Date insert
         BlogPost::insert([
            'post_title_en' => $request->post_title_en,
            'post_title_bn' => $request->post_title_bn,
            'category_id' => $request->category_id,
            'post_details_en' => $request->post_details_en,
            'post_details_bn' => $request->post_details_bn,
            'post_slug_en' => $slug_en,
            'post_slug_bn' => $slug_bn,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Blog Post Inserted Successfully');
        return redirect()->route('all.blog.post');
    } // End Method

    public function BlogPostEdit($id)
    {
        $blogPost = BlogPost::find($id);
        $blogcategorys = BlogCategory::latest()->get();
    	return view('backend.blog.post.blog_post_edit',compact('blogcategorys','blogPost'));
    } // End Method

    public function BlogPostUpdate(Request $request)
    {
        $id = $request->blog_post_id;
        $old_image = $request->old_image;

        $this->validate($request, [
            'post_title_en' => 'required',
            'post_title_bn' => 'required',
            'category_id' => 'required',
            'post_details_en' => 'required',
            'post_details_bn' => 'required',
        ]);

        if ($request->file('post_image')) {

            // slug insert 
            $str_en   = $request->post_title_en;  
            $str_bn   = $request->post_title_bn;
            $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
            $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));

            unlink($old_image);
            // Thumbnail Image insert
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(780,433)->save('upload/blog/post/'.$name_gen);
            $save_url = 'upload/blog/post/'.$name_gen;
            
            // Date insert
            BlogPost::find($id)->update([
                'post_title_en' => $request->post_title_en,
                'post_title_bn' => $request->post_title_bn,
                'category_id' => $request->category_id,
                'post_details_en' => $request->post_details_en,
                'post_details_bn' => $request->post_details_bn,
                'post_slug_en' => $slug_en,
                'post_slug_bn' => $slug_bn,
                'post_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            Session::flash('success', 'Blog Post Update Successfully');
            return redirect()->route('all.blog.post');
        } else {
            // slug insert 
            $str_en   = $request->post_title_en;  
            $str_bn   = $request->post_title_bn;
            $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
            $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));

            
            // Date insert
            BlogPost::find($id)->update([
                'post_title_en' => $request->post_title_en,
                'post_title_bn' => $request->post_title_bn,
                'category_id' => $request->category_id,
                'post_details_en' => $request->post_details_en,
                'post_details_bn' => $request->post_details_bn,
                'post_slug_en' => $slug_en,
                'post_slug_bn' => $slug_bn,
                'updated_at' => Carbon::now(),
            ]);
            Session::flash('success', 'Blog Post Update Successfully');
            return redirect()->route('all.blog.post');
        }
        
    } // End Method

    public function BlogPostDestroy($id)
    {
        $Blog_post = BlogPost::find($id);
        unlink($Blog_post->post_image);
        $Blog_post->delete();
        Session::flash('warning', 'Blog Post Delete');
        return redirect()->back();
    }




}
