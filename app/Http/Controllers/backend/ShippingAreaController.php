<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Shipdistrict;
use App\Models\Shipdivision;
use App\Models\Shipstate;
use Illuminate\Http\Request;
use carbon\Carbon;
use Session;

class ShippingAreaController extends Controller
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
    // ==============================================
    // =======>>> Start Division Controller <<<======
    // ==============================================
    public function viewDivision()
    {
        $divisions = Shipdivision::orderBy('id','DESC')->get();
		return view('backend.shipping.division.view_division',compact('divisions'));
    } // End Method

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDivision(Request $request)
    {
        $this->validate($request, [
            'division_name' => 'required',
        ]);
         
         // Date insert
        Shipdivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Division Inserted Successfully');
        return redirect()->back();
    } // End Method

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDivision($id)
    {
        $division = Shipdivision::findOrFail($id);
		return view('backend.shipping.division.edit_division',compact('division'));
    } // End Method

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDivision(Request $request, $id)
    {
        $this->validate($request, [
            'division_name' => 'required',
        ]);
         
         // Date insert
        Shipdivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'Division Update Successfully');
        return redirect()->route('division.view');
    } // End Method

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyDivision($id)
    {
        Shipdivision::findOrFail($id)->delete();
        Session::flash('warning', 'Division Delete Successfully');
        return redirect()->back();
    } // End Method




    // ==============================================
    // =======>>> Start District Controller <<<======
    // ==============================================
    public function viewDistrict()
    {
        $divisions = Shipdivision::orderBy('division_name','ASC')->get();
        $districts = Shipdistrict::with('division')->orderBy('id','DESC')->get();
		return view('backend.shipping.district.view_district',compact('divisions','districts'));
    } // End Method

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDistrict(Request $request)
    {
        $this->validate($request, [
            'shipdivision_id' => 'required',
            'district_name' => 'required',
        ]);
         
         // Date insert
        Shipdistrict::insert([
            'shipdivision_id' => $request->shipdivision_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'District Inserted Successfully');
        return redirect()->back();
    } // End Method

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDistrict($id)
    {
        $divisions = Shipdivision::orderBy('division_name','ASC')->get();
        $district = Shipdistrict::findOrFail($id);
		return view('backend.shipping.district.edit_district',compact('divisions','district'));
    } // End Method

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDistrict(Request $request, $id)
    {
        $this->validate($request, [
            'shipdivision_id' => 'required',
            'district_name' => 'required',
        ]);
         
         // Date insert
         Shipdistrict::findOrFail($id)->update([
            'shipdivision_id' => $request->shipdivision_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'District Update Successfully');
        return redirect()->route('district.view');
    } // End Method

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyDistrict($id)
    {
        Shipdistrict::findOrFail($id)->delete();
        Session::flash('warning', 'District Delete Successfully');
        return redirect()->back();
    } // End Method




    // ==============================================
    // =======>>> Start State Controller <<<======
    // ==============================================
    public function viewState()
    {
        $divisions = Shipdivision::orderBy('division_name','ASC')->get();
        $districts = Shipdistrict::orderBy('district_name','ASC')->get();
        $states = Shipstate::orderBy('id','DESC')->get();
		return view('backend.shipping.state.view_state',compact('divisions','districts','states'));
    } // End Method

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeState(Request $request)
    {
        $this->validate($request, [
            'shipdivision_id' => 'required',
            'shipdistrict_id' => 'required',
            'state_name' => 'required',
        ]);
         
         // Date insert
        Shipstate::insert([
            'shipdivision_id' => $request->shipdivision_id,
            'shipdistrict_id' => $request->shipdistrict_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
        Session::flash('success', 'State Inserted Successfully');
        return redirect()->back();
    } // End Method

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editState($id)
    {
        $divisions = Shipdivision::orderBy('division_name','ASC')->get();
        $districts = Shipdistrict::orderBy('district_name','ASC')->get();
        $state = Shipstate::findOrFail($id);
		return view('backend.shipping.state.edit_state',compact('divisions','districts','state'));
    } // End Method

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateState(Request $request, $id)
    {
        $this->validate($request, [
            'shipdivision_id' => 'required',
            'shipdistrict_id' => 'required',
            'state_name' => 'required',
        ]);
         
         // Date insert
         Shipstate::findOrFail($id)->update([
            'shipdivision_id' => $request->shipdivision_id,
            'shipdistrict_id' => $request->shipdistrict_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('success', 'State Update Successfully');
        return redirect()->route('state.view');
    } // End Method

   
    public function divisionAjax($shipdivision_id)
    {
        $districts = Shipdistrict::where('shipdivision_id',$shipdivision_id)->orderBy('district_name','ASC')->get();
        return json_encode($districts);
    } // End Method
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyState($id)
    {
        Shipstate::findOrFail($id)->delete();
        Session::flash('warning', 'State Delete Successfully');
        return redirect()->back();
    } // End Method



}
