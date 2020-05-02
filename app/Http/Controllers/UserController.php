<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Locker;
use App\Transaction;

use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Response;
use Image;

class UserController extends Controller
{
    function index(){
    	return view('login');
    }

    function checklogin(Request $request){

    	$this->validate($request,[
    		'username' => 'required',
    		'password' => 'required|min:6',
    	]);

    	$user_data = array(
    		'username' => $request->get('username'),
    		'password' => $request->get('password'),
    	);

        if (Auth::attempt($user_data)){
            return redirect('/successlogin');
        } else {
            return back()->with('error', 'Incorrect username and/or password.');
        }
    }

    function notice(){
        return view('students-page.notice');
    }

    function staff(){
        if(!Auth::user())
        {
            return redirect(route('/checklogin'));
        }
        return view('staff-page.home');
    }

    function admin(){
        if(!Auth::user())
        {
            return redirect(route('/checklogin'));
        }
        return view('admin-page.home');
    }

    function successlogin(){
        if(Auth::user()->userlevel == 'Student'){

            $reservation = new Transaction;
            $sUsername = Auth::user()->username;

            if ($reservation = DB::table('transactions')->where('student_id', $sUsername)->first()) {           

                if($reservation->step == 1.0){
                    // redirect to wait page (step 1)
                    return redirect('/wait/');
                }
                else if($reservation->step == 2.0){
                    // redirect to payment page
                    return redirect(route('transactions_load', $reservation->code));
                }
                else if($reservation->step == 2.1){
                    // redirect to reservation declined page
                    return redirect('/declined/');
                }
                else if($reservation->step == 3.0){
                    // redirect to wait for confirmation of receipt page (step 3)
                    return redirect('/waitreceipt/');
                }
                else if($reservation->step == 3.1){
                    // redirect to resubmit receipt page 
                    return redirect(route('transactions_load', $reservation->code));
                }
                else if($reservation->step == 4.0){
                    // redirect to success locker reservation page 
                    return redirect('/success/');
                }
            }
            return redirect('/student/');
            
        } else if(Auth::user()->userlevel == 'Staff'){
            return redirect('/staff/');
        } else if(Auth::user()->userlevel == 'Admin'){
            return redirect('/admin/');
        } else {
            return back()->with('error', 'Incorrect username and/or password.');
        }
    }

    function homepage(){
        return view('homepage');
    }

    function logout(){
    	Auth::logout();
    	return redirect('/');
    }
}
