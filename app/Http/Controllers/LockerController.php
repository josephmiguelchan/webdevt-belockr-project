<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locker;
use App\Transaction;

use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Response;
use Image;
use Auth;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lockers = Locker::all();
        return view('lockers.index', compact('lockers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lockers.create');
    }

    public function reserve($locker_id)
    {
        $lockerid = Locker::where('locker_id', $locker_id)->first();
        return view('students-page.reserve', compact('lockerid'));
    }

    public function viewallopen()
    {
        $openlockers = DB::table('lockers')->where('status', 'open')->get();
        return view('students-page.open', compact('openlockers'));
    }

    public function storeReserve(Request $request)
    {
        $uuid = Str::uuid()->toString();
    
        $transaction = new Transaction;
        $transaction->code = $uuid;
        $transaction->student_id = Auth::user()->username;
        $transaction->locker_id = $request->locker_id;
        $transaction->step = '1.0';
        $transaction->status = 'Awaiting Approval';
        $transaction->comment = 'Please wait for the LSO to verify and charge your sis account for payment instructions';
        $transaction->staff_id = null;
        $transaction->save();

        $locker = new Locker;
        $locker = Locker::where('locker_id', $transaction->locker_id)->first();
        $locker->status = 'Pending';
        $locker->save();
        return redirect(route('students_wait'))->with('successMsg', 'Your locker has been reserved successfully!');
    }

    public function wait(){
        return view('students-page.approvalwait');
    }

    public function waitreceipt(){
        return view('students-page.waitreceipt');
    }

    public function declined(){
        return view('students-page.declined');
    }

    public function success(){
        return view('students-page.success');
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
            'locker_id' => 'required',
            'status' => 'required',
            'location' => 'required'
        ]);
        
        $uuid = Str::uuid()->toString();
    
        $locker = new Locker;
        $locker->locker_id = $request->locker_id;
        $locker->location = $request->location;
        $locker->status = $request->status;
        $locker->save();
        return redirect(route('lockers_list'))->with('successMsg', 'A new locker has been added!');
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
    public function edit($locker_id)
    {
        $locker = Locker::where('locker_id', $locker_id)->first();
        return view('lockers.edit', compact('locker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locker_id)
    {
        $this->validate($request, [
            'locker_id' => 'required',
            'status' => 'required',
            'location' => 'required'
        ]);

        $locker = Locker::where('locker_id', $locker_id)->first();
        $locker->locker_id = $request->locker_id;
        $locker->location = $request->location;
        $locker->status = $request->status;
        $locker->save();
        return redirect(route('lockers_list'))->with('successMsg', 'Locker record has been updated!');
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
    public function delete($locker_id)
    {
        $locker = Locker::where('locker_id', $locker_id)->first();
        $locker->delete();
        return redirect(route('lockers_list'))->with('successMsg', 'The locker has been deleted!');
    }

}
