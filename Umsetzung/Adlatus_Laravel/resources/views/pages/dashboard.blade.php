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
    </style>

    <title>Login</title>
    
    </head>
    <body>
        <header>
            <img class="logo" src="../imgs/logo.png">
            <div class="links">
                <a class="links_header" href="/">Home |</a>
                <a class="links_header" href="">Kontenverwaltung |</a>
                <a class="links_header" href="">Kontenbearbeitung |</a>
                <a class="links_header" href="/help">Hilfe</a>
            </div>
        </header>

        <h1>You are now logged in!</h1>



        <footer>
            <table>
                <tr>
                    <th>Kontakt</th>
                </tr>
                <tr>
                    <td><a href="http://www.project-adlatus.at">www.project-adlatus.at</a></td>
                </tr>
                <tr>
                    <td>Diplomarbeitsprojekt HTL3R</td>
                </tr>
            </table>
        </footer>
@endsection