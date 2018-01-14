@extends('layout/layout')

@section('content')
@if(Auth::check())
    <style>
        button {
            width: 100px;
            height:25px;
        }

        #really:not(:target) .sure { display: none; }

        #really:target .sure {
            display: block;
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
    <section>
        <div id="really">
                <div class="">
                    <a href="#really"><img src="/icons/medic.png"></a><label>Arzttermin</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Körperpflege</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Einkaufen</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Anrufe</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Trinken</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Blutdruckmessen</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Medikamente</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Blumen gießen</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Essen</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Wäsche waschen</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Bewegung</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Aufstehen</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Schlafenszeit</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Erholungszeit</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Haustiere versorgen</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Zähneputzen</label><br>
                    <a href="#really"><img src="/icons/medic.png"></a><label>Gedächtnistraining</label>
                </div>

                <div class="sure">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    
                    <h2><label id="label1">Test</label></h2>
                    {{ Form::hidden('title', 'Test')}}
                    {{ Form::hidden('activitynr', '5') }}
                    <div class="">
                            Uhrzeit {{Form::text('date', '', ['class' => '', 'placeholder' => '15:30:00'])}} <br>
                            Persönliche Nachricht (Optional) <br>
                            {{ Form::text('message', '', ['class' => 'fm', 'placeholder' => ''])}} <br>
                            {{ Form::submit('Speichern', ['class' => '']) }}
                        {!! Form::close() !!}
                        <a class="" href="#">Abbrechen</a>
                    </div>
                </div>
                
            </div>
    </section>
</body>

@endif
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection