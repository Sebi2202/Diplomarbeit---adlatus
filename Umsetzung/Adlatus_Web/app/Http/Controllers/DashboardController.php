<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\PasswordRecoveryLink;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        $users = User::where('therapeut_sozNr', $auth->sozNr)
            ->orderBy('vorname', 'asc')->get();

        return view('dashboard')->with('users', $users)->with('auth', $auth);
    }

    public function email(Request $request) {
        Mail::to($request->input('email'))->send(new PasswordRecoveryLink());
    }
}
