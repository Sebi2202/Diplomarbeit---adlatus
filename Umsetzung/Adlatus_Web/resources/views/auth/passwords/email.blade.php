@extends('layouts.app')

@section('content')
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
            {!! Form::open(['action' => 'DashboardController@email', 'method' => 'POST']) !!}
                {{ Form::token() }}
                E-Mail eingeben <br>
                {{ Form::email('email', '', ['class' => '', 'placeholder' => 'E-Mail']) }} 
                <br>
                {{ Form::submit('Passwort zurücksetzen', ['class' => '']) }}
            {!! Form::close() !!}    
        </section>
@endsection
