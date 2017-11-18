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
            margin-left:15%;
            margin-right:15%;
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
        
        @media screen and (max-height:320px) { footer { display:none; } }
        @media screen and (max-width:680px) { 
            @media screen and (max-height:340px) { footer { display:none; } }
        }
        @media screen and (max-width:497px) { 
            @media screen and (max-height:352px) { footer { display:none; } }
        }
        
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
            <h2>Error</h2>
            <h4>Fehlermeldung: Sozialversicherungsnummer ist schon aktiv!</h4>
            <a class="back" href="/registrierung">Zurück zur Registrierung</a>
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