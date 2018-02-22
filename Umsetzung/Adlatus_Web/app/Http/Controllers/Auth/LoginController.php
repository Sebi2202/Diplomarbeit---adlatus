<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        $error = "";
        return view('auth/login')->with('error', $error);
    }

    public function login(Request $request) {
        $error = "";
        if(Auth::attempt([
            'sozNr' => $request->input('sozNummer'), 
            'password' => $request->input('password'),
            'role_id' => 1
        ])) {
            return redirect('/dashboard');
        } else {
            $error = "Die eingegebenen Daten sind nicht richtig";
            return view('auth/login')->with('error', $error);
        }
    }

    public function loginApp(Request $request) {
        if(Auth::attempt([
            'sozNr' => $request->input('sozialNr'),
            'password' => $request->input('password'),
        ])) {
            $user = Auth::user();
            return response()->json(['angenommen' => true, 'id' => $user->id]);
        } else {
            return response()->json(['angenommen' => false]);
        }
    }

    //Auth()->id();

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
