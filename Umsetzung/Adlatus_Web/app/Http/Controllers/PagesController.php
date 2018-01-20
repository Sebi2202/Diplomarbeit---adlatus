<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use Illuminate\Support\Facades\Auth;

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
        $auth = Auth::user();

        if(!$user || !($user->therapeut_sozNr == $auth->sozNr)) {
            return redirect('/dashboard');
        }
        else {
            return view('calendar')->with('user', $user);
        }
    }

    public function task($id) {
        $user = User::find($id);
        $auth = Auth::user();
        $tasks = Task::all()->where('fk_userid', $user->id);
        
        if(!$user || !($user->therapeut_sozNr == $auth->sozNr)) {
            return redirect('/dashboard');
        }
        return view('create_task')->with('user', $user)->with('tasks', $tasks);
    }

    public function showTask($id, $date, $task_id) {
        $user = User::find($id);
        $auth = Auth::user();
        $task = Task::where('id', $task_id)->first();

        if(!$user || !($user->therapeut_sozNr == $auth->sozNr)) {
            return redirect('/dashboard');
        }

        return view('task')->with('user', $user)->with('task', $task);
    }
}
