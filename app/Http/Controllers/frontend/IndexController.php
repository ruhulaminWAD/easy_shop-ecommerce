<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Category;
use App\Models\Multiimage;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id', 'DESC')->limit(7)->get();
        $featureds = Product::where('featured',1)->orderBy('id', 'DESC')->limit(7)->get();

        // Category Product
        $hotDeals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id', 'DESC')->limit(3)->get();

        $specialOffers = Product::where('special_offer',1)->orderBy('id', 'DESC')->limit(9)->get();
        $specialDeals = Product::where('special_deals',1)->orderBy('id', 'DESC')->limit(9)->get();

        // Category Product 
        $category_skip_0 = Category::skip(0)->first();
        $product_skip_0 = Product::where('status',1)->where('category_id',$category_skip_0->id)->orderBy('id', 'DESC')->get();

        $category_skip_1 = Category::skip(1)->first();
        $product_skip_1 = Product::where('status',1)->where('category_id',$category_skip_1->id)->orderBy('id', 'DESC')->get();

        $category_skip_2 = Category::skip(2)->first();
        $product_skip_2 = Product::where('status',1)->where('category_id',$category_skip_2->id)->orderBy('id', 'DESC')->get();

        $category_skip_3 = Category::skip(3)->first();
        $product_skip_3 = Product::where('status',1)->where('category_id',$category_skip_3->id)->orderBy('id', 'DESC')->get();

        $category_skip_4 = Category::skip(4)->first();
        $product_skip_4 = Product::where('status',1)->where('category_id',$category_skip_4->id)->orderBy('id', 'DESC')->get();

        // Blog Post
        $blogPosts = BlogPost::latest()->get();



        return view('frontend.index', compact('categorys', 'sliders', 'products', 'featureds', 'hotDeals', 'specialOffers', 'specialDeals','category_skip_0','product_skip_0','category_skip_1','product_skip_1','category_skip_2','product_skip_2','category_skip_3','product_skip_3','category_skip_4','product_skip_4','blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_details($id,$sllug)
    {
        $product = Product::find($id);
        $categorys = Category::orderBy('category_name_en', 'ASC')->get();
        $multiImages = Multiimage::where('product_id', $id)->get();

        // product color
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_bn = $product->product_color_bn;
        $product_color_bn = explode(',', $color_bn);

        // product size
        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_bn = $product->product_size_bn;
        $product_size_bn = explode(',', $size_bn);

        $relatedProduct = Product::where('status',1)->where('category_id',$product->category_id)->where('id','!=',$id)->orderBy('id', 'DESC')->get();

        return view('frontend.product.product_detail',compact('product', 'categorys', 'multiImages', 'product_color_en', 'product_color_bn', 'product_size_en', 'product_size_bn', 'relatedProduct'));
    }

    public function tagwise_product_details($tag)
    {
        $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_bn',$tag)->orderBy('id', 'DESC')->paginate(6);
        $categorys = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.product.tagwise_product',compact('products', 'categorys',));
    }

    public function subCategorywise_product_details($subcategory_id, $slug)
    {
        $products = Product::where('status',1)->where('subcategory_id',$subcategory_id)->orderBy('id', 'DESC')->paginate(6);
        $categorys = Category::orderBy('category_name_en', 'ASC')->get();
        $breadsubcat = Subcategory::where('id',$subcategory_id)->get();
        return view('frontend.product.subCategorywise_product',compact('products', 'categorys','breadsubcat'));
    }

    public function subSubCategorywise_product_details($subsubcategory_id, $slug)
    {
        $products = Product::where('status',1)->where('subsubcategory_id',$subsubcategory_id)->orderBy('id', 'DESC')->paginate(6);
        $categorys = Category::orderBy('category_name_en', 'ASC')->get();
        $breadsubsubcat = Subsubcategory::where('id',$subsubcategory_id)->get();
        return view('frontend.product.subSubCategorywise_product',compact('products', 'categorys','breadsubsubcat'));
    }

    /// Product View With Ajax
    public function ProductViewAjax($id)
    {
        $product = Product::with('brand','category')->findOrFail($id);

		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

        return response()->json(array(
            'product' =>  $product,
            'color'   =>  $product_color,
            'size'    =>  $product_size,
        ));

    }

    // Product search
    public function ProductSearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $item = $request->search;
		// echo "$item";
        $categorys = Category::orderBy('category_name_en','ASC')->get();
		$products = Product::where('product_name_en','LIKE',"%$item%")->get();
		return view('frontend.product.product_search',compact('products','categorys'));
    } // end method

    // Advance product search
    public function AdvanceProductSearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $item = $request->search;

		$products = Product::where('product_name_en','LIKE',"%$item%")->select('product_name_en','product_thumbnail','product_slug_en','id','selling_price')->limit(5)->get();
		return view('frontend.product.advance_product_search',compact('products'));
    } // end method



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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
