<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Therapeut;

class LoginController extends Controller
{
    public function loginTherapeut(Request $required) {
        $sozialNumber = $required->input('sozialNr');
        $pw = $required->input('password');

        $checkLogin = false;

        $therapeuts = Therapeut::all();
        foreach($therapeuts as $therapeut) {
            
            if($therapeut->sozNr == $sozialNumber and $therapeut->password == $pw) {
                $checkLogin = true;
            }
            if($checkLogin == true) {
                return view('pages/dashboard');
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
