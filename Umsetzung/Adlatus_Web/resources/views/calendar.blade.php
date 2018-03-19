@extends('layout/layout')

@section('content')
@if(Auth::check())
    {!! Html::style('css/app.css') !!}
    {!! Html::style('vendor/calendar/fullcalendar/fullcalendar.min.css') !!}

<link rel="stylesheet" href="{{ URL::asset('css/calendar.css') }}" />

</head>
<body>

    <header class="header-container">
        <img class="logo" src="/logo/adlatus_Logo.png">
        <div class="links">
            <a class="links_header" href="/dashboard">Dashboard |</a>
            <a class="links_header" href="/dashboard/create_patient">Konto erstellen |</a>
            <a class="links_header" href="/">Logout</a>
        </div>
    </header>

    <section>
        <div class="bg-white"></div>
        <div class="container">
        <p class="name">{{$user->vorname}} {{$user->nachname}}</p>
            <div id="calendar">
    

            </div>
        </div>
    </section>

    <footer>
        <table class="footer-table">
            <tr class="table-row">
                <th class="table-head">Kontakt</th>
                <th class="table-head">Links</th>
            </tr>
            <tr class="table-row">
                <td class="table-d"><a href="http://www.project-adlatus.at" style="color:white;">www.project-adlatus.at</a></td>
                <td class="table-d"><a href="/" style="color:white;">Home</a></td>
            </tr>
            <tr class="table-row">
                <td class="table-d">Diplomarbeitsprojekt HTL3R</td>
                <td class="table-d"><a href="/registrierung" style="color:white;">Registrieren</a></td>
            </tr>
            <tr class="table-row">
                <td class="table-d"></td>
                <td class="table-d"><a href="/login" style="color:white;">Login</a></td>
            </tr>
            <tr class="table-row">
                <td class="table-d"></td>
                <td class="table-d"><a href="/help"style="color:white;">Hilfe</a></td>
            </tr>
        </table>
    </footer>
</body>
    {!! Html::script('js/app.js') !!}
    {!! Html::script('vendor/calendar/fullcalendar/lib/jquery.min.js') !!}
    {!! Html::script('vendor/calendar/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('vendor/calendar/fullcalendar/fullcalendar.min.js') !!}
    {!! Html::script('vendor/calendar/fullcalendar/locale/de.js') !!}

    <script>
        var BASEURL = "{{ url('/dashboard/patient/calendar') }}";
        var now = new Date();
        var id = "<?php echo $user->id; ?>"
        $(document).ready(function() {
        $('#calendar').fullCalendar({
            dayNamesShort: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            selectHelper: true,
            
            select: function(start) {
                var date = $.fullCalendar.moment(start).format('YYYY-MM-DD');
                window.location.href = "/dashboard/patient/calendar/" + id + "/" + date;
            },

            events: BASEURL + '/tasks/' + id
            
            });

        });

        
            
    </script>

@endif
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection