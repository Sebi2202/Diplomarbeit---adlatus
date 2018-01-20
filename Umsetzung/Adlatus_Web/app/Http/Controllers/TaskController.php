<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //Ist die Id vom eingeloggten User Patient
        //TO DO: Liste von Arbeitspakete, die ich erledigt habe und welche ich noch machen muss, wie viele Stunden habe ich schon gebraucht und wie viele brauche ich noch, Dead-Lines dazuschreiben
        //Dead-Line: 24.01 23:59

        $data = Task::where('fk_userid', $id)->get(['title', 'start']);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'activitynr' => 'required',
            'date' => array(
                'required',
                'regex:/([0][1-9]|[1][0-9]|[2][0-3]):([0-5][0-9]):([0-5][0-9])/u'
            ),
        ]);
            
        $pieces = explode("/", url()->previous());
        $date = $pieces[sizeof($pieces)-1];

        $task = new Task();
        $task->fk_userid = $id;
        $task->fk_activityid = $request->input('activitynr');
        $task->start = $date . " " . $request->input('date');
        $task->title = $request->input('title');
        $task->confirmed = 0;
        $task->nachricht = $request->input('message');
        
        $task->save();
        
        return redirect('/dashboard/patient/calendar/' . $id)->with('Success', 'Task created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
