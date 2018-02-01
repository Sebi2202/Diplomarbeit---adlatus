@extends('layout/layout')

@section('content')
@if(Auth::check())
    

    <style>
        body {
            margin:0;
            font-family:Verdana;
            font-size:14px;
            background-image: url("/background-image/BackgroundImage.jpg");
            background-repeat: no-repeat no-repeat;
            background-size:100% 100%;
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

        .all {
            position:relative;
            padding-top:10px;
            margin-left:20%;
            margin-right:20%;
            padding-left:5%;
            padding-right:5%;
            background-color:white;
        }

        .content {
            display:flex;
            flex-direction:row;
            justify-content:space-between;

        }

        section {
            background-color:#eee;
            padding-left:2%;
            padding-right:1%;
            padding-top:20px;
            padding-bottom:20px;
            border:1px solid lightgray;
        }

        .name {
            font-size:18px;
            font-family:Verdana;
        }

        .task-label {
            position:relative;
            bottom:33px;
            left:10px;
            font-size:14px;
        }

        button {
            width: 80px;
            height:25px;
        }

        #container {
            display:none;
        }

        .lab {
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            width:250px;
            height:25px;
            background-color:#eee;
            border:1px solid lightgrey;
            border-bottom-style:none;
            padding-left:10px;
            padding-top:5px;
            margin-right:10px;
        }

        .lab-icons {
            display:flex;
            flex-direction:row;
            justify-content:flex-end;
        }

        .lab-end {
            width:250px;
            height:30px;
            background-color:#eee;
            border:1px solid lightgrey;
            padding-left:10px;
        }

        .lab-drop {
            display:flex;
            flex-direction:row;
            justify-content:flex-start;
            padding-right:10px;
            padding-left:20px;
            padding-top:5px;
            width:230px;
            height:25px;
            background-color:#eee;
            border:1px solid lightgrey;
            border-bottom-style:none;
        }

        .arrow-right { position:relative; bottom:1px; }
        .arrow-down { position:relative; bottom:4px; right:8px; padding-left:15px;}
        .full-date-icon { padding-right:2px; }

        .nav-img { margin-left:auto;  }

        .section-td {
            padding-right:30px;
            width:248px;
        }

        .section-img { width:80px; height:80px }

        footer {
            position:relative;
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

        .popup {
            position:absolute;
            top:100px;
            border:1px solid;
            background-color:white;

            padding-left:5%;
            padding-right:5%;
            padding-top:20px;
            padding-bottom:20px;
            width:300px;
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


            width:60%;
        }

        .fm-msg {
            position:relative;
            top:5px;
            width:97%;
        }

        .popup-buttons {
            display:flex;
            flex-direction:row;
            justify-content:space-between;
        }

        .cancel {
            text-align:center;
            font-family:Verdana;
            font-weight:bold;
            font-size:12px;

            padding-top:8px;
            padding-bottom:8px;

            width:40%;
            background-color:red;
            border:none;
            box-shadow: 3px 5px 5px gray;
        }

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

            width:40%;
            background-color:#4C9900;
            border:none;
            box-shadow: 3px 5px 5px gray;
        }



        /* @media - Responsive Design */
        @media screen and (max-width:1625px) {.all {margin-left:15%; margin-right:15%;} }

        @media screen and (max-width:1354px) {.all {margin-left:10%; margin-right:10%;} }

        @media screen and (max-width:1161px) {.all {margin-left:5%; margin-right:5%;} }

        @media screen and (max-width:1016px) {
            .content {flex-direction:column; flex-wrap:wrap;}
            nav { margin-bottom:10px; margin-left:auto; margin-right:auto; }
            .lab { width:600px; }
            .lab-drop { width:590px; }
            .name, .date { text-align:center; }
            .section-table { margin-left:auto; margin-right:auto; }
            .section-td { padding-right:0px; }
            .popup {
                position: absolute;
                margin-left: auto;
                margin-right: auto;
                left: 0;
                right: 0;
                top:900px;
            }
        }

        @media screen and (max-width:616px) { .section-img { width:70px; height:70px; } }

        @media screen and (max-width:595px) { .section-img { width:60px; height:60px; } .task-label { bottom:23px; font-size:12px; } }

        @media screen and (max-width:768px) { .lab {width:400px;} .lab-drop {width:390px;} }

        @media screen and (max-width:515px) {
            .lab {width:300px;}
            .lab-drop {width:290px;}
            .section-img { width:50px; height:50px; }
            .task-label { font-size:11px; }
        }

        @media screen and (max-width:460px) { .popup {width:250px;} .section-img { width:40px; height:40px; } .task-label { bottom:15px; left: 5px; font-size:10px; } }

        @media screen and (max-width:395px) {
            .popup {top:850px; font-size:10px;}
            .section-img { width:30px; height:30px; }
            .task-label { bottom:12px; left:4px; font-size:10px; }
            .fm-clock { padding-bottom:0px; padding-top:0px; font-size:10px; }
            .save, .cancel { padding-top:4px; padding-bottom:4px; font-size:10px; }
        }


        @media screen and (max-width:390px) { .lab {width:250px;} .lab-drop {width:240px;} }

        @media screen and (max-width:375px) { .lab {width:286px;} .lab-drop {width:276px;} }

        @media screen and (max-width:360px) { .lab {width:274px;} .lab-drop {width:264px;} }


    </style>
