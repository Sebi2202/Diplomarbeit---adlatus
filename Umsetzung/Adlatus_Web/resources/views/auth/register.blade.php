@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/register.css') }}" />

    </head>
    <body>
    @if(Auth::guest())
        <header>
            <img class="logo" src="/logo/adlatus_Logo.png">
            <div class="links">
                <a class="links_header" href="/">Home |</a>
                <a class="links_header" href="/login">Login |</a>
                <a class="links_header" href="/help">Hilfe</a>
            </div>
        </header>

        <section>
            <h2>Registrierung</h2>
            <div>
                {!! Form::open(['action' => 'Auth\RegisterController@register', 'method' => 'POST']) !!}
                    @if($errors->has('vorname'))
                        <p class="error-message" style="color:red"> {{ $errors->first('vorname') }} </p>
                    @endif
                {{ Form::text('vorname', '', ['class' => 'fm', 'placeholder' => 'Vorname*'])}}
                    @if($errors->has('nachname'))
                        <p class="error-message" style="color:red"> {{ $errors->first('nachname') }} </p>
                    @endif
                {{ Form::text('nachname', '', ['class' => 'fm', 'placeholder' => 'Nachname*'])}}
                <br>
                    @if($errors->has('email'))
                        <p class="error-message" style="color:red"> {{ $errors->first('email') }} </p>
                    @endif
                {{ Form::email('email', '', ['class' => 'fm', 'placeholder' => 'E-Mail*'])}}
                <br>
                    @if($errors->has('sozNummer'))
                        <p class="error-message" style="color:red"> {{ $errors->first('sozNummer') }} </p>
                    @endif
                {{ Form::text('sozNummer', '', ['class' => 'fm', 'placeholder' => 'Soz. Versicherungsnummer*'])}}
                <br>
                    @if($errors->has('password'))
                        <p class="error-message" style="color:red"> {{ $errors->first('password') }} </p>
                    @endif
                {{ Form::password('password', ['class' => 'fm', 'placeholder' => 'Passwort*'])}}
                <br>
                {{ Form::password('again', ['class' => 'fm', 'placeholder' => 'Passwort wiederholen*'])}}
                <br>
            	{{Form::submit('Registrieren', ['class' => 'rg'])}}
           	    {!! Form::close() !!}
                <p class="text_link">Felder mit einem Stern(*) müssen ausgefüllt werden.<br><br>
                Ich habe bereits einen Account - <a class="to_login" href="/login">Login</a></p>
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
@endsection
