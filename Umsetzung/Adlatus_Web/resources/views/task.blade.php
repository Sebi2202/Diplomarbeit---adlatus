@extends('layout/layout')

@section('content')
@if(Auth::check())
<style>

</style>
</head>
<body>
    <?php
        $pieces = explode("/", URL::current());
        $date = $pieces[sizeof($pieces)-2];
        $t = explode(" ", $task->start);
        $t2 = explode(":", $t[1]);
        $time = $t2[0] . ":" . $t2[1];
     ?>
        <div id="update">
            {!! Form::open(['action' => ['TaskController@update', $user->id, $date, $task->id], 'method' => 'POST']) !!}
            <img src="{{$task->link}}" width="120px" height="120px"><br>
            <h2><label id="label1">{{$task->title}}</label></h2>
            {{ Form::hidden('title', $task->title) }}
            {{ Form::hidden('activitynr', $task->fk_activityid) }}
            {{ Form::hidden('link', $task->link) }}
            <div class="">
                Uhrzeit {{Form::text('date', $time, ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', $task->nachricht, ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
                {{Form::hidden('_method', 'PUT')}}
            {!! Form::close() !!}
            {!! Form::open(['action' => ['TaskController@destroy', $user->id, $date, $task->id], 'method' => 'POST']) !!}
                {{ Form::submit('Löschen', ['class' => '']) }}
                {{ Form::hidden('_method', 'DELETE') }}
            {!! Form::close() !!}

                <a href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}">Abbrechen</a>
            </div>
        </div>

@endif
@if(Auth::guest())
<h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection