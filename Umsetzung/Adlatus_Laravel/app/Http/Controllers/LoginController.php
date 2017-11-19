<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Therapeut;

class LoginController extends Controller
{
    public function loginTherapeut(Request $required) {
        $sozialNumber = $required->input('sozialNr');
        $pw = $required->input('password');

        $therapeuts = Therapeut::all();
        foreach($therapeuts as $therapeut) {
            $checkLogin = $therapeut->sozNr == $sozialNumber and $therapeut->password == $pw;
            if($checkLogin == true) {
                return view('pages/dashboard');
            }
            else {
                return redirect('/login');
            }
        }
    }
}
