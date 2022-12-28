<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
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
    public function index()
    {
        $categorys = Category::latest()->get();
        return view('backend.category.index', compact('categorys'));
    } // End Index Mathod

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name_en.required' => 'Input Category English',
            'category_name_bn.required' => 'Input Category Bangla',
        ]);
        
         // slug insert 
         $str_en   = $request->category_name_en;  
         $str_bn   = $request->category_name_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
         
         // Date insert
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_icon' => $request->category_icon,
            'category_slug_en' => $slug_en,
            'category_slug_bn' => $slug_bn,
        ]);
        Session::flash('success', 'Category Inserted Successfully');
        return redirect()->back();
    } // End Store Mathod

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    } // End Edit Mathod

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->category_id;
        $this->validate($request, [
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name_en.required' => 'Input Category English',
            'category_name_bn.required' => 'Input Category Bangla',
        ]);
        
         // slug insert 
         $str_en   = $request->category_name_en;  
         $str_bn   = $request->category_name_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
         
         // Date insert
        Category::findOrFail($id)->update([
            'category_name_en'  => $request->category_name_en,
            'category_name_bn'  => $request->category_name_bn,
            'category_icon'     => $request->category_icon,
            'category_slug_en'  => $slug_en,
            'category_slug_bn'  => $slug_bn,
        ]);
        Session::flash('success', 'Category Update Successfully');
        return redirect()->route('category.view');
    } // End Update Mathod

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('warning', 'Category Delete Successfully');
        return redirect()->back();
    } // End Destroy Mathod
}
