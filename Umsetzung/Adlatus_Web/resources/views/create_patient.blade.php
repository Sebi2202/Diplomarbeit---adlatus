@extends('layout/layout')

@section('content')
@if(Auth::check())

    <link rel="stylesheet" href="{{ URL::asset('css/create_patient.css') }}" />

    </head>
    <body>
        <header>
            <img class="logo" src="/logo/adlatus_Logo.png">
            <div class="links">
                <a class="links_header" href="/dashboard">Dashboard |</a>
                <a class="links_header" href="/dashboard/create_patient">Konto erstellen |</a>
                <a class="links_header" href="/">Logout</a>
            </div>
        </header>

        <section>
            <h2>Konto hinzufügen</h2>
            
            <div class="">
                {!! Form::open(['action' => 'PatientController@store', 'method' => 'POST']) !!}
                    @if($errors->has('vorname'))
                        <p class="error-message" style="color:red"> {{ $errors->first('vorname') }} </p>
                    @endif
                {{ Form::text('vorname', '', ['class' => 'fm', 'placeholder' => 'Vorname'])}}
                    @if($errors->has('nachname'))
                        <p class="error-message" style="color:red"> {{ $errors->first('nachname') }} </p>
                    @endif
                {{ Form::text('nachname', '', ['class' => 'fm', 'placeholder' => 'Nachname'])}}
                <br>
                    @if($errors->has('email'))
                        <p class="error-message" style="color:red"> {{ $errors->first('email') }} </p>
                    @endif
                {{ Form::email('email', '', ['class' => 'fm', 'placeholder' => 'E-Mail'])}}
                <br>
                    @if($errors->has('sozNummer'))
                        <p class="error-message" style="color:red"> {{ $errors->first('sozNummer') }} </p>
                    @endif
                {{ Form::text('sozNummer', '', ['class' => 'fm', 'placeholder' => 'Soz. Versicherungsnummer'])}}
                <br>
                    @if($errors->has('password'))
                        <p class="error-message" style="color:red"> {{ $errors->first('password') }} </p>
                    @endif
                {{ Form::password('password', ['class' => 'fm', 'placeholder' => 'Passwort'])}}
                <br>
                {{ Form::password('again', ['class' => 'fm', 'placeholder' => 'Passwort wiederholen'])}}
                <br>
                <div class="btns">
                    {{Form::submit('Speichern', ['class' => 'rg'])}}
                    {!! Form::close() !!}
                    <a class="cancel" href="/dashboard">Abbrechen</a>
                </div>
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
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection
