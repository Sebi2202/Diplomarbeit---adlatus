<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function start() {
        $title = 'Willkommen zur Startseite';
        return view('pages/start', compact('title'));
    }

    public function app() {
        $title = 'Willkommen zur Appseite';
        return view('pages/app', compact('title'));
    }
}
