<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Shipdistrict;
use App\Models\Shipdivision;
use App\Models\Shipstate;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Auth;

class CartPageController extends Controller
{
    // view My Cart
    public function ViewMyCart()
    {
        return view('frontend.wishlist.view_myCart');
    } // End ViewMyCart Method

    // view GetCartProduct
    public function GetCartProduct()
    {
        $carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    } // End GetCartProduct Method

    // Mini Cart RemoveMiniCart Section
    public function RemoveCartProduct($rowId)
    {
        Cart::remove($rowId);

        if (Session::has('coupon')) {
            Session::forget('coupon');
         }

    	return response()->json(['success' => 'Product Remove from Cart']);
    } // End RemoveMiniCart Method

    // CartIncrement Section
    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        //coupon apply
        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
            ]);
        } //coupon apply End

        return response()->json('increment');
        
    } // End CartIncrement Method

    // CartIncrement Section
    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        
        //coupon apply
        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
            ]);
        } //coupon apply End

        return response()->json('Decrement');
        
    } // End CartIncrement Method

    // CouponApply Section
    public function CouponApply(Request $request){
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
            ]);
            return response()->json(['validity' => true, 'success' => 'Coupon Applied Successfully']);
        } else {
            return response()->json(['error' => 'Incalid Coupon']);
        }
        
    } // End CouponApply Method

    // CouponCalculation Section
    public function CouponCalculation(Request $request){
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],

            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }
        
    } // End CouponCalculation Method

    // CouponRemove Section
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    } // End CouponRemove Method
    
    
    public function CheckoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $divisions = Shipdivision::orderBy('division_name','ASC')->get();
                $districts = Shipdistrict::orderBy('district_name','ASC')->get();
                $state = Shipstate::orderBy('state_name','ASC')->get();
                return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions','districts','state'));
            } else {
                Session::flash('error', 'Shopping At list One Product');
                return redirect()->back();
            }
            
        } else {
            Session::flash('error', 'You Need to Login First');
            return redirect()->back();
        }
        
    } // End Method  You Need to Login First

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

   

   
}
