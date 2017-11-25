@extends('layouts.app')

@section('content')
    <style>
        body {
            margin:0px;
            font-family:Verdana;
            font-size:14px;
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
            position:relative;
            top:50px;
            border:1px solid;
            margin-left:15%;
            margin-right:15%;
            padding-left:40px;
            padding-bottom:20px;
            
        }

        h2 {
            padding-top:20px;
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

            float:right;
            margin-right:15%;

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
        @media screen and (max-width:703px) { .fm { width:80%; } .sb { float:none; }  
            @media screen and (max-height:525px) { footer { position:relative; top:101px; } }
        }
        @media screen and (max-width:415px) { section { margin-left:10%; margin-right:10%; } }
        @media screen and (max-width:370px) { section { width:250px; } }
        @media screen and (max-height:500px) and (min-width:704px) { footer { position:relative; top:105px; } }
        

    </style>
    </head>
    <body>
        <header>
            <img class="logo" src="../imgs/logo.png">
            <div class="links">
                <a class="links_header" href="/">Home |</a>
                <a class="links_header" href="/register">Registrierung |</a>
                <a class="links_header" href="/help">Hilfe</a>
            </div>
        </header>
        
        <section>
            <div class="">
                <h2>Passwortrücksetzung</h2>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            {!! Form::open(['action' => 'DashboardController@email', 'method' => 'POST']) !!}
                {{ Form::token() }}
                E-Mail eingeben <br><br>
                {{ Form::email('email', '', ['class' => 'fm', 'placeholder' => 'E-Mail Adresse eingeben!']) }} 
                {{ Form::submit('Bestätigen', ['class' => 'sb']) }}
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
@endsection
