@extends('layout/layout')

@section('content')
@if(Auth::check())

<link rel="stylesheet" href="{{ URL::asset('css/create_task.css') }}" />    

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
        <p>{{$date}}</p>
        @if($errors->has('title'))
            <p style="color: red">Die Bezeichnung des Eintrages ist inkorrekt.</p>
        @endif

        @if($errors->has('date'))
            <p style="color: red">Die angegebene Uhrzeit ist inkorrekt.</p>
        @endif
        
        @if(count($er) > 0)
            <p style="color: red">{{$er}}</p>
        @endif
        <div class="content">
            <nav>
                <div onClick="dropDownNull()">
                    <div class="lab">00:00
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
                    <div class="lab-drop">00:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "00:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">00:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "00:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">00:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "00:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">00:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "00:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownOne()">
                    <div class="lab">01:00
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
                    <div class="lab-drop">01:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "01:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">01:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "01:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">01:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "01:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">01:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "01:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownTwo()">
                <div class="lab">02:00
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
                    <div class="lab-drop">02:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "02:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">02:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "02:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">02:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "02:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">02:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "02:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownThree()">
                <div class="lab">03:00
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
                    <div class="lab-drop">03:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "03:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">03:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "03:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">03:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "03:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">03:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "03:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownFour()">
                <div class="lab">04:00
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
                    <div class="lab-drop">04:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "04:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">04:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "04:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">04:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "04:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">04:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "04:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownFive()">
                <div class="lab">05:00
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
                    <div class="lab-drop">05:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "05:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">05:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "05:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">05:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "05:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">05:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "05:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownSix()">
                <div class="lab">06:00
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
                    <div class="lab-drop">06:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "06:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">06:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "06:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">06:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "06:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">06:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "06:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownSeven()">
                <div class="lab">07:00
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
                    <div class="lab-drop">07:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "07:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">07:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "07:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">07:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "07:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">07:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "07:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownEight()">
                <div class="lab">08:00
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
                    <div class="lab-drop">08:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "08:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">08:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "08:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">08:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "08:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">08:45
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "08:45:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                </div>

                <div onClick="dropDownNine()">
                <div class="lab">09:00
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
                    <div class="lab-drop">09:00
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "09:00:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">09:15
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "09:15:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">09:30
                    @foreach($tasks as $task)
                        @if($task->start == $date . " " . "09:30:00")
                            <a class="nav-img" href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="20px" height="20px"></a>
                        @endif
                    @endforeach
                    </div>
                    <div class="lab-drop">09:45
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
                <div class="lab" id="lab-last">23:00
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
                    <div class="lab-drop" style="border-bottom:1px solid lightgray;">23:45
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
                            <td class="section-td"><a onClick="custom()"><img class="section-img" src="/icons/custom.png" width="80px" height="80px"></a><label class="task-label">Benutzerdefiniert</label></td>
                        </tr>
                    </table>
                </div>

                <div class="popup" id="ter" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
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

                <div class="popup" id="custom" style="display:none">
                    {!! Form::open(['action' => ['TaskController@store', $user->id, $date], 'method' => 'POST']) !!}
                    <img src="/icons/custom.png" width="80px" height="80px"> <br>
                    <br>
                    <div class="custom">
                        Bezeichnung {{ Form::text('title', '', ['class' => 'fm-clock fm-custom', 'placeholder' => 'Bezeichnung der Aktivität'])}}
                    </div>
                    {{ Form::hidden('activitynr', '18') }}
                    {{ Form::hidden('link', '/icons/custom.png') }}
                    <div class="">
                        
                        Uhrzeit {{Form::text('date', '', ['class' => 'fm-clock fm-clock-custom', 'placeholder' => '15:30'])}}
                        Persönliche Nachricht (Optional)
                        {{ Form::text('message', '', ['class' => 'fm-clock fm-msg', 'placeholder' => ''])}}
                        <div class="popup-buttons">
                            {{ Form::submit('Speichern', ['class' => 'save']) }}
                        {!! Form::close() !!}
                            <a class="cancel" onClick="custom()">Abbrechen</a>
                        </div>
                    </div>
                </div>

                <script type="text/javascript" src="{{ URL::asset('js/create_task.js') }}"></script>
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
