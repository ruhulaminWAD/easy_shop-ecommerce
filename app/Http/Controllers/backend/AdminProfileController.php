<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Auth;
use Session;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
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
        $id = Auth::guard('admin')->user()->id;
        // echo $admin;
        $admin = AdminUser::find($id);
        return view('backend.admin.admin_profile.profile', compact('admin'));
    }  //End Profile index method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }  //End Profile create method

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }  //End Profile store method

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
        $admin = AdminUser::find($id);
        return view('backend.admin.admin_profile.edit_profile', compact('admin'));
    }  //End Profile edit method

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = AdminUser::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->hasfile('image')) {
            if ($request->file('image')) {

                // $file = $request->file('image');
                // @unlink(public_path('upload/admin_images/'.$admin->profile_photo_path));
                // $fileName = time().$file->getClientOriginalName();
                // $file->move(public_path('upload/admin_images'),$fileName);
                // $admin['profile_photo_path'] = $fileName;

                //  Image insert
                // unlink($admin->profile_photo_path);
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
                $save_url = 'upload/admin_images/'.$name_gen;

                $admin->profile_photo_path = $save_url;
            }
        }
        $admin->save();
        Session::flash('success', 'Successfully update profile');
        return redirect()->back();


    }  //End Profile Update method

   
    public function changePassword()
    {
        return view('backend.admin.admin_profile.updatePassword');

    }  //End Profile updatePassword method
   
    public function updatePassword(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword = AdminUser::find($id)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)) {
            $admin = AdminUser::find($id);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }else{
            Session::flash('current_password', 'The current password is incorrect.');
            return redirect()->back();
        }
        

    }  //End Profile updatePassword method

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }  //End Profile destroy method
}
