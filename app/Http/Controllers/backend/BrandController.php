<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;
use Image;
use Session;

class BrandController extends Controller
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
        $brands = Brand::latest()->get();
        $brands = User::latest()->get();
        return view('backend.brand.index', compact('brands'));
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
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name_en.required' => 'Input Brand English',
            'brand_name_bn.required' => 'Input Brand Bangla',
        ]);

        
        // Brand Image insert
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;
        
         // slug insert 
         $str_en   = $request->brand_name_en;  
         $str_bn   = $request->brand_name_bn;
         $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
         $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
         
         // Date insert
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_bn' => $request->brand_name_bn,
            'brand_slug_en' => $slug_en,
            'brand_slug_bn' => $slug_bn,
            'brand_image' => $save_url,
        ]);
        Session::flash('success', 'Brand Inserted Successfully');
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
    //    $brand = Brand::find($id);
       $brand = Brand::findOrFail($id);
       return view('backend.brand.edit', compact('brand'));
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
        $id = $request->brand_id;
        $old_image = $request->old_image;

        $this->validate($request, [
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
        ], [
            'brand_name_en.required' => 'Input Brand English',
            'brand_name_bn.required' => 'Input Brand Bangla',
        ]);
        
 
        if($request->file('brand_image')) {
            // Brand Image insert
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;
            
            // slug insert 
            $str_en   = $request->brand_name_en;  
            $str_bn   = $request->brand_name_bn;
            $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
            $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
            
            // Date insert
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => $slug_en,
                'brand_slug_bn' => $slug_bn,
                'brand_image' => $save_url,
            ]);
            Session::flash('success', 'Brand Update Successfully');
            return redirect()->route('brand.view');
        }else {
            // slug insert 
            $str_en   = $request->brand_name_en;  
            $str_bn   = $request->brand_name_bn;
            $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
            $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));
            
            // Date insert
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => $slug_en,
                'brand_slug_bn' => $slug_bn,
            ]);
            Session::flash('success', 'Brand Update Successfully');
            return redirect()->route('brand.view');
        }
    } // End Update Mathod

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand_image = $brand->brand_image;
        unlink($brand_image);
        $brand->delete();
        Session::flash('warning', 'Brand Delete Successfully');
        return redirect()->back();

        
    } // End destroy Mathod
}
