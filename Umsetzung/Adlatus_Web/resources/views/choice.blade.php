@extends('layout/layout')

@section('content')
@if(Auth::check())

<link rel="stylesheet" href="{{ URL::asset('css/choice.css') }}" />

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
