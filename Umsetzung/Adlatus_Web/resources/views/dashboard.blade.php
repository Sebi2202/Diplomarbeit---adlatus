@extends('layouts.app')

@section('content')
@if(Auth::guest())
    <?php
        return redirect('/login');
    ?>
@endif
@if(Auth::check())
    </head>
    <style>
        body {
            margin:0px;
            font-family:Verdana;
            font-size:14px;
            background-image: url("/background-image/BackgroundImage.jpg");
            background-repeat: no-repeat;
            background-size:100%;
        }

        a {
            text-decoration:none;
            color:white;
            z-index:100;
        }

        .text { margin-left:5%; margin-right:5%; }

        header {
            background-color: lightblue;
            width:100%;
            height:60px;
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
            margin-left:15%;
            margin-right:15%;

            height:450px;
            padding-top:10px;

            background-color:white;
        }

        h2 {
            padding-left:40px;
            padding-top:20px;
            padding-bottom:10px;
            font-size:18px;
            font-weight:normal;
        }

        .konten {
            display:flex;
            flex-direction:row;
            flex-wrap:wrap;

        }

        .konto {
            padding-right:25px;
            padding-left:25px;
            width:150px;
            height:150px;
            text-align:center;
        }

        .plus {
            position:absolute;
            top:440px;
            right:18%;

            background-color:orange;
            text-align:center;
            font-family:Verdana;
            font-weight:bold;
            font-size:25px;

            padding-top:8px;
            padding-bottom:8px;
            width:50px;
            border-radius:50px;
            border:none;
            box-shadow: 3px 5px 5px gray;
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
            padding-right:10px;
        }

        td { padding-right:10px; }

        /* @media - Responsive Design */
        @media screen and (min-width:1432px) and (max-height:661px) { footer { position:relative; } }

        @media screen and (max-width:1431px) {
            section { height:600px; }
            .plus { top:590px; }
            @media screen and (max-height:811px) { footer { position:relative; } }
        }

        @media screen and (max-width:1145px) {
            section { height:750px; }
            .plus { top:740px; }
            @media screen and (max-height:961px) { footer { position:relative; } }
        }

        @media screen and (max-width:859px) {
            section { height:900px; }
            .plus { top:890px; }
            @media screen and (max-height:1111px) { footer { position:relative; } }
        }

        @media screen and (max-width:574px) {
            section { height:1500px; }
            .plus { top:1490px; }
            @media screen and (max-height:1712px) { footer { position:relative; } }
        }

        @media screen and (max-width:350px) { section { width:230px; } }

        .patient {
            text-align:center;
            font-family:Verdana;
            font-weight:bold;
            font-size:12px;

            padding-left:10px;
            padding-right:10px;
            padding-top:8px;
            padding-bottom:8px;

            width:40%;
            background-color:lightgray;
            border:none;
        }

    </style>
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
            <h2>Kontenverwaltung</h2>
            <div class="konten">
                @foreach($users as $user)
                    @if($user->therapeut_sozNr == Auth::user()->sozNr)
                        <div class="konto">
                            <a href="/dashboard/patient/{{$user->id}}">    
                                <img src="/user/profile.png" width="100px;" href="/dashboard/patient/{{$user->id}}" >
                            </a><br>
                            <p>{{$user->vorname}} {{$user->nachname}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="plus" href="/dashboard/create_patient">+</a>
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
@endif

@endsection
