@extends('layouts.app')

@section('content')
@if(Auth::guest())
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css') }}" />
    </head>
    <body>
        <header>
            <img class="logo" src="/logo/adlatus_Logo.png">
            <div class="links">
                <a class="links_header" href="/">Home |</a>
                <a class="links_header" href="/register">Registrierung |</a>
                <a class="links_header" href="/help">Hilfe</a>
            </div>
        </header>

        <section>
            <div class="">
                <h2>Passwort zurücksetzen</h2>
            </div>
            {!! Form::open(['action' => 'Auth\ForgotPasswordController@update', 'method' => 'POST']) !!}
                {{ Form::token() }}
                    @if($errors->has('sozNummer'))
                        <p class="error-message" style="color:red"> {{ $errors->first('sozNummer') }} </p>
                    @endif
                {{ Form::text('sozNummer', '', ['class' => 'fm', 'placeholder' => 'Soz. Versicherungsnummer']) }}
                <br>
                    @if($errors->has('email'))
                        <p class="error-message" style="color:red"> {{ $errors->first('email') }} </p>
                    @endif
                {{ Form::email('email', '', ['class' => 'fm', 'placeholder' => 'E-Mail'])}}
                <br>
                    @if($errors->has('password'))
                        <p class="error-message" style="color:red"> {{ $errors->first('password') }} </p>
                    @endif
                {{ Form::password('password', ['class' => 'fm', 'placeholder' => 'Passwort eingeben'])}}
                <br>
                {{ Form::password('again', ['class' => 'fm', 'placeholder' => 'Passwort wiederholen'])}}
                {{ Form::submit('Bestätigen', ['class' => 'sb']) }}
                {{ Form::hidden('_method', 'PUT') }}
            {!! Form::close() !!}
        </section>
        <footer>
            <table>
                <tr>
                    <th>Kontakt</th>
                    <th>Links</th>
                </tr>
                <tr>
                    <td><a href="http://www.project-adlatus.at">www.project-adlatus.at</a></td>
                    <td><a href="/">Home</a></td>
                </tr>
                <tr>
                    <td>Diplomarbeitsprojekt HTL3R</td>
                    <td><a href="/registrierung">Registrieren</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="/login">Login</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="/help">Hilfe</a></td>
                </tr>
            </table>
        </footer>
    </div>
@endif
@if(Auth::check())
    <?php
        Auth::logout();
        header("Refresh:0");
    ?>
@endif
@endsection
