<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;

class SiteSettingController extends Controller
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
    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);
    	return view('backend.setting.setting_update',compact('setting'));
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SiteSettingUpdate(Request $request)
    {
        $id = $request->setting_id;

        if ($request->file('logo')) {
            // Thumbnail Image insert
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(139,36)->save('upload/logo/'.$name_gen);
            $save_url = 'upload/logo/'.$name_gen;
            
            // Date insert
            SiteSetting::find($id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,

                'logo' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            Session::flash('success', 'Setting Updated with Image Successfully');
            return redirect()->back();
        } else {
            // Date insert
            SiteSetting::find($id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,

                'updated_at' => Carbon::now(),
            ]);
            Session::flash('success', 'Setting Updated Successfully');
            return redirect()->back();
        }
        
    } // End Method
    

    public function SeoSetting()
    {
        $seo = Seo::find(1);
    	return view('backend.setting.seo_update',compact('seo'));
    }

    public function SiteSettingSeo(Request $request)
    {
        $id = $request->seo_id;

        // Date insert
        Seo::find($id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,

            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Seo Updated Successfully');
        return redirect()->back();
        
    } // End Method


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
