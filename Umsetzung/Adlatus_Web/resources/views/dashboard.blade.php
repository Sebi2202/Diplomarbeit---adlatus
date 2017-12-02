@extends('layouts.app')

@section('content')
@if(Auth::guest())
    <?php
        return redirect('/login');
    ?>
@endif
@if(Auth::check())
    </head>
    <body>
        <div>
            {!! Form::open(['action' => 'Auth\LoginController@logout', 'method' => 'POST']) !!}
                {{Form::submit('Logout', ['class' => ''])}}
            {!! Form::close() !!}
        </div>
        <h2>You're logged in!</h2>
        @foreach($users as $user)
            @if($user->therapeut_sozNr == Auth::user()->sozNr)
                <button><a href="/dashboard/patient/{{$user->id}}">Get to Patient</a></button>
                <p>{{$user->vorname}} {{$user->nachname}}</p>
            @endif
        @endforeach
        <button><a href="/dashboard/create_patient">+</a></button>
@endif

@endsection
