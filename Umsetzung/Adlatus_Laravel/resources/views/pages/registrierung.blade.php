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
            position:relative;
            top:50px;

            padding-left:15px;
            margin-left:15%;
            margin-right:15%;
            border:1px solid;
        }

        .main {
            margin-left:5%;
        }

        h2 {
            padding-top:50px;
            font-weight:normal;
        }

        .text_link {
            position:relative;
            left:1px;
            font-style:italic;
            font-size:14px;
            padding-bottom:50px;
        }

        .to_login {
            font-style:italic;
            font-size:14px;
            text-decoration:none;
            color:lightblue;
        }

        .fm {
            font-family:Verdana;
            font-size:16px;
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

        .rg {
            font-family:Verdana;
            font-weight:bold;
            font-size:16px;

            padding-top:8px;
            padding-bottom:8px;
            padding-right:20px;
            padding-left:20px;

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
            bottom:0;
            right:0;
            width:100%;
            background-color:gray;
            height:250px;
            
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
        /* -- Ausgegraut ist Responsive Design - Footer, sollte er position:relative sein -- */       
        /*
        @media screen and (max-width:1280px) and (max-height:800px) { footer { top:200px; } }
        @media screen and (max-width:1280px) and (max-height:720px) { footer { top:110px; } }
        @media screen and (max-width:1280px) and (max-height:640px) { footer { top:30px; } }
        */

        @media screen and (max-width:870px) { .rg { float:none; } }

        @media screen and (max-width:450px) { 
            .fm { width:80%; }
            section { width:250px;}
            @media screen and (max-height:697px) { footer {display:none;} }
        }
        
        
        @media screen and (min-width:1285px) { 
            @media screen and (max-height:875px) { footer { display:none; } }
        }
        

        
        @media screen and (min-height:900px) {
            @media screen and (max-width:612px) {
                @media screen and (max-height:905px) { footer { display:none; } }
            }
            @media screen and (max-width:450px) {
                @media screen and (max-height:975px) { footer { display:none; } }
            }
        }

        
        @media screen and (max-height:900px) and (max-width:1285px) {
                body { font-size:14px; }
                header { height: 60px; }
                .links_header { top:20px; }
                footer { height:150px; }
                section { top:10px; }
                .fm, .rg, .text_link, .to_login { font-size:12px; }
                h2 { font-size:18px; padding-top:20px; }
                table { padding-top:10px; white-space:nowrap; }
                th { font-size:12px; }
                
                @media screen and (max-height:620px) { footer { display:none; } }
                @media screen and (max-width:500px) and (max-height:660px) { footer { display:none; } }
                
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
                    {{ Form::open(['action' => 'TherapeutController@store', 'method' => 'POST']) }}
                        {{ Form::text('vorname', '', ['class' => 'fm', 'placeholder' => 'Vorname'])}}
                        {{ Form::text('nachname', '', ['class' => 'fm', 'placeholder' => 'Nachname'])}}
                        <br>
                        {{ Form::email('email', '', ['class' => 'fm', 'placeholder' => 'E-Mail'])}}
                        
                        <br>
                        {{ Form::text('sozNummer', '', ['class' => 'fm', 'placeholder' => 'Soz. Versicherungsnummer'])}}
                        <br>
                        {{ Form::password('password', ['class' => 'fm', 'placeholder' => 'Passwort'])}}
                        <br>
                        {{ Form::password('again', ['class' => 'fm', 'placeholder' => 'Passwort wiederholen'])}}

                        {{ Form::submit('Registrieren', ['class' => 'rg'])}}
                    {{ Form::close() }}
                </div>

                

                <p class="text_link">Ich habe bereits einen Account - <a class="to_login" href="/login">Login</a></p>
            </div>
        </section>

        <div class="msgs">          
            @include('include/messages')
        </div>

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