@extends('layouts.app')

@section('content')
@if(Auth::guest())
    </head>
    <body>
    <div class="">
        Passwort zurücksetzen
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
        <section>
            {!! Form::open(['action' => 'Auth\ForgotPasswordController@update', 'method' => 'POST']) !!}
                {{ Form::token() }}
                {{ Form::text('sozNummer', '', ['class' => '', 'placeholder' => 'Soz. Versicherungsnummer']) }} 
                <br>
                {{ Form::email('email', '', ['class' => 'fm', 'placeholder' => 'E-Mail'])}}
                <br>
                {{ Form::password('password', ['class' => 'fm', 'placeholder' => 'Passwort eingeben'])}}
                <br>
                {{ Form::password('again', ['class' => 'fm', 'placeholder' => 'Passwort wiederholen'])}}
                <br>
                {{ Form::submit('Passwort zurücksetzen', ['class' => '']) }}
                {{ Form::hidden('_method', 'PUT') }}
            {!! Form::close() !!}    
        </section>
    </div>
@endif
@if(Auth::check())
    <?php
        Auth::logout();
        header("Refresh:0");
    ?>
@endif
@endsection
