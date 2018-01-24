@extends('layout/layout')

@section('content')
@if(Auth::check())
<style>

    body {
        margin:0;
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
        position:relative;
        top:30px;

        margin-left:25%;
        margin-right:25%;
        
        padding-left:5%;
        padding-right:5%;
        padding-top:20px;
        padding-bottom:30px;

        border:1px solid;
        background-color:white;
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

    .footer-th {
        height:40px;
        font-size:12px;
        text-align:left;
        padding-right:10px;
    }

    .footer-td { padding-right:10px; }

    .buttons { display:flex; flex-direction:row; justify-content:space-between;}

    .save {
        text-align:center;
        font-family:Verdana;
        font-weight:bold;
        font-size:12px;
        color:white;

        padding-top:8px;
        padding-bottom:8px;
        padding-left:20px;
        padding-right:20px;

        width:150px;
        background-color:#4C9900;
        border:none;
        box-shadow: 3px 5px 5px gray;
    }

    .delete { background-color:red; width:150px;}

    .cancel {
        text-align:center;
        font-family:Verdana;
        font-weight:bold;
        font-size:12px;

        padding-top:8px;
        padding-bottom:8px;
        padding-left:39px;
        padding-right:39px;

        background-color:#aaa;
        border:none;
        box-shadow: 3px 5px 5px gray;
    }

    .fm-clock {
        font-family:Verdana;
        font-size:12px;
        font-style:italic;

        padding-top:5px;
        padding-bottom:5px;
        padding-left:5px;

        margin-bottom:20px;
        margin-right:3%;
        margin
        
        width:60%;
    }

    .fm-msg {
        position:relative;
        top:5px;
        width:99%;
    }

    /* @media - Responsive Design */
    @media screen and (max-width:790px) { section { margin-left:15%; margin-right:15%; } }
    @media screen and (max-width:540px) { section { margin-left:10%; margin-right:10%; } }
    @media screen and (max-width:450px) { section { margin-left:5%; margin-right:5%; } }
    @media screen and (max-width:390px) { 
        .buttons { flex-direction:column; } 
        .save { margin-bottom:10px; width:100%; }
        .delete { width:100%; }
        .cancel { position:relative; bottom:10px; }
        .div-cancel { text-align:center; }

        @media screen and (max-height:740px) { footer { position:relative; top:64px; } }
    }

    @media screen and (max-height:690px) {
        footer { position:relative; top:65px;}
    }

    
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
        <?php
            $pieces = explode("/", URL::current());
            $date = $pieces[sizeof($pieces)-2];
            $t = explode(" ", $task->start);
            $t2 = explode(":", $t[1]);
            $time = $t2[0] . ":" . $t2[1];
        ?>
            <div id="update">
                {!! Form::open(['action' => ['TaskController@update', $user->id, $date, $task->id], 'method' => 'POST']) !!}
                <img src="{{$task->link}}" width="120px" height="120px"><br>
                <h2><label id="label1">{{$task->title}}</label></h2>
                {{ Form::hidden('title', $task->title) }}
                {{ Form::hidden('activitynr', $task->fk_activityid) }}
                {{ Form::hidden('link', $task->link) }}
                <div class="">
                    Uhrzeit {{Form::text('date', $time, ['class' => 'fm-clock', 'placeholder' => '15:30'])}} <br>
                    Persönliche Nachricht (Optional) <br>
                    {{ Form::text('message', $task->nachricht, ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}} <br>
                    <div class="buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                            {{Form::hidden('_method', 'PUT')}}
                        {!! Form::close() !!}
                        {!! Form::open(['action' => ['TaskController@destroy', $user->id, $date, $task->id], 'method' => 'POST']) !!}
                            {{ Form::submit('Löschen', ['class' => 'delete save']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                        {!! Form::close() !!}
                    </div>
                    <br>
                    <div class="div-cancel">
                        <a class="cancel" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}">Abbrechen</a>
                    </div>
                
                </div>
            </div>
        </section>
    
        <footer>
            <table class="footer-table">
                <tr>
                    <th class="footer-th">Kontakt</th>
                    <th class="footer-th">Links</th>
                </tr>
                <tr>
                    <td class="footer-td"><a href="http://www.project-adlatus.at">www.project-adlatus.at</a></td>
                    <td class="footer-td"><a href="/">Home</a></td>
                </tr>
                <tr>
                    <td class="footer-td">Diplomarbeitsprojekt HTL3R</td>
                    <td class="footer-td"><a href="/registrierung">Registrieren</a></td>
                </tr>
                <tr>
                    <td class="footer-td"></td>
                    <td class="footer-td"><a href="/login">Login</a></td>
                </tr>
                <tr>
                    <td class="footer-td"></td>
                    <td class="footer-td"><a href="/help">Hilfe</a></td>
                </tr>
            </table>
        </footer>

@endif
@if(Auth::guest())
<h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection