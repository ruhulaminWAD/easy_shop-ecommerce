<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Multiimage;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Carbon\Carbon;
use Image;
use Session;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $products = Product::latest()->get();
        return view('backend.product.index', compact('products'));
    } // End Index Mathod

    public function ProductStock()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_stock',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderby('brand_name_en', 'ASC')->get();
        $categorys = Category::orderby('category_name_en', 'ASC')->get();
        $subcategorys = Subcategory::orderby('subcategory_name_en', 'ASC')->get();
        $Subsubcategorys = Subsubcategory::orderby('sub_subcategory_name_en', 'ASC')->get();
        
        return view('backend.product.create', compact('brands', 'categorys', 'subcategorys', 'Subsubcategorys'));
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
            'brand_id'             => 'required',
            'category_id'          => 'required',
            'subcategory_id'       => 'required',
            'subsubcategory_id'    => 'required',
            'product_name_en'      => 'required',
            'product_name_bn'      => 'required',
            'product_code'         => 'required',
            'product_qty'          => 'required',
            'selling_price'        => 'required',
            'short_description_en' => 'required',
            'short_description_bn' => 'required',
            'long_description_en'  => 'required',
            'long_description_bn'  => 'required',
            'product_thumbnail'    => 'required',
        ]);

        // Thumbnail Image insert
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/product/thumbnail_image/'.$name_gen);
        $save_url = 'upload/product/thumbnail_image/'.$name_gen;
       
        // slug insert 
        $str_en   = $request->product_name_en;  
        $str_bn   = $request->product_name_bn;
        $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
        $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));

        // Date insert
        $product = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => $slug_en,
            'product_slug_bn' => $slug_bn,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_bn' => $request->short_description_bn,
            'long_description_en' => $request->long_description_en,
            'long_description_bn' => $request->long_description_bn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'special_deals' => $request->special_deals,
            'status' => 1,

            'product_thumbnail' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        // Multiple Image insert
        $images = $request->file('muli_image');
        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/product/multiple_image/'.$name_gen);
            $save_url_multi = 'upload/product/multiple_image/'.$name_gen;

            // Date insert
            Multiimage::insert([
                'product_id' => $product,
                'photo_name' => $save_url_multi,
                'created_at' => Carbon::now(),
            ]);

        } // End foreach
        // End Multiple Image insert
        
        Session::flash('success', 'Product Inserted Successfully');
        return redirect()->route('product.view');
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
        $brands = Brand::latest()->get();
        $categorys = Category::latest()->get();
        $subcategorys = Subcategory::latest()->get();
        $Subsubcategorys = Subsubcategory::latest()->get();
        $products = Product::findOrFail($id);
        $multiImgs = Multiimage::where('product_id', $id)->get();
        
        return view('backend.product.edit', compact('brands', 'categorys', 'subcategorys', 'Subsubcategorys', 'products', 'multiImgs'));
    }// End Edit Mathod

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dataUpdate(Request $request)
    {
        $id = $request->product_id;
        $this->validate($request, [
            'brand_id'             => 'required',
            'category_id'          => 'required',
            'subcategory_id'       => 'required',
            'subsubcategory_id'    => 'required',
            'product_name_en'      => 'required',
            'product_name_bn'      => 'required',
            'product_code'         => 'required',
            'product_qty'          => 'required',
            'selling_price'        => 'required',
            'short_description_en' => 'required',
            'short_description_bn' => 'required',
            'long_description_en'  => 'required',
            'long_description_bn'  => 'required',
        ]);
       
        // slug insert 
        $str_en   = $request->product_name_en;  
        $str_bn   = $request->product_name_bn;
        $slug_en  = strtolower(preg_replace('/\s+/', '-', $str_en));
        $slug_bn  = trim(preg_replace('/\s+/', '-', $str_bn));

        // Date insert
        Product::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => $slug_en,
            'product_slug_bn' => $slug_bn,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_bn' => $request->short_description_bn,
            'long_description_en' => $request->long_description_en,
            'long_description_bn' => $request->long_description_bn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        
        Session::flash('success', 'Product Update Without Image Successfully');
        return redirect()->route('product.view');
    }// End dataUpdate Mathod

    public function imgUpdate(Request $request)
    {
        $this->validate($request, [
            'product_thumbnail'    => 'required',
        ]);

        $id = $request->product_id;
        $oldImage = $request->old_img;
 	    unlink($oldImage);

        // Thumbnail Image insert
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/product/thumbnail_image/'.$name_gen);
        $save_url = 'upload/product/thumbnail_image/'.$name_gen;

        // Date insert
        Product::findOrFail($id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        
        Session::flash('success', ' Thambnail Image Updated Successfully');
        return redirect()->back();
    }// End dataUpdate Mathod

    public function multiImgUpdate(Request $request)
    {
        $this->validate($request, [
            'multi_img'    => 'required',
        ]);

        $images = $request->multi_img;
        
        foreach ($images as $id => $image) {
            $imgDel = Multiimage::findOrfail($id);
            unlink($imgDel->photo_name);

            // Image insert
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/product/multiple_image/'.$name_gen);
            $save_url = 'upload/product/multiple_image/'.$name_gen;

            // multiple_image insert
            Multiimage::findOrFail($id)->update([
                'photo_name' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            
        } // End foreach
        
        Session::flash('success', ' Multiple Image Updated Successfully');
        return redirect()->back();
    } // End dataUpdate Mathod

    public function multiImgAdd(Request $request)
    {
        $product_id = $request->product_id;

        // Image insert
        $image = $request->file('newImage');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/product/multiple_image/'.$name_gen);
        $save_url = 'upload/product/multiple_image/'.$name_gen;
        // insert
        Multiimage::insert([
            'product_id' => $product_id,
            'photo_name' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        
        Session::flash('success', ' Multiple Image Add Successfully');
        return redirect()->back();
    } // End multiImgAdd Mathod

    public function multiImgDelete($id)
    {
        $imgDel = Multiimage::findOrfail($id);
        unlink($imgDel->photo_name);
        Multiimage::findOrfail($id)->delete();

        
        Session::flash('success', ' Multiple Image Delete Successfully');
        return redirect()->back();
    } // End multiImgDelete Mathod

    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status'=>0]);

        Session::flash('success', 'Product Inactive');
        return redirect()->back();
    } // End ProductInactive Mathod
    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status'=>1]);
    
        Session::flash('success', 'Product Active');
        return redirect()->back();
    } // End ProductInactive Mathod

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        $product->delete();

        $images = Multiimage::where('product_id',$id)->get();
        foreach ($images as $img ) {
            unlink($img->photo_name);
            $img->delete;
        }

        Session::flash('warning', 'Product Delete Successfuy');
        return redirect()->back();
    }
}
