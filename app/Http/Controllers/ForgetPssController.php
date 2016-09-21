<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use App\User;

class ForgetPssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.forget');
    }

    public function sendEmailReminder(Request $request)
    {
        $data = $request->only('email');
        $users = DB::table('users')
                ->where('email', '=', $data['email'])
                ->get();

        if($users){
            
            Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
                $m->from('hello@app.com', 'Your Application');

                $m->to($user->email, $user->name)->subject('Your Reminder!');
            });
        }
        return redirect()->back();
    }
}
