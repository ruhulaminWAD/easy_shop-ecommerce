<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Shipdistrict;
use App\Models\Shipstate;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{

    public function DistrictGetAjax($division_id)
    {
        $districts = Shipdistrict::where('shipdivision_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($districts);
    } // End Method
    public function StateGetAjax($district_id)
    {
        $state = Shipstate::where('shipdistrict_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($state);
    } // End Method

   
    public function index()
    {
        //
    } // End Method

    public function create()
    {
        //
    } // End Method

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CheckoutStore(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif($request->payment_method == 'card'){
            return view('frontend.payment.card',compact('data','cartTotal'));
        } else {
            return view('frontend.payment.cash',compact('data','cartTotal'));
        }
        


    } // End Method

   

   
}
