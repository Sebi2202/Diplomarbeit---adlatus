<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function start() {
        return view('start');
    }

    public function app() {
        return view('app');
    }
}
