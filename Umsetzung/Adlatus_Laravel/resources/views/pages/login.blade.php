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
            text-decoration:none;
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
                    <td>www.project-adlatus.at</td>
                    <td>Registrieren</td>
                </tr>
                <tr>
                    <td>Diplomarbeitsprojekt HTL3R</td>
                    <td>Login</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Hilfe</td>
                </tr>

            </table>
        </footer>
@endsection

