@extends('layout/layout')

@section('content')
    <title></title>
    </head>
    <body>
        <section>
        <p>Das Passwort muss Mindestens 6 Zeichen enthalten</p>
            {!! Form::open(['action' => ['TherapeutController@update', $therapeut->sozNr], 'method' => 'POST']) !!}
                {{ Form::password('password', ['class' => '', 'placeholder' => 'Passwort'])}}
                <br>
                {{ Form::password('again', ['class' => '', 'placeholder' => 'Passwort wiederholen'])}}
                {{Form::submit('Bestätigen', ['class' => ''])}}
				{{Form::hidden('_method', 'PUT')}}
           	{!! Form::close() !!}
        </section>
@endsection