<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function start() {
        $title = 'Willkommen zur Startseite!';
        return view('pages/start', compact('title'));
    }

    public function app() {
        //Das war ein Testarray
        $tasks = array(
            'title' => 'task',
            'tasks' => ['Task 1', 'Task 2', 'Task 3']
        );
        return view('pages/app')->with($tasks);
    }
}
