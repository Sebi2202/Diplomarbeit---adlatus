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
            text-align:center;
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
            position:relative;
            width:100%;
            top:10px;
            background-color:gray;
            height:250px;
            margin-top:100px;
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
        /* -- Ausgegraut ist Responsive Design - Footer, sollte er position:fixed sein -- */

        /*
        @media screen and (min-width:1285px) { 
            @media screen and (max-height:840px) { footer { display:none; } }
            @media screen and (max-height:860px) { 
                @media screen and (max-width:1307px) { footer { display:none; } }
            }
        }

        @media screen and (min-height:900px) {
            @media screen and (max-width:768px) { 
                @media screen and (max-height:940px) { footer { display:none; } }
            }
            @media screen and (max-width:664px) { 
                @media screen and (max-height:960px) { footer { display:none; } }
            }
            @media screen and (max-width:540px) { 
                @media screen and (max-height:973px) { footer { display:none; } }
            }
            @media screen and (max-width:511px) { 
                @media screen and (max-height:990px) { footer { display:none; } }
            }
            @media screen and (max-width:468px) { 
                @media screen and (max-height:1010px) { footer { display:none; } }
            }
            @media screen and (max-width:438px) { 
                @media screen and (max-height:1030px) { footer { display:none; } }
            }
            @media screen and (max-width:408px) { 
                @media screen and (max-height:1050px) { footer { display:none; } }
            }
            @media screen and (max-width:379px) { 
                @media screen and (max-height:1066px) { footer { display:none; } }
            }
            @media screen and (max-width:360px) { footer { display:none; } } 

        }
        */
        @media screen and (max-width:768px) { .main { flex-direction:column; } }
        
        @media screen and (max-height:900px) {
            @media screen and (max-width:1285px) {
                body { font-size:14px; }
                header { height: 60px; }
                .links_header { top:20px; }
                footer { height:150px; }
                section { top:10px; }
                table { padding-top:10px; white-space:nowrap; }
                th { font-size:12px; }
                .bild { height:100px; }
                /*
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
                */
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