<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    function index(){
        return view('login');
    }

    function checklogin(Request $request){

        $this->validate($request,[
            'username' => 'required',
            'pasword' => 'required|min:6',
        ]);

        $user_data = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)){
                return redirect('/webdevt-belockr/successlogin')
        }else{
                return back->with('error', 'Problem occured! Check your username/password if correct.')
        }
    }

    function successlogin(){
        return view('successlogin');
    }

    function logout(){
        Auth::logout();
        return redirect('webdevt-belockr');
    }


}
