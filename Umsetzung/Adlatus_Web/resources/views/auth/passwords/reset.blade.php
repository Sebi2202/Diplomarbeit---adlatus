@extends('layouts.app')

@section('content')
@if(Auth::guest())
    <style>
        body {
            margin:0px;
            font-family:Verdana;
            font-size:14px;
            background: url("/background-image/BackgroundImage.jpg") no-repeat center center fixed;
            background-size:cover;
            -webkit-background-size: cover; 
            -moz-background-size: cover;    
            -o-background-size: cover;
        }

        a {
            text-decoration:none;
            color:white;
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
            position:relative;
            top:50px;
            margin-left:15%;
            margin-right:15%;
            padding-top:20px;
            padding-left:40px;
            padding-right:40px;
            padding-bottom:20px;
            background-color:white;
        }

        h2 {
            font-weight:normal;
        }

        .fm {
            font-family:Verdana;
            font-size:12px;
            font-style:italic;

            padding-top:5px;
            padding-bottom:5px;
            padding-left:10px;


            margin-bottom:20px;
            margin-right:3%;

            border:1px solid;
            box-shadow:1px 1px 1px gray;
            width:40%;
        }

        .sb {
            font-family:Verdana;
            font-weight:bold;
            font-size:12px;

            padding-top:8px;
            padding-bottom:8px;
            padding-right:50px;
            padding-left:50px;

            margin-right:40px;
            float:right;

            color:white;
            background-color:lightgray;
            border:none;
            box-shadow: 3px 5px 5px gray;
        }

        footer {
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
        }

        /* @media - Responsive Design */
        @media screen and (min-width:801px) and (max-height:580px) { footer { position:relative; top:100px; } }
        @media screen and (max-width:402px) and (max-height:635px) { footer { position:relative; top:99px; } }
        @media screen and (max-width:800px) {
            .sb { float:none; }
            .fm { width:90%; }
            @media screen and (max-height:615px) and (min-width:403px) { footer { position:relative; top:104px; } }
        }

        @media screen and (max-width:460px) {
            section { margin-left:10%; margin-right:10%; }
        }

        @media screen and (max-width:360px) {
            section { width:205px; }
        }

    </style>
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
                        <p style="color:red"> {{ $errors->first('sozNummer') }} </p>
                    @endif
                {{ Form::text('sozNummer', '', ['class' => 'fm', 'placeholder' => 'Soz. Versicherungsnummer']) }}
                <br>
                    @if($errors->has('email'))
                        <p style="color:red"> {{ $errors->first('email') }} </p>
                    @endif
                {{ Form::email('email', '', ['class' => 'fm', 'placeholder' => 'E-Mail'])}}
                <br>
                    @if($errors->has('password'))
                        <p style="color:red"> {{ $errors->first('password') }} </p>
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
