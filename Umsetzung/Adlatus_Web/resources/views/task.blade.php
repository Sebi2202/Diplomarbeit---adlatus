@extends('layout/layout')

@section('content')
@if(Auth::check())

<link rel="stylesheet" href="{{ URL::asset('css/task.css') }}" />

</head>
<body>
    <header>
        <img class="logo" src="/logo/adlatus_Logo.png">
        <div class="links">
            <a class="links_header" href="/dashboard">Dashboard |</a>
            <a class="links_header" href="/dashboard/create_patient">Konto erstellen |</a>
            <a class="links_header" href="/">Logout</a>
        </div>
    </header>
    @if($task->fk_activityid != 18)
    <section>
        <?php
            $pieces = explode("/", URL::current());
            $date = $pieces[sizeof($pieces)-2];
            $t = explode(" ", $task->start);
            $t2 = explode(":", $t[1]);
            $time = $t2[0] . ":" . $t2[1];
        ?>
            <div id="update">
                {!! Form::open(['action' => ['TaskController@update', $user->id, $date, $task->id], 'method' => 'POST']) !!}
                <img src="{{$task->link}}" width="120px" height="120px">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <p style="color: red">Die angegebene Uhrzeit ist inkorrekt.</p>
                    @endforeach
                @endif
                <h2><label id="label1">{{$task->title}}</label></h2>
                {{ Form::hidden('title', $task->title) }}
                {{ Form::hidden('activitynr', $task->fk_activityid) }}
                {{ Form::hidden('link', $task->link) }}
                <div class="">
                    Uhrzeit {{Form::text('date', $time, ['class' => 'fm-clock', 'placeholder' => '15:30'])}} <br>
                    Persönliche Nachricht (Optional) <br>
                    {{ Form::text('message', $task->nachricht, ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}} <br>
                    <div class="buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                            {{Form::hidden('_method', 'PUT')}}
                        {!! Form::close() !!}
                        {!! Form::open(['action' => ['TaskController@destroy', $user->id, $date, $task->id], 'method' => 'POST']) !!}
                            {{ Form::submit('Löschen', ['class' => 'delete save']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                        {!! Form::close() !!}
                    </div>
                    <br>
                    <div class="div-cancel">
                        <a class="cancel" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}">Abbrechen</a>
                    </div>

                </div>
            </div>
        </section>
    @endif
    @if($task->fk_activityid == 18)
        <section>
        <?php
            $pieces = explode("/", URL::current());
            $date = $pieces[sizeof($pieces)-2];
            $t = explode(" ", $task->start);
            $t2 = explode(":", $t[1]);
            $time = $t2[0] . ":" . $t2[1];
        ?>
            <div id="update">
                {!! Form::open(['action' => ['TaskController@update', $user->id, $date, $task->id], 'method' => 'POST']) !!}
                <img src="{{$task->link}}" width="120px" height="120px">
                @if(count($errors) > 0)
                    <p style="color: red">Die angegebene Uhrzeit ist inkorrekt.</p>
                @endif
                <br><br>
                Bezeichnung
                {{ Form::text('title', $task->title, ['class' => 'fm-clock fm-msg fm-title', 'placeholder' => 'Bezeichnung']) }}
                {{ Form::hidden('activitynr', $task->fk_activityid) }}
                {{ Form::hidden('link', $task->link) }}
                <div class="">
                    Uhrzeit {{Form::text('date', $time, ['class' => 'fm-clock', 'placeholder' => '15:30'])}} <br>
                    Persönliche Nachricht (Optional) <br>
                    {{ Form::text('message', $task->nachricht, ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}} <br>
                    <div class="buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                            {{Form::hidden('_method', 'PUT')}}
                        {!! Form::close() !!}
                        {!! Form::open(['action' => ['TaskController@destroy', $user->id, $date, $task->id], 'method' => 'POST']) !!}
                            {{ Form::submit('Löschen', ['class' => 'delete save']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                        {!! Form::close() !!}
                    </div>
                    <br>
                    <div class="div-cancel">
                        <a class="cancel" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}">Abbrechen</a>
                    </div>

                </div>
            </div>
        </section>
    @endif

        <footer>
            <table class="footer-table">
                <tr>
                    <th class="footer-th">Kontakt</th>
                    <th class="footer-th">Links</th>
                </tr>
                <tr>
                    <td class="footer-td"><a href="http://www.project-adlatus.at">www.project-adlatus.at</a></td>
                    <td class="footer-td"><a href="/">Home</a></td>
                </tr>
                <tr>
                    <td class="footer-td">Diplomarbeitsprojekt HTL3R</td>
                    <td class="footer-td"><a href="/registrierung">Registrieren</a></td>
                </tr>
                <tr>
                    <td class="footer-td"></td>
                    <td class="footer-td"><a href="/login">Login</a></td>
                </tr>
                <tr>
                    <td class="footer-td"></td>
                    <td class="footer-td"><a href="/help">Hilfe</a></td>
                </tr>
            </table>
        </footer>

@endif
@if(Auth::guest())
<h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection
