@extends('layout/layout')

@section('content')
@if(Auth::check())
    </head>
    <style>
        body {
            margin:0px;
            font-family:Verdana;
            font-size:14px;
            background-image: url("/background-image/BackgroundImage.jpg");
            background-repeat: no-repeat;
            background-size:100%;
        }

        a {
            text-decoration:none;
            color:white;
            z-index:100;
        }

        header {
            background-color: lightblue;
            width:100%;
            height:60px;
        }

        .logo { position:absolute; margin-left:15%; width:150px; top:6px; }

        .links {
            text-align:right;
            margin-left:15%;
            margin-right:15%;
            white-space:nowrap;
        }

        .links_header {
            position:relative;
            top:40px;
            font-weight:bold;
            color:white;
        }

        section {
            border:1px solid;
            margin-left:15%;
            margin-right:15%;
            padding-left:40px;
            height:400px;
            background-color:white;
        }

        h2 {
            padding-top:20px;
            font-size:18px;
            font-weight:normal;
        }
        
        .text_link {
            position:relative;
            left:1px;
            font-style:italic;
            font-size:12px;
            padding-bottom:50px;
        }

        .to_login {
            font-style:italic;
            font-size:12px;
            text-decoration:none;
            color:lightblue;
        }
        
        .fm {
            font-family:Verdana;
            font-size:12px;
            font-style:italic;

            padding-top:5px;
            padding-bottom:5px;
            padding-left:5px;

            margin-bottom:20px;
            margin-right:3%;
            
            border:1px solid;
            box-shadow:1px 1px 1px gray;
            width:40%;
        }

        .btns {
            display:flex;
            flex-direction:row;
        }

        .rg {
            text-align:center;
            font-family:Verdana;
            font-weight:bold;
            font-size:12px;

            padding-top:8px;
            padding-bottom:8px;
            padding-right:20px;
            padding-left:20px;
            margin-right:4%;

            width:40%;

            color:white;
            background-color:#4C9900;
            border:none;
            box-shadow: 3px 5px 5px gray;
        }

        .cancel {
            text-align:center;
            font-family:Verdana;
            font-weight:bold;
            font-size:12px;

            padding-top:8px;
            padding-bottom:8px;

            width:40%;
            background-color:red;
            border:none;
            box-shadow: 3px 5px 5px gray;
        }

        footer {
            /* position:relative;
            width:100%; */
            position:absolute;
            left:0;
            right:0;
            bottom:0;
            background-color:gray;
            height:150px;
            z-index:-9999;
        }

        table {
            width:30%;
            font-size:12px;
            padding-top:10px;
            margin-left:15%;
            white-space:nowrap;
            color:white;
            
        }

        th {
            height:40px;
            font-size:12px;
            text-align:left;
            padding-right:10px;
        }

        td { padding-right:10px; }

        /* @media - Responsive Design */

        @media screen and (min-width:676px) and (max-height:611px) { footer { position:relative; } }

        @media screen and (max-width:675px) {
            .fm { width:80%; }
            section { height:420px; }
            @media screen and (max-height:632px) { footer { position:relative; } }
        }

        @media screen and (max-width:550px) {section, .links { margin-left:5%; margin-right:5%; } }

        @media screen and (max-width:360px) { section { width:280px; } }
    </style>
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
                {{ Form::text('vorname', '', ['class' => 'fm', 'placeholder' => 'Vorname'])}}
                {{ Form::text('nachname', '', ['class' => 'fm', 'placeholder' => 'Nachname'])}}
                <br>
                {{ Form::email('email', '', ['class' => 'fm', 'placeholder' => 'E-Mail'])}}
                <br>
                {{ Form::text('sozNummer', '', ['class' => 'fm', 'placeholder' => 'Soz. Versicherungsnummer'])}}
                <br>
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