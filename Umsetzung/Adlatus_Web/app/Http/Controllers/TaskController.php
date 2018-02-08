<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
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
                'regex:/([0][0-9]|[1][0-9]|[2][0-3]):([1][5]|[3][0]|[4][5]|[0][0])/u'
            ),
            'link' => 'required'
        ]);
            
        $pieces = explode("/", url()->previous());
        $date = $pieces[sizeof($pieces)-1];

        $tsks = Task::all()->where('fk_userid', $id);

        foreach ($tsks as $tsk) {
            if($tsk->start == $date . " " . $request->input('date') . ":00") {
                return redirect('/dashboard/patient/calendar/' . $id . '/' . $date)->with('Fail', 'Task already exist on this time');
            }
        }
        
        $task = new Task();
        $task->fk_userid = $id;
        $task->fk_activityid = $request->input('activitynr');
        $task->start = $date . " " . $request->input('date') . ":00";
        $task->title = $request->input('title');
        $task->confirmed = 0;
        $task->nachricht = $request->input('message');
        $task->link = $request->input('link');
        
        $task->save();
        
        return redirect('/dashboard/patient/calendar/' . $id . '/' . $date)->with('Success', 'Task created');
        
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
    public function update(Request $request, $id, $date, $task_id)
    {
        $this->validate($request, [
            'title' => 'required',
            'activitynr' => 'required',
            'date' => array(
                'required',
                'regex:/([0][1-9]|[1][0-9]|[2][0-3]):([1][5]|[3][0]|[4][5]|[0][0])/u'
            ),
            'link' => 'required'
        ]);
        
        $task = Task::find($task_id);

        $task->fk_userid = $id;
        $task->fk_activityid = $request->input('activitynr');
        $task->start = $date . " " . $request->input('date') . ":00";
        $task->title = $request->input('title');
        $task->confirmed = 0;
        $task->nachricht = $request->input('message');
        $task->link = $request->input('link');

        $task->save();
        
        return redirect('/dashboard/patient/calendar/' . $id . '/' . $date);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $date, $task_id)
    {
        $task = Task::find($task_id);
        $task->delete();

        return redirect('/dashboard/patient/calendar/' . $id . '/' . $date);
    }

    public function nextTasks($id, $time) {
        $tasks = Task::where('fk_userid', $id)
                    ->where('start', '>', $time)
                    ->take(4)
                    ->orderBy('start', 'asc')
                    ->get(['title', 'start', 'link']);
        
        return $tasks;
        /*
        $res2 = "";

        foreach($tasks as $task) {
            $dum = json_decode($task, true);
            $parts = explode(" ", $dum['start']);
            unset($dum['start']);
            $dum['start'] = $parts[0];
            $dum['time'] = $parts[1];
            $res2 = $res2 . json_encode($dum);
        }

        return "[" . $res2 . "]";
        */
    }

    public function confirm(Request $request, $id) {
        $task = Task::find($id);
        $task->confirmed = $request->input('angenommen');

        return $task;
    }
}
