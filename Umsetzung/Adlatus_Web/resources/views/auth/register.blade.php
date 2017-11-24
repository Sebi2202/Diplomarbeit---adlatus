@extends('layouts.app')

@section('content')
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

    /* @media - Responsive Design */

    @media screen and (max-height:720px) { footer { position:relative; top:113px; } }
    @media screen and (max-height:775px) and (max-width:870px) { footer { position:relative; top:136px; } }
    @media screen and (max-width:450px) { 
        .fm { width:80%; }
        .panel { width:250px;}

        @media screen and (max-height:775px) { footer { position:relative; top:85px; } }
    }
    @media screen and (max-width:870px) { .rg { float:none; } }
    
    

</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <header>
                <img class="logo" src="../imgs/logo.png">
                <div class="links">
                    <a class="links_header" href="/">Home |</a>
                    <a class="links_header" href="/login">Login |</a>
                    <a class="links_header" href="/help">Hilfe</a>
                </div>
            </header>

            <div class="panel panel-default">
                <h2>Register</h2>

                <div class="panel-body">
                {!! Form::open(['action' => 'Auth\RegisterController@register', 'method' => 'POST']) !!}
                    {{ Form::text('vorname', '', ['class' => 'fm', 'placeholder' => 'Vorname'])}}
                    {{ Form::text('nachname', '', ['class' => 'fm', 'placeholder' => 'Nachname'])}}
                    <br>
                    {{ Form::email('email', '', ['class' => 'fm', 'placeholder' => 'E-Mail'])}}
                    <br>
                    {{ Form::text('sozNummer', '', ['class' => 'fm', 'placeholder' => 'Soz. Versicherungsnummer'])}}
                    <br>
                    {{ Form::password('password', ['class' => 'fm', 'placeholder' => 'Passwort'])}}
                    <br>
                    {{ Form::password('again', ['class' => 'fm', 'placeholder' => 'Passwort wiederholen'])}}
                    <br>
                	{{Form::submit('Registrieren', ['class' => 'rg'])}}
           		{!! Form::close() !!}

                <p class="text_link">Ich habe bereits einen Account - <a class="to_login" href="/login">Login</a></p>

                <!--
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    -->
                </div>
            </div>
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

        </div>
    </div>
</div>
@endsection
