@extends('layouts.app')

@section('content')
    
<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}" />
</head>
<body>
    @if(Auth::guest())
    <header>
        <img class="logo" src="/logo/adlatus_Logo.png">
        <div class="links">
            <a class="links_header" href="/">Home |</a>
            <a class="links_header" href="/register">Registrierung |</a>
            <a class="links_header" href="/help">Hilfe</a>
        </div>
    </header>
    <section class="panel">
        <h2>Login</h2>
        @if(count($error) > 0)
                <p style="color: red">{{$error}}</p>
        @endif
        <div>
            {!! Form::open(['action' => 'Auth\LoginController@login', 'method' => 'POST']) !!}
                {{Form::token()}}
                {{ Form::text('sozNummer', '', ['class' => 'fm', 'placeholder' => 'Soz. Versicherungsnummer'])}}
                <br>
                {{Form::password('password', ['class' => 'fm', 'placeholder' => 'Passwort'])}}
                <br>
                {{Form::submit('Anmelden', ['class' => 'rg'])}}
            {!! Form::close() !!}
        </div>
        <div class="last_text">
                <p class="text_link">Ich habe noch keinen Account - <a class="forgot_reg" href="/register">Registrierung</a><br><br>
                <a class="forgot_reg" href="/password/reset">Passwort vergessen?</a></p>
        </div>
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
    @endif
    @if(Auth::check())
        <?php
            Auth::logout();
            header("Refresh:0");
        ?>
    @endif
@endsection
