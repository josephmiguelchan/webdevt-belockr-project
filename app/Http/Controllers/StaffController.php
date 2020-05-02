<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staffs.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staffs.create');
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
            'fn' => 'required',
            'mn' => 'required',
            'ln' => 'required',
            'email' => 'required'
        ]);

        $uuid = Str::uuid()->toString();

        $staff = new Staff;
        $staff->staff_code = $uuid;
        $staff->first_name = $request->fn;
        $staff->middle_name = $request->mn;
        $staff->last_name = $request->ln;
        $staff->email = $request->email;
        $staff->status = 'Active';
        $staff->save();
        return redirect(route('staffs_list'))->with('successMsg', 'Staff record added!');
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
    public function edit($staff_code)
    {
        $staff = Staff::where('staff_code',$staff_code)->first();
        return view('staffs.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $staff_code)
    {
        $this->validate($request, [
            'fn' => 'required',
            'mn' => 'required',
            'ln' => 'required',
            'email' => 'required',
            'status' => 'required'
        ]);

        $uuid = Str::uuid()->toString();

        $staff = Staff::where('staff_code',$staff_code)->first();
        $staff->staff_code = $uuid;
        $staff->first_name = $request->fn;
        $staff->middle_name = $request->mn;
        $staff->last_name = $request->ln;
        $staff->email = $request->email;
        $staff->status = $request->status;
        $staff->save();
        return redirect(route('staffs_list'))->with('successMsg', 'Staff record updated!');
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

    public function delete($staff_code)
    {
        $staff = Staff::where('staff_code',$staff_code)->first();
        $staff->delete();
        return redirect(route('staffs_list'))->with('successMsg', 'Staff fired!');
    }
}
