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