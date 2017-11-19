@extends('layout/layout')

@section('content')
    <title>Passwort Vergessen</title>
    <style>

    </style>
    </head>
    <body>
    
    <section>
        {{ Form::open(['action' => 'TherapeutController@continue', 'method' => 'POST']) }}
            {{ Form::text('sozNummer', '', ['class' => '', 'placeholder' => 'Soz. Versicherungsnummer'])}}
            <br>
            {{ Form::text('vorname', '', ['class' => '', 'placeholder' => 'Vorname'])}}
            <br>
            {{ Form::text('nachname', '', ['class' => '', 'placeholder' => 'Nachname'])}}          
            <br>
            {{ Form::submit('Weiter', ['class' => ''])}}
        {{ Form::close() }}
    </section>
@endsection