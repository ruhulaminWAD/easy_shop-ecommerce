<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Session;
use Auth;
use Carbon\Carbon; 

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
    public function ReviewStore(Request $request)
    {
       $request->validate([
        'summary' => 'required',
        'comment' => 'required',
       ]);
       Review::insert([
        'product_id' => $request->product_id,
        'user_id' => Auth::id(),
        'comment' => $request->comment,
        'summary' => $request->summary,
        'created_at' => Carbon::now(),

       ]);

        Session::flash('success', 'Review Will Approve By Admin');
        return redirect()->back();
    }

    public function PendingReview()
    {
    	$reviews = Review::where('status',0)->orderBy('id','DESC')->get();
    	return view('backend.review.pending_review',compact('reviews'));
    } // end method 
    public function PublishReview()
    {
    	$reviews = Review::where('status',1)->orderBy('id','DESC')->get();
    	return view('backend.review.publish_review',compact('reviews'));
    } // end method 

    public function ApproveReview($id)
    {
    	Review::where('id',$id)->update(['status' => 1]);
        Session::flash('success', 'Review Approved Successfully');
        return redirect()->back();
    } // end mehtod 

    public function DestroyReview($id)
    {
    	Review::find($id)->delete();
        Session::flash('success', 'Review Delete Successfully');
        return redirect()->back();
    } // end mehtod 



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
