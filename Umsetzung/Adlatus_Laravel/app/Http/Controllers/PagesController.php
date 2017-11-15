<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showStart()
    {
        return view('pages/welcome');
    }

    public function showReg() 
    {
        return view('pages/registrierung');
    }

    public function showLogin()
    {
        return view('pages/login');
    }
}
