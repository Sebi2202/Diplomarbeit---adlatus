@extends('layout/layout')

@section('content')
@if(Auth::check())
    <style>
        #really:not(:target) .sure {display: none;}
        #really:target .sure {display: block;}

        .sure {
            display:none;
        }
    </style>
    </head>
    <body>
        <div class="">
            <h2>Konto bearbeiten</h2>

            <p>{{$user->vorname}} {{$user->nachname}}</p>

            <div class="">
                {!! Form::open(['action' => ['PatientController@update', $user->id], 'method' => 'POST']) !!}
                {{ Form::text('vorname', $user->vorname, ['class' => '', 'placeholder' => 'Vorname'])}}
                {{ Form::text('nachname', $user->nachname, ['class' => '', 'placeholder' => 'Nachname'])}}
                <br>
                {{ Form::email('email', $user->email, ['class' => '', 'placeholder' => 'E-Mail'])}}
                <br>
                {{ Form::password('password', ['class' => '', 'placeholder' => 'Passwort'])}}
                <br>
                {{ Form::password('again', ['class' => '', 'placeholder' => 'Passwort wiederholen'])}}
                <br>
            	{{Form::submit('Speichern', ['class' => ''])}}
                {{Form::hidden('_method', 'PUT')}}
           	    {!! Form::close() !!} 
                <button><a href="/dashboard">Abbrechen</a></button>
                @if(Auth::user()->id != $user->id)
                    <br>
                    <div id="really">
                        <button><a href="#really">Konto Löschen</a></button>
                
                        <div class="sure">
                            {!! Form::open(['action' => ['PatientController@destroy', $user->id], 'method' => 'POST']) !!}
                                {{Form::submit('Löschen', ['class' => ''])}}
					            {{Form::hidden('_method', 'DELETE')}}
           		            {!! Form::close() !!}
                            <button><a href="#">Abbrechen</a></button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
@endif
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection