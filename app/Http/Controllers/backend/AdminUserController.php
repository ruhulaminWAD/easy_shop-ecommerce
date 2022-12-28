<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use Session;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
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
    public function adminAllUser()
    {
        $adminUser = AdminUser::where('type', 2)->latest()->get();
        return view('backend.user.admin_all_user',compact('adminUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddAdminUser()
    {
        return view('backend.user.admin_user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function StoreAdminUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profile_photo_path' => 'required',
        ]);

        //  Image insert
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;
    
        
        // Date insert
        AdminUser::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_photo_path' => $save_url,
            'phone' => $request->phone,

            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupon' => $request->coupon,
            'shipping_area' => $request->shipping_area,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'return_order' => $request->return_order,
            'review' => $request->review,
            'order' => $request->order,
            'stock' => $request->stock,
            'report' => $request->report,
            'all_user' => $request->all_user,
            'adminuserrole' => $request->adminuserrole,

            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Admin User Created Successfully');
        return redirect()->route('all.admin.user');
    }

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
    public function editAdminUser($id)
    {
        $adminUser = AdminUser::find($id);
        return view('backend.user.admin_user_edit',compact('adminUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdminUser(Request $request, $id)
    {
        // Date insert
        AdminUser::find($id)->update([

            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupon' => $request->coupon,
            'shipping_area' => $request->shipping_area,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'return_order' => $request->return_order,
            'review' => $request->review,
            'order' => $request->order,
            'stock' => $request->stock,
            'report' => $request->report,
            'all_user' => $request->all_user,
            'adminuserrole' => $request->adminuserrole,

            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'AAdmin User Updated Successfully');
        return redirect()->route('all.admin.user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminUser = AdminUser::find($id);
        unlink($adminUser->profile_photo_path);
        $adminUser->delete();
        Session::flash('warning', 'Admin User Deleted Successfully');
        return redirect()->back();
    }
}
