@extends('layout/layout')

@section('content')
@if(Auth::check())
    <link rel="stylesheet" href="{{ URL::asset('css/patient.css') }}" />
    </head>
    <body class="test">
        <header>
            <img class="logo" src="/logo/adlatus_Logo.png">
            <div class="links">
                <a class="links_header" href="/dashboard">Dashboard |</a>
                <a class="links_header" href="/dashboard/create_patient">Konto erstellen |</a>
                <a class="links_header" href="/">Logout</a>
            </div>
        </header>

        <section>
            <h2>Konto bearbeiten</h2>

            <p>{{$user->vorname}} {{$user->nachname}}</p>

            @if(count($er)>0)
                <p style="color:red">{{$er}}</p>
            @endif
            
            <div class="">
                {!! Form::open(['action' => ['PatientController@update', $user->id], 'method' => 'POST']) !!}
                    @if($errors->has('vorname'))
                        <p class="error-message" style="color:red"> {{ $errors->first('vorname') }} </p>
                    @endif
                {{ Form::text('vorname', $user->vorname, ['class' => 'fm', 'placeholder' => 'Vorname'])}}
                    @if($errors->has('nachname'))
                        <p class="error-message" style="color:red"> {{ $errors->first('nachname') }} </p>
                    @endif
                {{ Form::text('nachname', $user->nachname, ['class' => 'fm', 'placeholder' => 'Nachname'])}}
                <br>
                    @if($errors->has('email'))
                        <p class="error-message" style="color:red"> {{ $errors->first('email') }} </p>
                    @endif
                {{ Form::email('email', $user->email, ['class' => 'fm', 'placeholder' => 'E-Mail'])}}
                <br>
                {{ Form::password('password', ['class' => 'fm', 'placeholder' => 'neues Passwort'])}}
                <br>
                {{ Form::password('again', ['class' => 'fm', 'placeholder' => 'Passwort wiederholen'])}}
                <br>
                <div class="btns">
                    {{Form::submit('Speichern', ['class' => 'rg'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    {!! Form::close() !!}
                    <a class="cancel" href="/dashboard">Abbrechen</a>
                </div>
                
                    <br>
                    <div id="really">
                        <div class="btns">
                            <a href="#really" class="delete">Konto löschen</a>
                        </div>
                        <div class="sure">
                            <h2 style="text-align:center;">Konto löschen</h2>
                            <p class="text"> Wollen Sie dieses Konto endgültig löschen?<br>
                            Sie verlieren durch das Löschen des Users auch den Zugriff über die App auf die Tagespläne dieses Users.</p>
                            <div class="btns btns2">
                                {!! Form::open(['action' => ['PatientController@destroy', $user->id], 'method' => 'POST']) !!}
                                    {{Form::submit('Löschen', ['class' => 'rg ifdel'])}}
                                    {{Form::hidden('_method', 'DELETE')}}
                                {!! Form::close() !!}
                                <a class="cancel ifcancel" href="#">Abbrechen</a>
                            </div>
                        </div>
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