</head>
<body>
    <header>
        <img class="logo" src="/logo/adlatus_Logo.png">
        <div class="links">
            <a class="links_header" href="/dashboard">Dashboard |</a>
            <a class="links_header" href="/dashboard/create_patient">Konto erstellen |</a>
            <a class="links_header" href="/dashboard/patient/calendar/{{$user->id}}">Zurück |</a>
            <a class="links_header" href="/">Logout</a>
        </div>
    </header>

    <div class="all">
        <?php
            $pieces = explode("/", URL::current());
            $date = $pieces[sizeof($pieces)-1];
        ?>
        <p class="name">{{$user->vorname}} {{$user->nachname}}</p>
        <?php
            $vars = explode("-", $date);
            echo "<p class='date'>".$vars[2] . " " . $vars[1] . " " . $vars[0]."</p>";
        ?>

        <div class="content">
            <nav>
                <div onClick="dropDownNull()">
                    <div class="lab">0:00
                        <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "00:00:00" || $task->start == $date . " " . "00:15:00" || $task->start == $date . " " . "00:30:00" || $task->start == $date . " " . "00:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                            <img class="arrow-right" id="right-null" src="/dropdown/right.png" width="30px;" height="22px;">
                            <img class="arrow-down" id="down-null" src="/dropdown/down.png" width="15px;" height="25px;">
                        </div>
                    </div>
                </div>
                <div id="null" style="display:none">
                    <div class="lab-drop">0:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "00:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">0:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "00:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">0:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "00:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">0:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "00:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownOne()">
                    <div class="lab">1:00
                        <div class="lab-icons">
                            @foreach($tasks as $task)
                                @if($task->start == $date . " " . "01:00:00" || $task->start == $date . " " . "01:15:00" || $task->start == $date . " " . "01:30:00" || $task->start == $date . " " . "01:45:00")
                                    <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                                @endif
                            @endforeach
                            <img class="arrow-right" id="right-one" src="/dropdown/right.png" width="30px;" height="22px;">
                            <img class="arrow-down" id="down-one" src="/dropdown/down.png" width="15px;" height="25px;">
                        </div>
                    </div>
                </div>
                <div id="one" style="display:none">
                    <div class="lab-drop">1:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "01:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">1:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "01:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">1:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "01:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">1:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "01:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownTwo()">
                <div class="lab">2:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "02:00:00" || $task->start == $date . " " . "02:15:00" || $task->start == $date . " " . "02:30:00" || $task->start == $date . " " . "02:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-two" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-two" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="two" style="display:none">
                    <div class="lab-drop">2:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "02:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">2:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "02:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">2:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "02:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">2:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "02:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownThree()">
                <div class="lab">3:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "03:00:00" || $task->start == $date . " " . "03:15:00" || $task->start == $date . " " . "03:30:00" || $task->start == $date . " " . "03:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-three" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-three" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="three" style="display:none">
                    <div class="lab-drop">3:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "03:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">3:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "03:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">3:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "03:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">3:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "03:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownFour()">
                <div class="lab">4:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "04:00:00" || $task->start == $date . " " . "04:15:00" || $task->start == $date . " " . "04:30:00" || $task->start == $date . " " . "04:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-four" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-four" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="four" style="display:none">
                    <div class="lab-drop">4:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "04:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">4:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "04:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">4:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "04:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">4:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "04:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownFive()">
                <div class="lab">5:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "05:00:00" || $task->start == $date . " " . "05:15:00" || $task->start == $date . " " . "05:30:00" || $task->start == $date . " " . "05:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-five" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-five" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="five" style="display:none">
                    <div class="lab-drop">5:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "05:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">5:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "05:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">5:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "05:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">5:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "05:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownSix()">
                <div class="lab">6:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "06:00:00" || $task->start == $date . " " . "06:15:00" || $task->start == $date . " " . "06:30:00" || $task->start == $date . " " . "06:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-six" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-six" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="six" style="display:none">
                    <div class="lab-drop">6:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "06:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">6:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "06:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">6:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "06:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">6:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "06:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownSeven()">
                <div class="lab">7:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "07:00:00" || $task->start == $date . " " . "07:15:00" || $task->start == $date . " " . "07:30:00" || $task->start == $date . " " . "07:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-seven" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-seven" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="seven" style="display:none">
                    <div class="lab-drop">7:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "07:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">7:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "07:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">7:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "07:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">7:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "07:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownEight()">
                <div class="lab">8:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "08:00:00" || $task->start == $date . " " . "08:15:00" || $task->start == $date . " " . "08:30:00" || $task->start == $date . " " . "08:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-eight" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-eight" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="eight" style="display:none">
                    <div class="lab-drop">8:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "08:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">8:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "08:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">8:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "08:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">8:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "08:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownNine()">
                <div class="lab">9:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "09:00:00" || $task->start == $date . " " . "09:15:00" || $task->start == $date . " " . "09:30:00" || $task->start == $date . " " . "09:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-nine" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-nine" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="nine" style="display:none">
                    <div class="lab-drop">9:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "09:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">9:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "09:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">9:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "09:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">9:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "09:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownTen()">
                <div class="lab">10:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "10:00:00" || $task->start == $date . " " . "10:15:00" || $task->start == $date . " " . "10:30:00" || $task->start == $date . " " . "10:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-ten" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-ten" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="ten" style="display:none">
                    <div class="lab-drop">10:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "10:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">10:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "10:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">10:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "10:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">10:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "10:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownEleven()">
                <div class="lab">11:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "11:00:00" || $task->start == $date . " " . "11:15:00" || $task->start == $date . " " . "11:30:00" || $task->start == $date . " " . "11:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-eleven" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-eleven" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="eleven" style="display:none">
                    <div class="lab-drop">11:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "11:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">11:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "11:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">11:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "11:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">11:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "11:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownTwelve()">
                <div class="lab">12:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "12:00:00" || $task->start == $date . " " . "12:15:00" || $task->start == $date . " " . "12:30:00" || $task->start == $date . " " . "12:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-twelve" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-twelve" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="twelve" style="display:none">
                    <div class="lab-drop">12:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "12:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">12:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "12:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">12:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "12:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">12:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "12:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownThirteen()">
                <div class="lab">13:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "13:00:00" || $task->start == $date . " " . "13:15:00" || $task->start == $date . " " . "13:30:00" || $task->start == $date . " " . "13:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-thirteen" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-thirteen" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="thirteen" style="display:none">
                    <div class="lab-drop">13:00
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "13:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                    </div>
                    <div class="lab-drop">13:15
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "13:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                    </div>
                    <div class="lab-drop">13:30
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "13:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                    </div>
                    <div class="lab-drop">13:45
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "13:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div onClick="dropDownFourteen()">
                <div class="lab">14:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "14:00:00" || $task->start == $date . " " . "14:15:00" || $task->start == $date . " " . "14:30:00" || $task->start == $date . " " . "14:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-fourteen" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-fourteen" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="fourteen" style="display:none">
                    <div class="lab-drop">14:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "14:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">14:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "14:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">14:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "14:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">14:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "14:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownFifteen()">
                <div class="lab">15:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "15:00:00" || $task->start == $date . " " . "15:15:00" || $task->start == $date . " " . "15:30:00" || $task->start == $date . " " . "15:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-fifteen" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-fifteen" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="fifteen" style="display:none">
                    <div class="lab-drop">15:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "15:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">15:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "15:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">15:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "15:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">15:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "15:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownSixteen()">
                <div class="lab">16:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "16:00:00" || $task->start == $date . " " . "16:15:00" || $task->start == $date . " " . "16:30:00" || $task->start == $date . " " . "16:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-sixteen" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-sixteen" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="sixteen" style="display:none">
                    <div class="lab-drop">16:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "16:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">16:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "16:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">16:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "16:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">16:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "16:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownSeventeen()">
                <div class="lab">17:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "17:00:00" || $task->start == $date . " " . "17:15:00" || $task->start == $date . " " . "17:30:00" || $task->start == $date . " " . "17:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-seventeen" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-seventeen" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="seventeen" style="display:none">
                    <div class="lab-drop">17:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "17:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">17:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "17:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">17:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "17:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">17:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "17:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownEighteen()">
                <div class="lab">18:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "18:00:00" || $task->start == $date . " " . "18:15:00" || $task->start == $date . " " . "18:30:00" || $task->start == $date . " " . "18:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-eighteen" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-eighteen" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="eighteen" style="display:none">
                    <div class="lab-drop">18:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "18:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">18:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "18:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">18:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "18:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">18:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "18:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownNineteen()">
                <div class="lab">19:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "19:00:00" || $task->start == $date . " " . "19:15:00" || $task->start == $date . " " . "19:30:00" || $task->start == $date . " " . "19:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-nineteen" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-nineteen" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="nineteen" style="display:none">
                    <div class="lab-drop">19:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "19:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">19:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "19:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">19:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "19:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">19:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "19:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownTwenty()">
                <div class="lab">20:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "20:00:00" || $task->start == $date . " " . "20:15:00" || $task->start == $date . " " . "20:30:00" || $task->start == $date . " " . "20:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-twenty" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-twenty" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="twenty" style="display:none">
                    <div class="lab-drop">20:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "20:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">20:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "20:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">20:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "20:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">20:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "20:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownTwentyOne()">
                <div class="lab">21:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "21:00:00" || $task->start == $date . " " . "21:15:00" || $task->start == $date . " " . "21:30:00" || $task->start == $date . " " . "21:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-twentyone" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-twentyone" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="twentyone" style="display:none">
                    <div class="lab-drop">21:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "21:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">21:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "21:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">21:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "21:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">21:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "21:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownTwentyTwo()">
                <div class="lab">22:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "22:00:00" || $task->start == $date . " " . "22:15:00" || $task->start == $date . " " . "22:30:00" || $task->start == $date . " " . "22:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-twentytwo" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-twentytwo" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="twentytwo" style="display:none">
                    <div class="lab-drop">22:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "22:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">22:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "22:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">22:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "22:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">22:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "22:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownTwentyThree()">
                <div class="lab">23:00
                    <div class="lab-icons">
                        @foreach($tasks as $task)
                            @if($task->start == $date . " " . "23:00:00" || $task->start == $date . " " . "23:15:00" || $task->start == $date . " " . "23:30:00" || $task->start == $date . " " . "23:45:00")
                                <a class="nav-img full-date-icon" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                            @endif
                        @endforeach
                        <img class="arrow-right" id="right-twentythree" src="/dropdown/right.png" width="30px;" height="22px;">
                        <img class="arrow-down" id="down-twentythree" src="/dropdown/down.png" width="15px;" height="25px;">
                    </div>
                </div>
                </div>
                <div id="twentythree" style="display:none">
                    <div class="lab-drop">23:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "23:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">23:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "23:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">23:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "23:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">23:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "23:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>
            </nav>

            <section>
                <div class="">
                    <table class="section-table">
                        <tr>
                            <td class="section-td"><a onClick="termin()"><img class="section-img" src="/icons/arzt.png" width="80px" height="80px"></a><label class="task-label">Arzttermin</label></td>
                            <td class="section-td"><a onClick="pflege()"><img class="section-img" src="/icons/waschen.png" width="80px" height="80px"></a><label class="task-label">Körperpflege</label></td>
                        </tr>
                        <tr>
                            <td class="section-td"><a onClick="einkaufen()"><img class="section-img" src="/icons/einkaufen.png" width="80px" height="80px"></a><label class="task-label">Einkaufen</label></td>
                            <td class="section-td"><a onClick="anruf()"><img class="section-img" src="/icons/anruf.png" width="80px" height="80px"></a><label class="task-label">Anrufe</label></td>
                        </tr>
                        <tr>
                            <td class="section-td"><a onClick="trinken()"><img class="section-img" src="/icons/trinken.png" width="80px" height="80px"></a><label class="task-label">Trinken</label></td>
                            <td class="section-td"><a onClick="blutdruck()"><img class="section-img" src="/icons/blutdruck.png" width="80px" height="80px"></a><label class="task-label">Blutdruckmessen</label></td>
                        </tr>
                        <tr>
                            <td class="section-td"><a onClick="medic()"><img class="section-img" src="/icons/medic.png" width="80px" height="80px"></a><label class="task-label">Medikamente</label></td>
                            <td class="section-td"><a onClick="blumen()"><img class="section-img" src="/icons/blumen.png" width="80px" height="80px"></a><label class="task-label">Blumen gießen</label></td>
                        </tr>
                        <tr>
                            <td class="section-td"><a onClick="essen()"><img class="section-img" src="/icons/essen.png" width="80px" height="80px"></a><label class="task-label">Essen</label></td>
                            <td class="section-td"><a onClick="waschen()"><img class="section-img" src="/icons/waesche_waschen.png" width="80px" height="80px"></a><label class="task-label">Wäsche waschen</label></td>
                        </tr>
                        <tr>
                            <td class="section-td"><a onClick="bewegen()"><img class="section-img" src="/icons/bewegung.png" width="80px" height="80px"></a><label class="task-label">Bewegung</label></td>
                            <td class="section-td"><a onClick="aufstehen()"><img class="section-img" src="/icons/wecker.png" width="80px" height="80px"></a><label class="task-label">Aufstehen</label></td>
                        </tr>
                        <tr>
                            <td class="section-td"><a onClick="schlafen()"><img class="section-img" src="/icons/schlafen.png" width="80px" height="80px"></a><label class="task-label">Schlafenszeit</label></td>
                            <td class="section-td"><a onClick="erholen()"><img class="section-img" src="/icons/entspannung.png" width="80px" height="80px"></a><label class="task-label">Erholungszeit</label></td>
                        </tr>
                        <tr>
                            <td class="section-td"><a onClick="animals()"><img class="section-img" src="/icons/haustier.png" width="80px" height="80px"></a><label class="task-label">Haustiere versorgen</label></td>
                            <td class="section-td"><a onClick="teeth()"><img class="section-img" src="/icons/zahn.png" width="80px" height="80px"></a><label class="task-label">Zähneputzen</label></td>
                        </tr>
                        <tr>
                            <td class="section-td"><a onClick="brain()"><img class="section-img" src="/icons/gedaechtnis.png" width="80px" height="80px"></a><label class="task-label">Gedächtnistraining</label></td>
                        </tr>
                    </table>
                </div>

                <div class="popup" id="ter" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/arzt.png" width="80px" height="80px">
                    <h2><label id="label1">Arzttermin</label></h2>
                    {{ Form::hidden('title', 'Arzttermin')}}
                    {{ Form::hidden('activitynr', '1') }}
                    {{ Form::hidden('link', '/icons/arzt.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="termin()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="pfl" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/waschen.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Körperpflege</label></h2>
                    {{ Form::hidden('title', 'Koerperpflege')}}
                    {{ Form::hidden('activitynr', '2') }}
                    {{ Form::hidden('link', '/icons/waschen.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="pflege()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="eink" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/einkaufen.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Einkaufen</label></h2>
                    {{ Form::hidden('title', 'Einkaufen')}}
                    {{ Form::hidden('activitynr', '3') }}
                    {{ Form::hidden('link', '/icons/einkaufen.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="einkaufen()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="anr" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/anruf.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Anrufe</label></h2>
                    {{ Form::hidden('title', 'Anrufe')}}
                    {{ Form::hidden('activitynr', '4') }}
                    {{ Form::hidden('link', '/icons/anruf.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="anruf()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="trin" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/trinken.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Trinken</label></h2>
                    {{ Form::hidden('title', 'Trinken')}}
                    {{ Form::hidden('activitynr', '5') }}
                    {{ Form::hidden('link', '/icons/trinken.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="trinken()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="blut" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/blutdruck.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Blutdruckmessen</label></h2>
                    {{ Form::hidden('title', 'Blutdruckmessen')}}
                    {{ Form::hidden('activitynr', '6') }}
                    {{ Form::hidden('link', '/icons/blutdruck.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="blutdruck()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="med" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/medic.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Medikamente</label></h2>
                    {{ Form::hidden('title', 'Medikamente')}}
                    {{ Form::hidden('activitynr', '7') }}
                    {{ Form::hidden('link', '/icons/medic.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="medic()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="blum" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/blumen.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Blumen gießen</label></h2>
                    {{ Form::hidden('title', 'Blumen gießen')}}
                    {{ Form::hidden('activitynr', '8') }}
                    {{ Form::hidden('link', '/icons/blumen.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="blumen()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="ess" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/essen.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Essen</label></h2>
                    {{ Form::hidden('title', 'Essen')}}
                    {{ Form::hidden('activitynr', '9') }}
                    {{ Form::hidden('link', '/icons/essen.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="essen()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="wasch" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/waesche_waschen.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Wäsche waschen</label></h2>
                    {{ Form::hidden('title', 'Waesche waschen')}}
                    {{ Form::hidden('activitynr', '10') }}
                    {{ Form::hidden('link', '/icons/waesche_waschen.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="waschen()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="bew" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/bewegung.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Bewegung</label></h2>
                    {{ Form::hidden('title', 'Bewegung')}}
                    {{ Form::hidden('activitynr', '11') }}
                    {{ Form::hidden('link', '/icons/bewegung.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="bewegen()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="auf" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/wecker.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Aufstehen</label></h2>
                    {{ Form::hidden('title', 'Aufstehen')}}
                    {{ Form::hidden('activitynr', '12') }}
                    {{ Form::hidden('link', '/icons/wecker.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="aufstehen()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="schlaf" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/schlafen.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Schlafenszeit</label></h2>
                    {{ Form::hidden('title', 'Schlafenszeit')}}
                    {{ Form::hidden('activitynr', '13') }}
                    {{ Form::hidden('link', '/icons/schlafen.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="schlafen()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="erh" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/entspannung.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Erholungszeit</label></h2>
                    {{ Form::hidden('title', 'Erholungszeit')}}
                    {{ Form::hidden('activitynr', '14') }}
                    {{ Form::hidden('link', '/icons/entspannung.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="erholen()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="ani" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/haustier.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Haustiere versorgen</label></h2>
                    {{ Form::hidden('title', 'Haustiere versorgen')}}
                    {{ Form::hidden('activitynr', '15') }}
                    {{ Form::hidden('link', '/icons/haustier.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="animals()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="tee" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/zahn.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Zähneputzen</label></h2>
                    {{ Form::hidden('title', 'Zaehneputzen')}}
                    {{ Form::hidden('activitynr', '16') }}
                    {{ Form::hidden('link', '/icons/zahn.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="teeth()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <div class="popup" id="brai" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <img src="/icons/gedaechtnis.png" width="80px" height="80px"> <br>
                    <h2><label id="label1">Gedächtnistraining</label></h2>
                    {{ Form::hidden('title', 'Gedaechtnistraining')}}
                    {{ Form::hidden('activitynr', '17') }}
                    {{ Form::hidden('link', '/icons/gedaechtnis.png') }}
                    <div class="">
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="brain()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <script>
                    function pflege() {
                        var x = document.getElementById("pfl");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function termin() {
                        var x = document.getElementById("ter");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function einkaufen() {
                        var x = document.getElementById("eink");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function anruf() {
                        var x = document.getElementById("anr");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function trinken() {
                        var x = document.getElementById("trin");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function blutdruck() {
                        var x = document.getElementById("blut");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function medic() {
                        var x = document.getElementById("med");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function blumen() {
                        var x = document.getElementById("blum");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function essen() {
                        var x = document.getElementById("ess");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function waschen() {
                        var x = document.getElementById("wasch");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function bewegen() {
                        var x = document.getElementById("bew");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function aufstehen() {
                        var x = document.getElementById("auf");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function schlafen() {
                        var x = document.getElementById("schlaf");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function erholen() {
                        var x = document.getElementById("erh");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function animals() {
                        var x = document.getElementById("ani");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function teeth() {
                        var x = document.getElementById("tee");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    function brain() {
                        var x = document.getElementById("brai");
                        if(x.style.display === "none") {
                            x.style.display = "block";
                        }
                        else {
                            x.style.display = "none";
                        }
                    }

                    document.getElementById("down-null").style.display = "none";
                    document.getElementById("down-one").style.display = "none";
                    document.getElementById("down-two").style.display = "none";
                    document.getElementById("down-three").style.display = "none";
                    document.getElementById("down-four").style.display = "none";
                    document.getElementById("down-five").style.display = "none";
                    document.getElementById("down-six").style.display = "none";
                    document.getElementById("down-seven").style.display = "none";
                    document.getElementById("down-eight").style.display = "none";
                    document.getElementById("down-nine").style.display = "none";
                    document.getElementById("down-ten").style.display = "none";
                    document.getElementById("down-eleven").style.display = "none";
                    document.getElementById("down-twelve").style.display = "none";
                    document.getElementById("down-thirteen").style.display = "none";
                    document.getElementById("down-fourteen").style.display = "none";
                    document.getElementById("down-fifteen").style.display = "none";
                    document.getElementById("down-sixteen").style.display = "none";
                    document.getElementById("down-seventeen").style.display = "none";
                    document.getElementById("down-eighteen").style.display = "none";
                    document.getElementById("down-nineteen").style.display = "none";
                    document.getElementById("down-twenty").style.display = "none";
                    document.getElementById("down-twentyone").style.display = "none";
                    document.getElementById("down-twentytwo").style.display = "none";
                    document.getElementById("down-twentythree").style.display = "none";

                    function dropDownNull() {
                        var x = document.getElementById("null");
                        if(x.style.display === "none") {
                            document.getElementById("right-null").style.display = "none";
                            document.getElementById("down-null").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-null").style.display = "block";
                            document.getElementById("down-null").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownOne() {
                        var x = document.getElementById("one");
                        if(x.style.display === "none") {
                            document.getElementById("right-one").style.display = "none";
                            document.getElementById("down-one").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-one").style.display = "block";
                            document.getElementById("down-one").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownTwo() {
                        var x = document.getElementById("two");
                        if(x.style.display === "none") {
                            document.getElementById("right-two").style.display = "none";
                            document.getElementById("down-two").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-two").style.display = "block";
                            document.getElementById("down-two").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownThree() {
                        var x = document.getElementById("three");
                        if(x.style.display === "none") {
                            document.getElementById("right-three").style.display = "none";
                            document.getElementById("down-three").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-three").style.display = "block";
                            document.getElementById("down-three").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownFour() {
                        var x = document.getElementById("four");
                        if(x.style.display === "none") {
                            document.getElementById("right-four").style.display = "none";
                            document.getElementById("down-four").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-four").style.display = "block";
                            document.getElementById("down-four").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownFive() {
                        var x = document.getElementById("five");
                        if(x.style.display === "none") {
                            document.getElementById("right-five").style.display = "none";
                            document.getElementById("down-five").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-five").style.display = "block";
                            document.getElementById("down-five").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownSix() {
                        var x = document.getElementById("six");
                        if(x.style.display === "none") {
                            document.getElementById("right-six").style.display = "none";
                            document.getElementById("down-six").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-six").style.display = "block";
                            document.getElementById("down-six").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownSeven() {
                        var x = document.getElementById("seven");
                        if(x.style.display === "none") {
                            document.getElementById("right-seven").style.display = "none";
                            document.getElementById("down-seven").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-seven").style.display = "block";
                            document.getElementById("down-seven").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownEight() {
                        var x = document.getElementById("eight");
                        if(x.style.display === "none") {
                            document.getElementById("right-eight").style.display = "none";
                            document.getElementById("down-eight").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-eight").style.display = "block";
                            document.getElementById("down-eight").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownNine() {
                        var x = document.getElementById("nine");
                        if(x.style.display === "none") {
                            document.getElementById("right-nine").style.display = "none";
                            document.getElementById("down-nine").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-nine").style.display = "block";
                            document.getElementById("down-nine").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownTen() {
                        var x = document.getElementById("ten");
                        if(x.style.display === "none") {
                            document.getElementById("right-ten").style.display = "none";
                            document.getElementById("down-ten").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-ten").style.display = "block";
                            document.getElementById("down-ten").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownEleven() {
                        var x = document.getElementById("eleven");
                        if(x.style.display === "none") {
                            document.getElementById("right-eleven").style.display = "none";
                            document.getElementById("down-eleven").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-eleven").style.display = "block";
                            document.getElementById("down-eleven").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownTwelve() {
                        var x = document.getElementById("twelve");
                        if(x.style.display === "none") {
                            document.getElementById("right-twelve").style.display = "none";
                            document.getElementById("down-twelve").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-twelve").style.display = "block";
                            document.getElementById("down-twelve").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownThirteen() {
                        var x = document.getElementById("thirteen");
                        if(x.style.display === "none") {
                            document.getElementById("right-thirteen").style.display = "none";
                            document.getElementById("down-thirteen").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-thirteen").style.display = "block";
                            document.getElementById("down-thirteen").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownFourteen() {
                        var x = document.getElementById("fourteen");
                        if(x.style.display === "none") {
                            document.getElementById("right-fourteen").style.display = "none";
                            document.getElementById("down-fourteen").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-fourteen").style.display = "block";
                            document.getElementById("down-fourteen").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownFifteen() {
                        var x = document.getElementById("fifteen");
                        if(x.style.display === "none") {
                            document.getElementById("right-fifteen").style.display = "none";
                            document.getElementById("down-fifteen").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-fifteen").style.display = "block";
                            document.getElementById("down-fifteen").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownSixteen() {
                        var x = document.getElementById("sixteen");
                        if(x.style.display === "none") {
                            document.getElementById("right-sixteen").style.display = "none";
                            document.getElementById("down-sixteen").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-sixteen").style.display = "block";
                            document.getElementById("down-sixteen").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownSeventeen() {
                        var x = document.getElementById("seventeen");
                        if(x.style.display === "none") {
                            document.getElementById("right-seventeen").style.display = "none";
                            document.getElementById("down-seventeen").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-seventeen").style.display = "block";
                            document.getElementById("down-seventeen").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownEighteen() {
                        var x = document.getElementById("eighteen");
                        if(x.style.display === "none") {
                            document.getElementById("right-eighteen").style.display = "none";
                            document.getElementById("down-eighteen").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-eighteen").style.display = "block";
                            document.getElementById("down-eighteen").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownNineteen() {
                        var x = document.getElementById("nineteen");
                        if(x.style.display === "none") {
                            document.getElementById("right-nineteen").style.display = "none";
                            document.getElementById("down-nineteen").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-nineteen").style.display = "block";
                            document.getElementById("down-nineteen").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownTwenty() {
                        var x = document.getElementById("twenty");
                        if(x.style.display === "none") {
                            document.getElementById("right-twenty").style.display = "none";
                            document.getElementById("down-twenty").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-twenty").style.display = "block";
                            document.getElementById("down-twenty").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownTwentyOne() {
                        var x = document.getElementById("twentyone");
                        if(x.style.display === "none") {
                            document.getElementById("right-twentyone").style.display = "none";
                            document.getElementById("down-twentyone").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-twentyone").style.display = "block";
                            document.getElementById("down-twentyone").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownTwentyTwo() {
                        var x = document.getElementById("twentytwo");
                        if(x.style.display === "none") {
                            document.getElementById("right-twentytwo").style.display = "none";
                            document.getElementById("down-twentytwo").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-twentytwo").style.display = "block";
                            document.getElementById("down-twentytwo").style.display = "none";
                            x.style.display = "none";
                        }
                    }

                    function dropDownTwentyThree() {
                        var x = document.getElementById("twentythree");
                        if(x.style.display === "none") {
                            document.getElementById("right-twentythree").style.display = "none";
                            document.getElementById("down-twentythree").style.display = "block";
                            x.style.display = "block";
                        }
                        else {
                            document.getElementById("right-twentythree").style.display = "block";
                            document.getElementById("down-twentythree").style.display = "none";
                            x.style.display = "none";
                        }
                    }
                </script>
            </section>
        </div>
    </div>

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
</body>

@endif
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection
