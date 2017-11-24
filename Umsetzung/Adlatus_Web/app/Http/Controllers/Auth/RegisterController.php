<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        */

    }

    public function showRegistrationForm() {
        return view('auth/register');
    }

    public function register(Request $request) {
        $this->validate($request, [
            'sozNummer' => array(
                'required',
                'min:10',
                'max:10',
                'regex:/\d\d\d\d([0][1-9]|[1,2]\d|[3][0,1])([0][1-9]|[1][0-3])\d\d/u'
            ),
            'vorname' => 'required',
            'nachname' => 'required',
            'email' => 'required',
            'password' => array(
                'required',
                'min:6'
            ),
            'again' => 'required'
        ]);
        
        $users = User::all();
        foreach($users as $user) {
            if($user->sozNr == $request->input('sozNummer')) {
                return view('error');
            }
        }
        if($request->input('password') == $request->input('again')) {
            $user = new User();
            $user->sozNr = $request->input('sozNummer');
            $user->vorname = $request->input('vorname');
            $user->nachname = $request->input('nachname');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role_id = 1;

            $user->save();

            $pat = new User();
            $pat->sozNr = $request->input('sozNummer');
            $pat->vorname = $request->input('vorname');
            $pat->nachname = $request->input('nachname');
            $pat->email = $request->input('email');
            $pat->password = Hash::make($request->input('password'));
            $pat->role_id = 2;
            $pat->therapeut_sozNr = $request->input('sozNummer');

            $pat->save();
            return redirect('/login')->with('Success', 'Therapeut created');
        }
        else {
            return redirect('/register')->with('Error', 'Therapeut could not be created');
        }
    }
}
