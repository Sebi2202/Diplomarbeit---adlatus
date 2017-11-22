<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\Auth\Factory;
use App\Therapeut;
use App\Patient;

class LoginController extends Controller
{
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    /*
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    */

    public function loginTherapeut(Request $required) {
        $sozialNumber = $required->input('sozialNr');
        $pw = $required->input('password');

        $checkLogin = false;

        $patients = Patient::all();

        $therapeuts = Therapeut::all();
        foreach($therapeuts as $therapeut) {
            
            if($therapeut->sozNr == $sozialNumber and $therapeut->password == $pw) {
                $checkLogin = true;
            }
            if($checkLogin == true) {
                return view('pages/dashboard')->with('patients', $patients);
            }
        }
        if($checkLogin == false) {
            return redirect('/login');
        }
    }

    public function loginPatient() {
        //
    }
}
