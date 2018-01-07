<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function create() {
        return view('create_patient');
    }

    public function index($id) {
        $user = User::find($id);
        return view('choice')->with('user', $user);
    }

    public function show($id) {
        $user = User::find($id);
        return view('calendar')->with('user', $user);
    }

    public function task($id) {
        $user = User::find($id);
        return view('create_task')->with('user', $user);
    }
}
