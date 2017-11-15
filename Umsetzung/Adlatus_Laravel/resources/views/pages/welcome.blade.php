@extends('layout/layout')

 @section('content')
    <style>
        body {
            margin:0px;
            font-family:Verdana;
        }

        header {
            background-color: lightblue;
            width:100%;
            height:100px;
        }

        a {
            text-decoration:none;
            color:white;
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
            margin-left:15%;
            margin-right:15%;
        }

        .bild {
            text-align:center;
            border:1px solid;
            height:250px;
        }

        .video {
            border:1px solid;
            width:100%;
            
        }

        .text {
            margin-left:20px;
        }

        .main {
            display:flex;
            flex-direction:row;
           
        }

        .main > div {
            justify-content:space-between;
            margin-top:50px;
            text-align:center;
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
            padding-top:50px;
            margin-left:15%;
            color:white;
        }

        th {
            text-align:left;
        }

        @media screen and (max-width:768px) {
            footer {
                background-color:white;
            }
        }
    </style>
    <title>Startseite</title>
    </head>
    <body>
        <header>
            <img class="logo" src="../imgs/logo.png">
            <div class="links">
                <a class="links_header" href="/registrierung">Registrieren |</a>
                <a class="links_header" href="/login">Login |</a>
                <a class="links_header" href="/help">Hilfe</a>
            </div>
        </header>
        <section>
            <div class="bild">
                Big Picture here
            </div>
            <div class="main">
                <div class="video">
                    Video here
                </div>
                <div class="text">
                    <h4>Diplomarbeit Adlatus</h4>
                    <p>Adlatus ist eine Diplomarbeit der HTL Rennweg. Das Projektteam hat versucht eine Tagesstrukturplan-App zu entwickeln</p>
                    <p>Auf der Webseite kann man für eine Person einen Tagesplan entwickeln, welcher dieser dann auf der App öffnen kann. Beim Tagesplan kann ich verschiedene Aktivitäten hinzufügen und man wird auf diese erinnert</p>
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

@endsection