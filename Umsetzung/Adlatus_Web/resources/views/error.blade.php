@extends('layout/layout')

@section('content')
    <style>
        body {
            margin:0px;
            font-family:Verdana;
            font-size:14px;
            background-image: url("/background-image/BackgroundImage.jpg");
            background-repeat: no-repeat;
            background-size:100%;
        }

        .logo { position:absolute; margin-left:15%; width:150px; top:6px; }

        a {
            text-decoration:none;
            color:white;
        }

        h2 { 
            font-size:18px;
        }

        .back {
            font-size:12px;
            font-style:italic;
            color:lightblue;
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
            top:40px;
            font-weight:bold;
            color:white;
        }

        section {
            margin-left:15%;
            margin-right:15%;
            background-color:white;
            padding-top:10px;
            padding-bottom:10px;
            padding-left:20px;
            padding-right:20px;
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
            white-space:nowrap;
            margin-left:15%;
            color:white;
        }

        th {
            height:40px;
            font-size:12px;
            text-align:left;
        }

        /* @media - Responsive Design */
        
        @media screen and (min-width:681px) and (max-height:350px) { footer { position:relative; top:32px; } }
        @media screen and (max-width:680px) and (max-height:375px) { footer { position:relative; top:42px; } }
        @media screen and (max-width:497px) and (max-height:370px) { footer { position:relative; top:22px; } }
        
    </style>

    <title>Login</title>
    
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
            <h2>Error</h2>
            <h4>Fehlermeldung: Sozialversicherungsnummer ist schon aktiv!</h4>
            <!--<a class="back" href="/register">Zurück zur Registrierung</a>-->
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
                    <td><a href="/register">Registrieren</a></td>
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