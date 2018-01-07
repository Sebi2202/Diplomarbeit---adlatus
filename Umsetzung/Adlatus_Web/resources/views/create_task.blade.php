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
                    <form action="#" method="post">
                    <a href="#really" class="" name="activity" value="Arzttermin">Insert Logo</a><label>Arzttermin</label><br>
                    <a href="#really" class="" name="activity" value="Körperpflege">Insert Logo</a><label>Körperpflege</label><br>
                    <a href="#really" class="" name="activity" value="Einkaufen">Insert Logo</a><label>Einkaufen</label><br>
                    <a href="#really" class="" name="activity" value="Anrufe">Insert Logo</a><label>Anrufe</label><br>
                    <a href="#really" class="" name="activity" value="Trinken">Insert Logo</a><label>Trinken</label><br>
                    <a href="#really" class="" name="activity" value="Blutdruckmessen">Insert Logo</a><label>Blutdruckmessen</label><br>
                    <a href="#really" class="" name="activity" value="Medikamente">Insert Logo</a><label>Medikamente</label><br>
                    <a href="#really" class="" name="activity" value="Blumen gießen">Insert Logo</a><label>Blumen gießen</label><br>
                    <a href="#really" class="" name="activity" value="Essen">Insert Logo</a><label>Essen</label><br>
                    <a href="#really" class="" name="activity" value="Wäsche waschen">Insert Logo</a><label>Wäsche waschen</label><br>
                    <a href="#really" class="" name="activity" value="Bewegung">Insert Logo</a><label>Bewegung</label><br>
                    <a href="#really" class="" name="activity" value="Aufstehen">Insert Logo</a><label>Aufstehen</label><br>
                    <a href="#really" class="" name="activity" value="Schlafenszeit">Insert Logo</a><label>Schlafenszeit</label><br>
                    <a href="#really" class="" name="activity" value="Erholungszeit">Insert Logo</a><label>Erholungszeit</label><br>
                    <a href="#really" class="" name="activity" value="Haustiere versorgen">Insert Logo</a><label>Haustiere versorgen</label><br>
                    <a href="#really" class="" name="activity" value="Zähneputzen">Insert Logo</a><label>Zähneputzen</label><br>
                    <a href="#really" class="" name="activity" value="Gedächtnistraining">Insert Logo</a><label>Gedächtnistraining</label>
                    </form>
                </div>
                <div class="sure">
                    {!! Form::open(['action' => ['TaskController@store', $user->id], 'method' => 'POST']) !!}
                    <?php 
                        if(isset($_POST['activity'])) {
                            echo $_POST['activity'];
                        }
                    ?>
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