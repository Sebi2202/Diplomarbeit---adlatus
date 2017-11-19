@extends('layout/layout')

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
            margin-left:10%;
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
            margin-left:25%;
            margin-right:25%;
            padding-left:40px;
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
            padding-left:5px;

            margin-bottom:20px;
            margin-right:3%;
            
            border:1px solid;
            box-shadow:1px 1px 1px gray;
            width:40%;
        }

        .lg {
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

        .text_link {
            font-style:italic;
            font-size:12px;
            padding-bottom:20px;
        }

        .forgot_reg {
            font-style:italic;
            font-size:12px;
            text-decoration:none;
            color:lightblue;
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
        }

        /* @media - Responsive Design */
        @media screen and (min-width:1285px) { 
            section { top:200px; }
            @media screen and (max-height:775px) { footer { display:none; } }
        }

        @media screen and (max-height:525px) { footer { display:none; } }
        @media screen and (max-width:770px) and (max-height:582px) { footer { display:none; } }
        @media screen and (max-width:508px) {
            section { width:255px; }
            .fm { width:178px; }
            .lg { width:137px; }
        }

        @media screen and (max-width:770px) {.fm {width:80%;} .lg { float:left; } .last_text { float:left; } section { height:320px; } }
        
    </style>

    <title>Login</title>
    
    </head>
    <body>
    <header>
            <img class="logo" src="../imgs/logo.png">
            <div class="links">
                <a class="links_header" href="/">Home |</a>
                <a class="links_header" href="/registrierung">Registrieren |</a>
                <a class="links_header" href="/help">Hilfe</a>
            </div>
        </header>

        <section>
            <h2>Login</h2>
            <form action="/dashboard" method="POST">
                <input class="fm" type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="fm" type="text" name="sozialNr" placeholder="Soz. Versicherungsnummer">
                <br>
                <input class="fm" type="password" name="password" placeholder="Passwort">
                <input class="lg" type="submit" name="login" value="Login">
            </form>
            <div class="last_text">
                <p class="text_link">Ich habe noch keinen Account - <a class="forgot_reg" href="/registrierung">Registrierung</a><br><br>
                <a class="forgot_reg" href="">Passwort vergessen?</a></p>
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
@endsection