@extends('layout/layout')

@section('content')
    <style>
        body {
            margin:0px;
            font-family:Verdana;
            /* Hintergrund-Bild */
        }

        a {
            text-decoration:none;
            color:white;
        }

        header {
            background-color: lightblue;
            width:100%;
            height:100px;
        }

        .links {
            text-align:right;
            margin-left:10%;
            margin-right:15%;
            white-space:nowrap;
        }

        .links_header {
            position:relative;
            top:30px;
            font-weight:bold;
            color:white;
        }

        section {
            border:1px solid;
            margin-left:15%;
            margin-right:15%;
        }

        .main {
            margin-left:5%;
        }

        h2 {
            font-weight:normal;
        }

        .to_login {
            text-decoration:none;
            color:lightblue;
        }

        footer {
            position:absolute;
            left:0;
            right:0;
            bottom:0;
            background-color:gray;
            height:250px;
            z-index:-9999;
        }

        table {
            width:30%;
            font-size:12px;
            padding-top:30px;
            margin-left:15%;
            color:white;
        }

        th {
            height:40px;
            font-size:14px;
            text-align:left;
        }

        /* @media - Responsive Design */
        @media screen and (max-width:768px) {
            footer { display:none; }
        }

        @media screen and (max-height:1000px) {
            footer { height:200px; }
        }

        @media screen and (max-height:660px) {
            footer { opacity:0.4; }
        }
    </style>

    <title>Registrieren</title>
    
    </head>
    <body>
    <header>
            <img class="logo" src="../imgs/logo.png">
            <div class="links">
                <a class="links_header" href="/">Home |</a>
                <a class="links_header" href="/login">Login |</a>
                <a class="links_header" href="/help">Hilfe</a>
            </div>
        </header>

        <section>
            <div class="main">
                <h2>Registrierung</h2>

                <div class="forms">
                    
                </div>

                <p>Ich habe bereits einen Account - <a class="to_login" href="/login">Login</a></p>
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

