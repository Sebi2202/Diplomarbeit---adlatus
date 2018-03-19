@extends('layouts.app')

@section('content')
@if(Auth::guest())
    <?php
        return redirect('/login');
    ?>
@endif
@if(Auth::check())
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}" />

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
            <h2>Kontenverwaltung</h2>
            <div class="betreuer">
                <div class="konto">
                    <a href="/dashboard/patient/{{$auth->id}}">    
                        <img src="/user/profile.png" width="100px;" href="/dashboard/patient/{{$auth->id}}" >
                    </a><br>
                    <p class="therapeut">{{$auth->vorname}} {{$auth->nachname}}</p>
                </div>
            </div>
            <hr class="strich">
            <br>
            <div class="konten">
                @foreach($users as $user)
                    @if($user->therapeut_sozNr == Auth::user()->sozNr && $user->sozNr != Auth::user()->sozNr)
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
