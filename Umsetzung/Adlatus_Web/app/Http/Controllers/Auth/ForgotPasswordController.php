<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Mail;
use App\Mail\PasswordRecoveryLink;
use App\User;
use Illuminate\Support\Facades\Hash;

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
        return view('auth/passwords/email')->with('error', '');
    }

    public function sendResetLinkEmail(Request $request) {
        if($request->input('email') != null) {
            Mail::to($request->input('email'))->send(new PasswordRecoveryLink());
            return redirect('/password/reset');
        }
        else {
            return view('auth/passwords/email')->with('error', 'Es wurde keine E-Mail eingegeben.');
        }
    }

    public function update(Request $request) {
        $this->validate($request, [
            'sozNummer' => 'required',
            'email' => 'required',
            'password' => array(
                'required',
                'min:6'
            ),
            'again' => 'required'
        ]);
        
        if(!(User::where('sozNr', $request->input('sozNummer'))->first())) {
            return redirect('password/reset/{token}');
        }

        $user = User::where('sozNr', $request->input('sozNummer'))->first();

        if($user->email == $request->input('email') and $user->sozNr == $request->input('sozNummer') and $request->input('password') == $request->input('again')) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect('/login');
        }
        return redirect('password/reset/{token}');
    }
}
