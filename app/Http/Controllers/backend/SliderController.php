<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
use Session;

class SliderController extends Controller
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
        $sliders = Slider::latest()->get();
        return view('backend.slider.index', compact('sliders'));
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
        // Slider Image insert
        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;
         
         // Date insert
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_image' => $save_url,
        ]);
        Session::flash('success', 'Slider Inserted Successfully');
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
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('slider'));
    } // End edit Mathod

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $slider_id = $request->id;
    	$old_img = $request->old_image;

        if ($request->file('slider_image')) {
            unlink($old_img);
            // Slider Image insert
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;
            
            // Date insert
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_image' => $save_url,
            ]);
            Session::flash('success', 'Slider Update Successfully');
        }else {
            // Date insert
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            Session::flash('success', 'Slider Updated Without Image Successfully');
        } // End if 
        return redirect()->route('slider.view');

    } // End update Mathod

    
    public function SliderInactive($id)
    {
        Slider::findOrFail($id)->update(['status'=>0]);

        Session::flash('success', 'Slider Inactive');
        return redirect()->back();
    } // End ProductInactive Mathod
    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update(['status'=>1]);
    
        Session::flash('success', 'Slider Active');
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
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_image);
        $slider->delete();
        Session::flash('success', 'Slider Delete Successfully');
        return redirect()->back();
    }
}
