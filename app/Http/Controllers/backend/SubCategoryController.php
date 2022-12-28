<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Session;

class SubCategoryController extends Controller
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
        $subcategorys = Subcategory::latest()->get();
        $categorys = Category::latest()->get();
        return view('backend.category.subcategory.index', compact('subcategorys', 'categorys'));
    } // End Index Mathod

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
        ], [
            'subcategory_name_en.required' => 'Input SubCategory English',
            'subcategory_name_bn.required' => 'Input SubCategory Bangla',
        ]);
        
         // slug insert 
         $str_en   = $request->subcategory_name_en;  
         $str_bn   = $request->subcategory_name_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
         
         // Date insert
        Subcategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'category_id' => $request->category_id,
            'subcategory_slug_en' => $slug_en,
            'subcategory_slug_bn' => $slug_bn,
        ]);
        Session::flash('success', 'SubCategory Inserted Successfully');
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
        $subcategory = Subcategory::findOrFail($id);
        $categorys = Category::latest()->get();
        return view('backend.category.subcategory.edit', compact('subcategory', 'categorys'));
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
        $id = $request->subcategory_id;

        $this->validate($request, [
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
        ], [
            'subcategory_name_en.required' => 'Input SubCategory English',
            'subcategory_name_bn.required' => 'Input SubCategory Bangla',
        ]);
        
         // slug insert 
         $str_en   = $request->subcategory_name_en;  
         $str_bn   = $request->subcategory_name_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
         
         // Date insert
        Subcategory::findOrFail($id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'category_id' => $request->category_id,
            'subcategory_slug_en' => $slug_en,
            'subcategory_slug_bn' => $slug_bn,
        ]);
        Session::flash('success', 'SubCategory Update Successfully');
        return redirect()->route('SubCategory.view');
    } // End Update Mathod

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Subcategory = Subcategory::find($id);
        $Subcategory->delete();
        Session::flash('warning', 'SubCategory Delete Successfully');
        return redirect()->back();
    } // End destroy Mathod
}
