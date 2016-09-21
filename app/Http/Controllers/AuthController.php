<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Session;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function handlelogin(Request $request)
    {
        $messages = array(
            'email.required'=>'You cant leave Email field empty',
            'password.required'=>'You cant leave name field empty'
        );

        $rules = array(
            'email' => 'required|email|max:20',
            'password' => 'required'
        );

        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails())
        {
            $messages = $validator->errors();

            //echo $messages->first('email');
            return redirect()->back()->withErrors($validator->errors());
            //return redirect()->back()->withErrors(array('register' => $validator));

        }else{
        
            $data = $request->only('email','password');


            if(\Auth::attempt($data)){
                Session::put('email', $data['email']); //array index
                return redirect()->intended('/');
            }

        return back()->withInput();
        }
    }

 
}
