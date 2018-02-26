@extends('layout/layout')

 @section('content')
    <style>
        body {
            margin:0px;
            font-family:Verdana;
            font-size:14px;
        }

        header {
            background-color: lightblue;
            width:100%;
            height:60px;
        }

        a {
            text-decoration:none;
            color:white;
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
            top:10px;
            margin-left:15%;
            margin-right:15%;
        }

        .bild {
            text-align:center;
            height:250px;
            background-image: url("/background-image/bg.jpg");
            background-repeat: no-repeat no-repeat;
            background-size:100%;
            background-position: center;
        }

        .video {
            width:100%;
            text-align:center;
            background-image: url("/background-image/mockup.png");
            background-repeat: no-repeat;
            background-size:100%;
            background-position: center;
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
        }

        footer {
            position:absolute;
            left:0;
            bottom:0;
            right:0;
            width:100%;
            background-color:gray;
            height:150px;
            margin-top:100px;
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
            padding-right:10px;
        }

        td { padding-right:10px; }



        /* @media - Responsive Design */
        @media screen and (max-height:779px) { footer { position:relative; } }
        @media screen and (max-width:1150px) and (max-height:796px) { footer { position:relative; } }
        @media screen and (max-width:988px) and (max-height:813px) { footer { position:relative; } }
        @media screen and (max-width:792px) and (max-height:830px) { footer { position:relative; } }
        @media screen and (max-width:700px) and (max-height:1040px) { footer { position:relative; } }
        @media screen and (max-width:678px) and (max-height:1062px) { footer { position:relative; } }
        @media screen and (max-width:585px) and (max-height:1078px) { footer { position:relative; } }
        @media screen and (max-width:476px) and (max-height:1095px) { footer { position:relative; } }
        @media screen and (max-width:451px) and (max-height:1112px) { footer { position:relative; } }
        @media screen and (max-width:413px) and (max-height:1129px) { footer { position:relative; } }

        @media screen and (max-width:1280px) { .video { background-size: 130%; } }
        @media screen and (max-width:1000px) { .video { background-size: 160%;} }
        @media screen and (max-width:700px) { .main { flex-direction: column; justify-content:flex-start; } .video { height:200px; background-size:100%; } }
        @media screen and (max-width:636px) { .bild { background-size:150%; } }
        @media screen and (max-width:425px) { .bild { background-size:160%; } }

        @media screen and (max-width:400px) { section { width:280px; } }
        

        /*


        @media screen and (min-width:1285px) {
            @media screen and (max-height:890px) { footer { position:relative; bottom:70px; } }
            @media screen and (max-height:860px) {
                @media screen and (max-width:1307px) { footer {  } }
            }
        }

        @media screen and (min-height:900px) {
            @media screen and (max-width:768px) {
                @media screen and (max-height:1000px) { footer { position:relative; bottom:50px; } }
            }
            @media screen and (max-width:664px) {
                @media screen and (max-height:985px) { footer { position:relative; bottom:50px; } }
            }
            @media screen and (max-width:540px) {
                @media screen and (max-height:1020px) { footer { position:relative; bottom:90px; } }
            }
            @media screen and (max-width:511px) {
                @media screen and (max-height:990px) { footer { position:relative; bottom:90px; } }
            }
            @media screen and (max-width:468px) {
                @media screen and (max-height:1040px) { footer { position:relative; bottom:90px; } }
            }
            @media screen and (max-width:438px) {
                @media screen and (max-height:1070px) { footer { position:relative; bottom:79px; } }
            }
            @media screen and (max-width:408px) {
                @media screen and (max-height:1090px) { footer { position:relative; bottom:75px; } }
            }
            @media screen and (max-width:379px) {
                @media screen and (max-height:1100px) { footer { position:relative; bottom:80px; } }
            }
            @media screen and (max-width:360px) { footer { position:relative; bottom:90px; } }

        }


        @media screen and (max-width:1280px) and (max-height:800px) { footer { top:170px; } }
        @media screen and (max-width:1280px) and (max-height:720px) { footer { top:90px; } }
        @media screen and (max-width:1280px) and (max-height:640px) { footer { top:20px; } }


        @media screen and (max-width:768px) { .main { flex-direction:column; } }

        @media screen and (max-height:900px) and (max-width:1285px) {
            body { font-size:14px; }
            header { height: 60px; }
            .links_header { top:20px; }
            footer { height:150px; }
            section { top:10px; }
            table { padding-top:10px; white-space:nowrap; }
            th { font-size:12px; }
            .bild { height:100px; }

            @media screen and (max-height:530px) { footer { display:none; } }
            @media screen and (max-width:1150px) {
                @media screen and (max-height: 548px) { footer { display:none; } }
            }
            @media screen and (max-width:988px) {
                @media screen and (max-height: 565px) { footer { display:none; } }
            }
            @media screen and (max-width:792px) {
                @media screen and (max-height: 580px) { footer { display:none; } }
            }
            @media screen and (max-width:768px) {
                @media screen and (max-height: 585px) { footer { display:none; } }
            }
            @media screen and (max-width:758px) {
                @media screen and (max-height: 600px) { footer { display:none; } }
            }
            @media screen and (max-width:684px) {
                @media screen and (max-height: 618px) { footer { display:none; } }
            }
            @media screen and (max-width:680px) { footer { display:none; } }
        }*/

    </style>
    <title>Startseite</title>
    </head>
    <body>
        @if(Auth::guest())
        <header>
            <img class="logo" src="/logo/adlatus_Logo.png">
            <div class="links">
                <a class="links_header" href="/register">Registrierung |</a>
                <a class="links_header" href="/login">Login |</a>
                <a class="links_header" href="/help">Hilfe</a>
            </div>
        </header>
        <section>
            <div class="bild">

            </div>
            <div class="main">
                <div class="video">

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
        @endif
        @if(Auth::check())
            <?php
                Auth::logout();
                header("Refresh:0");
            ?>
        @endif
@endsection
