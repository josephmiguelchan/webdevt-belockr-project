<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Locker;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Response;
use Image;
use Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Transaction::paginate(5);
        return view('transactions.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    public function load($code){
        $loadTransaction = Transaction::where('code', $code)->first();
        return view('students-page.pay', compact('loadTransaction'));
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
            'student_id' => 'required',
            'locker_id' => 'required',
            'step' => 'required',
            'status' => 'required',
            'comment' => 'required',
        ]);

        $uuid = Str::uuid()->toString();

        $record = new Transaction;
        $record->code = $uuid;
        $record->student_id = $request->student_id;
        $record->locker_id = $request->locker_id;
        $record->step = $request->step;
        if($request->hasfile('receipt_img')){
            $filenameWithExt=$request->file('receipt_img')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension =$request->file('receipt_img')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.date("yyMdHHmm")  .'.'.$extension;
            $path=$request->file('receipt_img')->move(public_path('receiptImages/'),$fileNameToStore);
            
            $record->receipt_img = $fileNameToStore;
        }
        else{
            $fileNameToStore='noimage.jpg';
        }
        $record->status = $request->status;
        $record->comment = $request->comment;
        $record->staff_id = $request->staff_id;
        $record->save();
        return redirect(route('transactions_list'))->with('successMsg', 'Locker Reservation created!');
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
    public function edit($code)
    {
        $record = Transaction::where('code', $code)->first();
        return view('transactions.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadReceipt(Request $request, $code)
    {
        $this->validate($request, [
            'receipt_img' => 'required',
        ]);

        $uuid = Str::uuid()->toString();
        $record = Transaction::where('code', $code)->first();
        $record->code = $uuid;
        $record->step = 3.0;
        if($request->hasfile('receipt_img')){

            $filenameWithExt=$request->file('receipt_img')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension =$request->file('receipt_img')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.date("yyMdHHmm")  .'.'.$extension;
            $path=$request->file('receipt_img')->move(public_path('receiptImages/'),$fileNameToStore);
            $record->receipt_img = $fileNameToStore;
        }
        $record->status = 'Receipt to be Validated';
        $record->comment = 'You have successfully submitted your receipt no. Please wait within 24 hours for the LSO to check and record your receipt before you can use your locker';
        $record->save();
        return redirect('/waitreceipt/')->with('successMsg', 'Your receipt has been submitted to the LSO successfully!');
    }

    public function update(Request $request, $code)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'locker_id' => 'required',
            'step' => 'required',
            'status' => 'required',
            'comment' => 'required'
        ]);

        $uuid = Str::uuid()->toString();

        $record = Transaction::where('code', $code)->first();
        $record->code = $uuid;
        $record->student_id = $request->student_id;
        $record->locker_id = $request->locker_id;
        $record->step = $request->step;
        if($request->hasfile('receipt_img')){

            $filenameWithExt=$request->file('receipt_img')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension =$request->file('receipt_img')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.date("yyMdHHmm")  .'.'.$extension;
            $path=$request->file('receipt_img')->move(public_path('receiptImages/'),$fileNameToStore);
            $record->receipt_img = $fileNameToStore;
        }
        $record->status = $request->status;
        $record->comment = $request->comment;
        $record->staff_id = $request->staff_id;
        $record->save();
        return redirect(route('transactions_list'))->with('successMsg', 'Transaction record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($code)
    {
        $record = Transaction::where('code', $code)->first();
        $record->delete();
        return redirect(route('transactions_list'))->with('successMsg', 'Record transaction deleted successfully!');
    }

    public function viewallpending()
    {
        // $pendingrecords = Transaction::where('step', '1.0')->first();
        // return view('transactions.pending', compact('pendingrecords'));

        $pendingrecords = DB::table('transactions')->where('step', '1.0')->get();
        return view('transactions.pending', compact('pendingrecords'));
    }

    public function viewallconfirm()
    {
        $confirmrecords = DB::table('transactions')->where('step', '3.0')->orWhere('step', '3.2')->get();
        return view('transactions.confirm', compact('confirmrecords'));
    }

    public function approverev($code)
    {
        $uuid = Str::uuid()->toString();

        $record = Transaction::where('code', $code)->first();
        $record->code = $uuid;
        $record->step = 2.0;
        $record->status = 'Pending Payment';
        $record->comment = 'Your reservation has been received and reviewed by our staff. You may now pay your corresponding locker fee at the finance department. After paying, please upload your official receipt immediately.';
        $record->staff_id = Auth::user()->id;
        $record->save();
        return redirect(route('transactions_pending'))->with('successMsg', 'Reservation approved!');
    }

    public function declinerev($code)
    {
        $uuid = Str::uuid()->toString();

        $record = Transaction::where('code', $code)->first();
        $record->code = $uuid;
        $record->step = 2.1;
        $record->status = 'Reservation Declined';
        $record->comment = 'Upon review of your reservation status, you are not eligible for locker rental reservation this term. Please email us if you think there has been a mistake.';
        $record->staff_id = Auth::user()->id;
        $record->save();

        $locker = new Locker;
        $locker = Locker::where('locker_id', $record->locker_id)->first();
        $locker->status = 'Open';
        $locker->save();

        return redirect(route('transactions_pending'))->with('successMsg', 'Reservation declined!');
    }

    public function confirmrec($code)
    {
        $uuid = Str::uuid()->toString();

        $record = Transaction::where('code', $code)->first();
        $record->code = $uuid;
        $record->step = 4.0;
        $record->status = 'Locker Reserved Successfully';
        $record->comment = 'Thank you for choosing Belockr. You may now use your locker for one (1) term only. Kindly vacate your belongings in your locker before the end of semester.';
        $record->staff_id = Auth::user()->id;
        $record->save();

        $locker = new Locker;
        $locker = Locker::where('locker_id', $record->locker_id)->first();
        $locker->status = 'Closed';
        $locker->save();

        return redirect(route('transactions_receipts'))->with('successMsg', 'Receipt confirmed! Locker has been successfully reserved (Locker status: Pending -> Closed).');
    }

    public function rejectrec($code)
    {
        $uuid = Str::uuid()->toString();

        $record = Transaction::where('code', $code)->first();
        $record->code = $uuid;
        $record->step = 3.1;
        $record->status = 'Reservation Declined';
        $record->comment = 'Image too blurry or invalid receipt. Kindly double check and reupload your receipt again.';
        $record->staff_id = Auth::user()->id;
        $record->receipt_img = null;
        $record->save();
        return redirect(route('transactions_receipts'))->with('successMsg', 'Receipt rejected!');
    }
}
