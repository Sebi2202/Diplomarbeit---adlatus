<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Mail;
use App\Mail\PasswordRecoveryLink;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the form to request a password reset link.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm() {
        return view('auth/passwords/email');
    }

    public function sendResetLinkEmail(Request $request) {
        Mail::to($request->input('email'))->send(new PasswordRecoveryLink());
        return redirect('/password/reset');
    }
}
