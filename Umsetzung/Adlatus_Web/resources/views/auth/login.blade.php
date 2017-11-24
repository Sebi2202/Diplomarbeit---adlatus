@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<style>
body {
    margin:0px;
    font-family:Verdana;
    font-size:14px;
    /* Hintergrund-Bild */
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
    margin-left:15%;
    margin-right:15%;
    white-space:nowrap;
}

.links_header {
    position:relative;
    top:20px;
    font-weight:bold;
    color:white;
}

.panel {
    position:relative;
    top:50px;
    border:1px solid;
    margin-left:15%;
    margin-right:15%;
    padding-left:40px;
}

h2 {
    padding-top:20px;
    font-size:18px;
    font-weight:normal;
}

.text_link {
    position:relative;
    left:1px;
    font-style:italic;
    font-size:12px;
    padding-bottom:50px;
}

.to_login {
    font-style:italic;
    font-size:12px;
    text-decoration:none;
    color:lightblue;
}

.fm {
    font-family:Verdana;
    font-size:12px;
    font-style:italic;

    padding-top:5px;
    padding-bottom:5px;
    padding-left:5px;

    margin-bottom:20px;
    margin-right:3%;
    
    border:1px solid;
    box-shadow:1px 1px 1px gray;
    width:40%;
}

.rg {
    font-family:Verdana;
    font-weight:bold;
    font-size:12px;

    padding-top:8px;
    padding-bottom:8px;
    padding-right:20px;
    padding-left:20px;

    float:right;
    margin-right:15%;

    color:white;
    background-color:lightgray;
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

.text_link {
    font-style:italic;
    font-size:12px;
    padding-bottom:20px;
}

.forgot_reg {
    font-style:italic;
    font-size:12px;
    text-decoration:none;
    color:lightblue;
}

@media screen and (max-height:580px) { footer { position:relative; top:100px; } }
@media screen and (max-width:770px) and (max-height:640px) { footer { position:relative; top:100px; } }
@media screen and (max-width:508px) {
    section { width:210px; }
}

@media screen and (max-width:960px) {.fm {width:80%;} .lg { float:left; } .last_text { float:left; } section { height:320px; } }

</style>
</head>
<body>
    @if(Auth::guest())
    <header>
        <img class="logo" src="../imgs/logo.png">
        <div class="links">
            <a class="links_header" href="/">Home |</a>
            <a class="links_header" href="/register">Registrierung |</a>
            <a class="links_header" href="/help">Hilfe</a>
        </div>
    </header>
    <section class="panel">
        <h2>Login</h2>
        <div>
            {!! Form::open(['action' => 'Auth\LoginController@login', 'method' => 'POST']) !!}
                {{Form::token()}}
                {{ Form::text('sozNummer', '', ['class' => 'fm', 'placeholder' => 'Soz. Versicherungsnummer'])}}
                <br>
                {{Form::password('password', ['class' => 'fm', 'placeholder' => 'Passwort'])}}
                <br>
                {{Form::submit('Submit', ['class' => 'rg'])}}
            {!! Form::close() !!}
        </div>
        <div class="last_text">
                <p class="text_link">Ich habe noch keinen Account - <a class="forgot_reg" href="/register">Registrierung</a><br><br>
                <a class="forgot_reg" href="/forgot_password">Passwort vergessen?</a></p>
        </div>
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
    @if(Auth::check())
    <?php
        Auth::logout();
        header("Refresh:0");
    ?>
    @endif
=======
@if(Auth::guest()) 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    {!! Form::open(['action' => 'Auth\LoginController@login', 'method' => 'POST']) !!}
                        {{Form::token()}}
                        {{ Form::text('sozNummer', '', ['class' => '', 'placeholder' => 'Soz. Versicherungsnummer'])}}
                        <br>
                        {{Form::password('password', ['class' => '', 'placeholder' => 'Passwort'])}}
                        <br>
                    	{{Form::submit('Submit', ['class' => ''])}}
           			{!! Form::close() !!}
                    <!--
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
@endif
>>>>>>> 50d345d0e2e91a70a0e137b5b40d4ff0e1108f16
@endsection
