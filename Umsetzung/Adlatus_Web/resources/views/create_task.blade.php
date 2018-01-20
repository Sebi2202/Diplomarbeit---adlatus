@extends('layout/layout')

@section('content')
@if(Auth::check())
    <style>
        button {
            width: 100px;
            height:25px;
        }

        #container {
            display:none;
        }      

        .lab {
            width:200px;
            height:20px;
            background-color:grey;
            margin:0;
            padding:0;
        }
    </style>
</head>
<body>
    <?php
       $pieces = explode("/", URL::current());
       $date = $pieces[sizeof($pieces)-1];
    ?>
    {{$user->vorname}} {{$user->nachname}}
    <br>
    <?php
        $vars = explode("-", $date);
        echo $vars[2] . " " . $vars[1] . " " . $vars[0];
    ?>
    <br>
    
    <nav>
        <div onClick="dropDownNull()">
           <div class="lab">0:00</div>
        </div>
        <div id="null" style="display:none">
            <div class="lab">0:00</div><br>
            <div class="lab">0:15</div><br>
            <div class="lab">0:30</div><br>
            <div class="lab">0:45</div><br>
        </div>

        <div onClick="dropDownOne()">
           <div class="lab">1:00</div>
        </div>
        <div id="one" style="display:none">
            <div class="lab">1:00</div><br>
            <div class="lab">1:15</div><br>
            <div class="lab">1:30</div><br>
            <div class="lab">1:45</div><br>
        </div>

        <div onClick="dropDownTwo()">
           <div class="lab">2:00</div>
        </div>
        <div id="two" style="display:none">
            <div class="lab">2:00</div><br>
            <div class="lab">2:15</div><br>
            <div class="lab">2:30</div><br>
            <div class="lab">2:45</div><br>
        </div>

        <div onClick="dropDownThree()">
           <div class="lab">3:00</div>
        </div>
        <div id="three" style="display:none">
            <div class="lab">3:00</div><br>
            <div class="lab">3:15</div><br>
            <div class="lab">3:30</div><br>
            <div class="lab">3:45</div><br>
        </div>

        <div onClick="dropDownFour()">
           <div class="lab">4:00</div>
        </div>
        <div id="four" style="display:none">
            <div class="lab">4:00</div><br>
            <div class="lab">4:15</div><br>
            <div class="lab">4:30</div><br>
            <div class="lab">4:45</div><br>
        </div>

        <div onClick="dropDownFive()">
           <div class="lab">5:00</div>
        </div>
        <div id="five" style="display:none">
            <div class="lab">5:00</div><br>
            <div class="lab">5:15</div><br>
            <div class="lab">5:30</div><br>
            <div class="lab">5:45</div><br>
        </div>

        <div onClick="dropDownSix()">
           <div class="lab">6:00</div>
        </div>
        <div id="six" style="display:none">
            <div class="lab">6:00</div><br>
            <div class="lab">6:15</div><br>
            <div class="lab">6:30</div><br>
            <div class="lab">6:45</div><br>
        </div>

        <div onClick="dropDownSeven()">
           <div class="lab">7:00</div>
        </div>
        <div id="seven" style="display:none">
            <div class="lab">7:00</div><br>
            <div class="lab">7:15</div><br>
            <div class="lab">7:30</div><br>
            <div class="lab">7:45</div><br>
        </div>

        <div onClick="dropDownEight()">
           <div class="lab">8:00</div>
        </div>
        <div id="eight" style="display:none">
            <div class="lab">8:00</div><br>
            <div class="lab">8:15</div><br>
            <div class="lab">8:30</div><br>
            <div class="lab">8:45</div><br>
        </div>

        <div onClick="dropDownNine()">
           <div class="lab">9:00</div>
        </div>
        <div id="nine" style="display:none">
            <div class="lab">9:00</div><br>
            <div class="lab">9:15</div><br>
            <div class="lab">9:30</div><br>
            <div class="lab">9:45</div><br>
        </div>

        <div onClick="dropDownTen()">
           <div class="lab">10:00</div>
        </div>
        <div id="ten" style="display:none">
            <div class="lab">10:00</div><br>
            <div class="lab">10:15</div><br>
            <div class="lab">10:30</div><br>
            <div class="lab">10:45</div><br>
        </div>

        <div onClick="dropDownEleven()">
           <div class="lab">11:00</div>
        </div>
        <div id="eleven" style="display:none">
            <div class="lab">11:00</div><br>
            <div class="lab">11:15</div><br>
            <div class="lab">11:30</div><br>
            <div class="lab">11:45</div><br>
        </div>

        <div onClick="dropDownTwelve()">
           <div class="lab">12:00</div>
        </div>
        <div id="twelve" style="display:none">
            <div class="lab">12:00</div><br>
            <div class="lab">12:15</div><br>
            <div class="lab">12:30</div><br>
            <div class="lab">12:45</div><br>
        </div>

        <div onClick="dropDownThirteen()">
           <div class="lab">13:00</div>
        </div>
        <div id="thirteen" style="display:none">
            <div class="lab">13:00 
                @foreach($tasks as $task) 
                    @if($task->start == $date . " " . "13:00:00") 
                    <a href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="30px" height="30px"></a> 
                    @endif
                @endforeach
            </div><br>
            <div class="lab">13:15 
                @foreach($tasks as $task) 
                    @if($task->start == $date . " " . "13:15:00") 
                    <a href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="30px" height="30px"></a> 
                    @endif
                @endforeach
            </div><br>
            <div class="lab">13:30 
                @foreach($tasks as $task) 
                    @if($task->start == $date . " " . "13:30:00") 
                    <a href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="30px" height="30px"></a> 
                    @endif
                @endforeach
            </div><br>
            <div class="lab">13:45 
                @foreach($tasks as $task) 
                    @if($task->start == $date . " " . "13:45:00") 
                    <a href="/dashboard/patient/calendar/{{$user->id}}/{{$date}}/{{$task->id}}"><img src="{{$task->link}}" width="30px" height="30px"></a> 
                    @endif
                @endforeach
            </div><br>
        </div>

        <div onClick="dropDownFourteen()">
           <div class="lab">14:00</div>
        </div>
        <div id="fourteen" style="display:none">
            <div class="lab">14:00</div><br>
            <div class="lab">14:15</div><br>
            <div class="lab">14:30</div><br>
            <div class="lab">14:45</div><br>
        </div>

        <div onClick="dropDownFifteen()">
           <div class="lab">15:00</div>
        </div>
        <div id="fifteen" style="display:none">
            <div class="lab">15:00</div><br>
            <div class="lab">15:15</div><br>
            <div class="lab">15:30</div><br>
            <div class="lab">15:45</div><br>
        </div>

        <div onClick="dropDownSixteen()">
           <div class="lab">16:00</div>
        </div>
        <div id="sixteen" style="display:none">
            <div class="lab">16:00</div><br>
            <div class="lab">16:15</div><br>
            <div class="lab">16:30</div><br>
            <div class="lab">16:45</div><br>
        </div>

        <div onClick="dropDownSeventeen()">
           <div class="lab">17:00</div>
        </div>
        <div id="seventeen" style="display:none">
            <div class="lab">17:00</div><br>
            <div class="lab">17:15</div><br>
            <div class="lab">17:30</div><br>
            <div class="lab">17:45</div><br>
        </div>

        <div onClick="dropDownEighteen()">
           <div class="lab">18:00</div>
        </div>
        <div id="eighteen" style="display:none">
            <div class="lab">18:00</div><br>
            <div class="lab">18:15</div><br>
            <div class="lab">18:30</div><br>
            <div class="lab">18:45</div><br>
        </div>

        <div onClick="dropDownNineteen()">
           <div class="lab">19:00</div>
        </div>
        <div id="nineteen" style="display:none">
            <div class="lab">19:00</div><br>
            <div class="lab">19:15</div><br>
            <div class="lab">19:30</div><br>
            <div class="lab">19:45</div><br>
        </div>

        <div onClick="dropDownTwenty()">
           <div class="lab">20:00</div>
        </div>
        <div id="twenty" style="display:none">
            <div class="lab">20:00</div><br>
            <div class="lab">20:15</div><br>
            <div class="lab">20:30</div><br>
            <div class="lab">20:45</div><br>
        </div>

        <div onClick="dropDownTwentyOne()">
           <div class="lab">21:00</div>
        </div>
        <div id="twentyone" style="display:none">
            <div class="lab">21:00</div><br>
            <div class="lab">21:15</div><br>
            <div class="lab">21:30</div><br>
            <div class="lab">21:45</div><br>
        </div>

        <div onClick="dropDownTwentyTwo()">
           <div class="lab">22:00</div>
        </div>
        <div id="twentytwo" style="display:none">
            <div class="lab">22:00</div><br>
            <div class="lab">22:15</div><br>
            <div class="lab">22:30</div><br>
            <div class="lab">22:45</div><br>
        </div>

        <div onClick="dropDownTwentyThree()">
           <div class="lab">23:00</div>
        </div>
        <div id="twentythree" style="display:none">
            <div class="lab">23:00</div><br>
            <div class="lab">23:15</div><br>
            <div class="lab">23:30</div><br>
            <div class="lab">23:45</div><br>
        </div>
    </nav>

    <section>
        <div class="">
            <a onClick="termin()"><img src="/icons/arzt.png" width="120px" height="120px"></a><label>Arzttermin</label><br>
            <a onClick="pflege()"><img src="/icons/waschen.png" width="120px" height="120px"></a><label>Körperpflege</label><br>
            <a onClick="einkaufen()"><img src="/icons/einkaufen.png" width="120px" height="120px"></a><label>Einkaufen</label><br>
            <a onClick="anruf()"><img src="/icons/anruf.png" width="120px" height="120px"></a><label>Anrufe</label><br>
            <a onClick="trinken()"><img src="/icons/trinken.png" width="120px" height="120px"></a><label>Trinken</label><br>
            <a onClick="blutdruck()"><img src="/icons/blutdruck.png" width="120px" height="120px"></a><label>Blutdruckmessen</label><br>
            <a onClick="medic()"><img src="/icons/medic.png" width="120px" height="120px"></a><label>Medikamente</label><br>
            <a onClick="blumen()"><img src="/icons/blumen.png" width="120px" height="120px"></a><label>Blumen gießen</label><br>
            <a onClick="essen()"><img src="/icons/essen.png" width="120px" height="120px"></a><label>Essen</label><br>
            <a onClick="waschen()"><img src="/icons/waesche_waschen.png" width="120px" height="120px"></a><label>Wäsche waschen</label><br>
            <a onClick="bewegen()"><img src="/icons/bewegung.png" width="120px" height="120px"></a><label>Bewegung</label><br>
            <a onClick="aufstehen()"><img src="/icons/wecker.png" width="120px" height="120px"></a><label>Aufstehen</label><br>
            <a onClick="schlafen()"><img src="/icons/schlafen.png" width="120px" height="120px"></a><label>Schlafenszeit</label><br>
            <a onClick="erholen()"><img src="/icons/entspannung.png" width="120px" height="120px"></a><label>Erholungszeit</label><br>
            <a onClick="animals()"><img src="/icons/haustier.png" width="120px" height="120px"></a><label>Haustiere versorgen</label><br>
            <a onClick="teeth()"><img src="/icons/zahn.png" width="120px" height="120px"></a><label>Zähneputzen</label><br>
            <a onClick="brain()"><img src="/icons/gedaechtnis.png" width="120px" height="120px"></a><label>Gedächtnistraining</label>
        </div>

        <div id="ter" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/arzt.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Arzttermin</label></h2>
            {{ Form::hidden('title', 'Arzttermin')}}
            {{ Form::hidden('activitynr', '1') }}
            {{ Form::hidden('link', '/icons/arzt.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="termin()">Abbrechen</a>
            </div>
        </div>

        <div id="pfl" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/waschen.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Körperpflege</label></h2>
            {{ Form::hidden('title', 'Körperpflege')}}
            {{ Form::hidden('activitynr', '2') }}
            {{ Form::hidden('link', '/icons/waschen.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="pflege()">Abbrechen</a>
            </div>
        </div>

        <div id="eink" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/einkaufen.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Einkaufen</label></h2>
            {{ Form::hidden('title', 'Einkaufen')}}
            {{ Form::hidden('activitynr', '3') }}
            {{ Form::hidden('link', '/icons/einkaufen.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="einkaufen()">Abbrechen</a>
            </div>
        </div>
                
        <div id="anr" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/anruf.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Anrufe</label></h2>
            {{ Form::hidden('title', 'Anrufe')}}
            {{ Form::hidden('activitynr', '4') }}
            {{ Form::hidden('link', '/icons/anruf.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="anruf()">Abbrechen</a>
            </div>
        </div>

        <div id="trin" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/trinken.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Trinken</label></h2>
            {{ Form::hidden('title', 'Trinken')}}
            {{ Form::hidden('activitynr', '5') }}
            {{ Form::hidden('link', '/icons/trinken.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="trinken()">Abbrechen</a>
            </div>
        </div>

        <div id="blut" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/blutdruck.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Blutdruckmessen</label></h2>
            {{ Form::hidden('title', 'Blutdruckmessen')}}
            {{ Form::hidden('activitynr', '6') }}
            {{ Form::hidden('link', '/icons/blutdruck.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="blutdruck()">Abbrechen</a>
            </div>
        </div>

        <div id="med" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/medic.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Medikamente</label></h2>
            {{ Form::hidden('title', 'Medikamente')}}
            {{ Form::hidden('activitynr', '7') }}
            {{ Form::hidden('link', '/icons/medic.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="medic()">Abbrechen</a>
            </div>
        </div>

        <div id="blum" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/blumen.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Blumen gießen</label></h2>
            {{ Form::hidden('title', 'Blumen gießen')}}
            {{ Form::hidden('activitynr', '8') }}
            {{ Form::hidden('link', '/icons/blumen.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="blumen()">Abbrechen</a>
            </div>
        </div>

        <div id="ess" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/essen.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Essen</label></h2>
            {{ Form::hidden('title', 'Essen')}}
            {{ Form::hidden('activitynr', '9') }}
            {{ Form::hidden('link', '/icons/essen.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="essen()">Abbrechen</a>
            </div>
        </div>

        <div id="wasch" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/waesche_waschen.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Wäsche waschen</label></h2>
            {{ Form::hidden('title', 'Wäsche waschen')}}
            {{ Form::hidden('activitynr', '10') }}
            {{ Form::hidden('link', '/icons/waesche_waschen.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="waschen()">Abbrechen</a>
            </div>
        </div>

        <div id="bew" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/bewegung.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Bewegung</label></h2>
            {{ Form::hidden('title', 'Bewegung')}}
            {{ Form::hidden('activitynr', '11') }}
            {{ Form::hidden('link', '/icons/bewegen.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="bewegen()">Abbrechen</a>
            </div>
        </div>

        <div id="auf" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/wecker.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Aufstehen</label></h2>
            {{ Form::hidden('title', 'Aufstehen')}}
            {{ Form::hidden('activitynr', '12') }}
            {{ Form::hidden('link', '/icons/wecker.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="aufstehen()">Abbrechen</a>
            </div>
        </div>

        <div id="schlaf" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/schlafen.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Schlafenszeit</label></h2>
            {{ Form::hidden('title', 'Schlafenszeit')}}
            {{ Form::hidden('activitynr', '13') }}
            {{ Form::hidden('link', '/icons/schlafen.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="schlafen()">Abbrechen</a>
            </div>
        </div>

        <div id="erh" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/entspannung.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Erholungszeit</label></h2>
            {{ Form::hidden('title', 'Erholungszeit')}}
            {{ Form::hidden('activitynr', '14') }}
            {{ Form::hidden('link', '/icons/entspannung.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="erholen()">Abbrechen</a>
            </div>
        </div>

        <div id="ani" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/haustier.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Haustiere versorgen</label></h2>
            {{ Form::hidden('title', 'Haustiere versorgen')}}
            {{ Form::hidden('activitynr', '15') }}
            {{ Form::hidden('link', '/icons/haustier.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="animals()">Abbrechen</a>
            </div>
        </div>

        <div id="tee" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/zahn.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Zähneputzen</label></h2>
            {{ Form::hidden('title', 'Zähneputzen')}}
            {{ Form::hidden('activitynr', '16') }}
            {{ Form::hidden('link', '/icons/zahn.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="teeth()">Abbrechen</a>
            </div>
        </div>

        <div id="brai" style="display:none">
            {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
            <img src="/icons/gedaechtnis.png" width="120px" height="120px"> <br>
            <h2><label id="label1">Gedächtnistraining</label></h2>
            {{ Form::hidden('title', 'Gedächtnistraining')}}
            {{ Form::hidden('activitynr', '17') }}
            {{ Form::hidden('link', '/icons/gedaechtnis.png') }}
            <div class="">
                Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30'])}} <br>
                Persönliche Nachricht (Optional) <br>
                {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                {{ Form::submit('Speichern', ['class' => '']) }}
            {!! Form::close() !!}
                <a class="" onClick="brain()">Abbrechen</a>
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

            function dropDownNull() {
                var x = document.getElementById("null");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownOne() {
                var x = document.getElementById("one");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownTwo() {
                var x = document.getElementById("two");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownThree() {
                var x = document.getElementById("three");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownFour() {
                var x = document.getElementById("four");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownFive() {
                var x = document.getElementById("five");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownSix() {
                var x = document.getElementById("six");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownSeven() {
                var x = document.getElementById("seven");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownEight() {
                var x = document.getElementById("eight");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownNine() {
                var x = document.getElementById("nine");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownTen() {
                var x = document.getElementById("ten");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownEleven() {
                var x = document.getElementById("eleven");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownTwelve() {
                var x = document.getElementById("twelve");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownThirteen() {
                var x = document.getElementById("thirteen");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownFourteen() {
                var x = document.getElementById("fourteen");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownFifteen() {
                var x = document.getElementById("fifteen");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownSixteen() {
                var x = document.getElementById("sixteen");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownSeventeen() {
                var x = document.getElementById("seventeen");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownEighteen() {
                var x = document.getElementById("eighteen");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownNineteen() {
                var x = document.getElementById("nineteen");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownTwenty() {
                var x = document.getElementById("twenty");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownTwentyOne() {
                var x = document.getElementById("twentyone");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownTwentyTwo() {
                var x = document.getElementById("twentytwo");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }

            function dropDownTwentyThree() {
                var x = document.getElementById("twentythree");
                if(x.style.display === "none") {
                    x.style.display = "block";
                }
                else {
                    x.style.display = "none";
                }
            }
        </script>
    </section>
</body>

@endif
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection