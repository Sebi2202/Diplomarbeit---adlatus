@extends('layout/layout')

@section('content')
@if(Auth::check())

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
        text-decoration:none;
        color:white;
    }

    section {
        position:relative;
        border:1px solid;
        top:50px;
        margin-left:25%;
        margin-right:25%;
        padding-left:40px;
        padding-right:40px;
        height:270px;
        background-color:white;
    }

    .button-tagesplan {
        position:relative;
        top:100px;
        width:200px;
        float:left;
        text-align:center;
        font-family:Verdana;
        font-weight:bold;
        font-size:12px;
        color:white;
        text-decoration:none;

        padding-top:8px;
        padding-bottom:8px;
        margin-left:0px;

        background-color:lightgray;
        border:none;
        box-shadow: 3px 5px 5px gray;
    }

    .button-details {
        position:relative;
        top:100px;
        width:200px;
        float:right;
        text-align:center;
        font-family:Verdana;
        font-weight:bold;
        font-size:12px;
        color:white;
        text-decoration:none;

        padding-top:8px;
        padding-bottom:8px;

        background-color:lightgray;
        border:none;
        box-shadow: 3px 5px 5px gray;
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

    .footer-table {
        width:30%;
        font-size:12px;
        padding-top:10px;
        margin-left:15%;
        white-space:nowrap;
        color:white;
        
    }

    .table-head {
        height:40px;
        font-size:12px;
        text-align:left;
        padding-right:10px;
    }

    .table-d { padding-right:10px; }

    /* @media - Responsive Design */

    @media screen and (max-height:615px) { footer { position:relative; top:103px; } } 

    @media screen and (max-width:1000px) {
        .button-tagesplan { width:100%;}
        .button-details { width:100%; top:110px; }
    }

    @media screen and (max-width:650px) { section { margin-left:15%; margin-right:15%; } }

    @media screen and (max-width:400px) { section { padding-left:20px; padding-right:20px; } }

</style>

</head>
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
        <div class="div-tagesplan">
            <a href="/dashboard/patient/calendar/{{$user->id}}" class="button-tagesplan">Tagesplan</a>
        </div>

        <div class="div-details">
            <a href="/dashboard/patient/edit/{{$user->id}}" class="button-details">Kontobearbeitung</a>
        </div>
    </section>

    <footer>
        <table class="footer-table">
            <tr class="table-row">
                <th class="table-head" >Kontakt</th>
                <th class="table-head">Links</th>
            </tr>
            <tr class="table-row">
                <td class="table-d"><a href="http://www.project-adlatus.at" style="color:white; text-decoration:none;">www.project-adlatus.at</a></td>
                <td class="table-d"><a href="/" style="color:white;">Home</a></td>
            </tr>
            <tr class="table-row">
                <td class="table-d">Diplomarbeitsprojekt HTL3R</td>
                <td class="table-d"><a href="/registrierung" style="color:white; text-decoration:none;">Registrieren</a></td>
            </tr>
            <tr class="table-row">
                <td class="table-d"></td>
                <td class="table-d"><a href="/login" style="color:white; text-decoration:none;">Login</a></td>
            </tr>
            <tr class="table-row">
                <td class="table-d"></td>
                <td class="table-d"><a href="/help"style="color:white; text-decoration:none;">Hilfe</a></td>
            </tr>
        </table>
    </footer>
</body>

@endif
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection