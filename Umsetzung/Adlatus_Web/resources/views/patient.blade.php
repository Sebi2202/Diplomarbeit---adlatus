@extends('layout/layout')

@section('content')
@if(Auth::check())
    <style>
        #really:not(:target) .sure {display: none;}
        #really:target .sure {
            display: block;
            background-color:white;
            margin-left:10%;
            margin-right:15%;
            border:1px solid;
            height:200px;
            z-index:100;
            position:relative;
            bottom:250px;
        }

        .sure {
            display:none;
        }

        body {
            margin:0px;
            font-family:Verdana;
            font-size:14px;
            /* Hintergrund-Bild */
        }

        a {
            text-decoration:none;
            color:white;
            z-index:100;
        }

        .text { margin-left:5%; margin-right:5%; }

        header {
            background-color: lightblue;
            width:100%;
            height:60px;
        }

        .links {
            text-align:right;
            margin-left:15%;
            margin-right:15%;
            white-space:nowrap;
        }

        .links_header {
            position:relative;
            top:20px;
            font-weight:bold;
            color:white;
        }

        section {
            border:1px solid;
            margin-left:15%;
            margin-right:15%;
            padding-left:40px;
            height:400px;
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

        .btns2 { margin-left:5%; margin-right:5%; justify-content:space-between; }

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

        .delete {
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

        .cancel {
            text-align:center;
            font-family:Verdana;
            font-weight:bold;
            font-size:12px;

            padding-top:8px;
            padding-bottom:8px;

            width:40%;
            background-color:lightgray;
            border:none;
            box-shadow: 3px 5px 5px gray;
        }

        .ifdel { width:139px;  }

        .ifcancel { background-color:red; width:139px;}

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

        @media screen and (min-width:731px) and (max-height:611px) { footer { position:relative; } } 

        @media screen and (max-width:730px) {
            #really:target .sure { bottom:297px; }
            .fm { width:80%; } 
            section { height:450px; } 
            @media screen and (max-height:661px) { footer { position:relative; } }
        }

        @media screen and (max-width:470px) { section, .links { margin-left:5%; margin-right:5%; } }

        @media screen and (max-width:370px) { section { width:290px; } }

        /* @media - Responsive Design: if-Target */
        @media screen and (max-width:861px) { #really:target .sure { height:220px; } }

        @media screen and (max-width:705px) { #really:target .sure { margin-left:-5%; margin-right:5%; } }
        @media screen and (max-width:515px) { #really:target .sure { margin-left:-13%; margin-right:1%; } }

    </style>
    </head>
    <body>
        <header>
            <img class="logo" src="../imgs/logo.png">
            <div class="links">
                <a class="links_header" href="/dashboard">Home |</a>
                <a class="links_header" href="/dashboard/create_patient">Konto erstellen |</a>
                <a class="links_header" href="/">Logout</a>
            </div>
        </header>

        <section>
            <h2>Konto bearbeiten</h2>

            <p>{{$user->vorname}} {{$user->nachname}}</p>

            <div class="">
                {!! Form::open(['action' => ['PatientController@update', $user->id], 'method' => 'POST']) !!}
                {{ Form::text('vorname', $user->vorname, ['class' => 'fm', 'placeholder' => 'Vorname'])}}
                {{ Form::text('nachname', $user->nachname, ['class' => 'fm', 'placeholder' => 'Nachname'])}}
                <br>
                {{ Form::email('email', $user->email, ['class' => 'fm', 'placeholder' => 'E-Mail'])}}
                <br>
                {{ Form::password('password', ['class' => 'fm', 'placeholder' => 'Passwort'])}}
                <br>
                {{ Form::password('again', ['class' => 'fm', 'placeholder' => 'Passwort wiederholen'])}}
                <br>
                <div class="btns">
                    {{Form::submit('Speichern', ['class' => 'rg'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    {!! Form::close() !!} 
                    <a class="cancel" href="/dashboard">Abbrechen</a>
                </div>
                @if(Auth::user()->id != $user->id)
                    <br>
                    <div id="really">
                        <div class="btns">
                            <a href="#really" class="delete">Konto Löschen</a>
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
                @endif
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