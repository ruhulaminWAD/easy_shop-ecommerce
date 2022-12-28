<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use Session;

class SubSubCategoryController extends Controller
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
        $subsubcategorys = Subsubcategory::latest()->get();
        // $categorys = Category::latest()->get();
        $categorys = Category::orderby('category_name_en', 'ASC')->get();
        return view('backend.category.subsubcategory.index', compact('subsubcategorys', 'categorys'));
    } // End Index Mathod

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  json File
    public function GetSubCategory($category_id)
    {
        $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    } // End GetSubCategory Mathod

    public function GetSubSubCategory($subcategory_id)
    {
        $subsubcat = Subsubcategory::where('subcategory_id',$subcategory_id)->orderBy('sub_subcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    } // End GetSubCategory Mathod

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sub_subcategory_name_en' => 'required',
            'sub_subcategory_name_bn' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ], [
            'sub_subcategory_name_en.required' => 'Input SubsubCategory English',
            'sub_subcategory_name_bn.required' => 'Input SubsubCategory Bangla',
        ]);
        
         // slug insert 
         $str_en   = $request->sub_subcategory_name_en;  
         $str_bn   = $request->sub_subcategory_name_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
         
         // Date insert
        Subsubcategory::insert([
            'category_id'             => $request->category_id,
            'subcategory_id'          => $request->subcategory_id,
            'sub_subcategory_name_en' => $request->sub_subcategory_name_en,
            'sub_subcategory_name_bn' => $request->sub_subcategory_name_bn,
            'sub_subcategory_slug_en' => $slug_en,
            'sub_subcategory_slug_bn' => $slug_bn,
        ]);
        Session::flash('success', 'SubsubCategory Inserted Successfully');
        return redirect()->back();
    } // End Store Mathod

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
        $categorys = Category::orderby('category_name_en', 'ASC')->get();
        $subcategorys = Subcategory::orderby('subcategory_name_en', 'ASC')->get();
        $subsubcategory = Subsubcategory::find($id);
        return view('backend.category.subsubcategory.edit', compact('categorys', 'subcategorys', 'subsubcategory',));
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
        $id = $request->subsubcategory_id;
        $this->validate($request, [
            'sub_subcategory_name_en' => 'required',
            'sub_subcategory_name_bn' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ], [
            'sub_subcategory_name_en.required' => 'Input SubsubCategory English',
            'sub_subcategory_name_bn.required' => 'Input SubsubCategory Bangla',
        ]);
        
         // slug insert 
         $str_en   = $request->sub_subcategory_name_en;  
         $str_bn   = $request->sub_subcategory_name_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
         
         // Date insert
        Subsubcategory::findOrFail($id)->update([
            'category_id'             => $request->category_id,
            'subcategory_id'          => $request->subcategory_id,
            'sub_subcategory_name_en' => $request->sub_subcategory_name_en,
            'sub_subcategory_name_bn' => $request->sub_subcategory_name_bn,
            'sub_subcategory_slug_en' => $slug_en,
            'sub_subcategory_slug_bn' => $slug_bn,
        ]);
        Session::flash('success', 'SubsubCategory Update Successfully');
        return redirect()->route('SubSubCategory.view');

    } // End Update Mathod

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Subsubcategory = Subsubcategory::find($id);
        $Subsubcategory->delete();
        Session::flash('warning', 'SubsubCategory Delete Successfully');
        return redirect()->back();
    }
}
