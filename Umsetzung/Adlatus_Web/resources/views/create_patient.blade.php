@extends('layout/layout')

@section('content')
@if(Auth::check())
    </head>
    <body>
        <div class="">
            <h2>Konto hinzufügen</h2>

            <div class="">
                {!! Form::open(['action' => 'PatientController@store', 'method' => 'POST']) !!}
                {{ Form::text('vorname', '', ['class' => '', 'placeholder' => 'Vorname'])}}
                {{ Form::text('nachname', '', ['class' => '', 'placeholder' => 'Nachname'])}}
                <br>
                {{ Form::email('email', '', ['class' => '', 'placeholder' => 'E-Mail'])}}
                <br>
                {{ Form::text('sozNummer', '', ['class' => '', 'placeholder' => 'Soz. Versicherungsnummer'])}}
                <br>
                {{ Form::password('password', ['class' => '', 'placeholder' => 'Passwort'])}}
                <br>
                {{ Form::password('again', ['class' => '', 'placeholder' => 'Passwort wiederholen'])}}
                <br>
            	{{Form::submit('Speichern', ['class' => ''])}}
           	    {!! Form::close() !!} 
                <button><a href="/dashboard">Abbrechen</a></button>
            </div>
        </div>
@endif
@if(Auth::guest())
    <h2>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h2>
@endif
@endsection