@extends('layout/layout')

@section('content')
@if(Auth::check())
    {!! Html::style('css/app.css') !!}
    {!! Html::style('vendor/calendar/fullcalendar/fullcalendar.min.css') !!}

<style>

    body { 
        margin:0px;
        font-family:Verdana;
        font-size:14px;
        
    }

    a {
        text-decoration:none;
        color:white;
        z-index:100;
    }

    .text { margin-left:5%; margin-right:5%; }

    .header-container {
        background-color: lightblue;
        width:100%;
        height:60px;
    }

    h2 { text-align:center; font-family:Verdana; }

    .fc-header-toolbar { text-align:center; font-family:Verdana; }
    .fc-day-number { color:darkblue; }

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

    .links_header:hover { text-decoration:none; color:white; }

    

    section { position:relative; top:50px; }

    #calendar {
        margin-left:15%; margin-right:15%; text-align:center;
    }

    .fc-day-number { pointer-events:none; cursor:default; text-decoration:none; }

    .fc-past { cursor:pointer; }

    footer {
        position:absolute;
        left:0;
        right:0;
        bottom:0;
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

    .table-head {
        height:40px;
        font-size:12px;
        text-align:left;
        padding-right:10px;
    }

    .fc-content {
        display:none;
    }

    .table-d { padding-right:10px; }

    /* @media - Responsive Design */
    @media screen and (min-width:1200px) and (max-height:950px) { footer { position:relative; top:97px; } }

    @media screen and (max-width:1200px) and (min-width:992px) and (max-height:847px)  { footer { position:relative; top:97px; } }
    @media screen and (max-width:991px) and (min-width:748px) and (max-height:733px)  { footer { position:relative; top:97px; } }
    @media screen and (max-width:747px) and (min-width:735px) and (max-height:731px)  { footer { position:relative; top:97px; } }
    @media screen and (max-width:734px) and (min-width:650px) and (max-height:725px)  { footer { position:relative; top:139px; } }
    @media screen and (max-width:649px) and (min-width:530px) and (max-height:630px)  { footer { position:relative; top:108px; } }
    @media screen and (max-width:530px) and (min-width:460px) and (max-height:620px)  { footer { position:relative; top:108px; } }
    @media screen and (max-width:459px) and (min-width:350px) and (max-height:565px)  { footer { position:relative; top:108px; } }
    
    /* Header Buttons */

    @media screen and (max-width:514px) { 
        .fc-left { width:100%; }
        .fc-button-group { position:relative; left:30%; }
        .fc-today-button { position:relative; left:30%; }
    }

    @media screen and (max-width:490px) { 
        .fc-left { width:100%; }
        .fc-button-group { position:relative; left:25%; }
        .fc-today-button { position:relative; left:25%; }
    }

    @media screen and (max-width:415px) { 
        .fc-left { width:100%; }
        .fc-button-group { position:relative; left:20%; }
        .fc-today-button { position:relative; left:20%; }
    }
    

</style>

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
        <div class="container">
            <div id="calendar">

            </div>
        </div>
    </section>

    <footer>
        <table class="footer-table">
            <tr class="table-row">
                <th class="table-head" >Kontakt</th>
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
    {!! Html::script('vendor/calendar/fullcalendar/locale/de-at.js') !!}

    <script>
        var BASEURL = "{{ url('/dashboard/patient/calendar') }}";
        var now = new Date();
        var id = "<?php echo $user->id; ?>"
        $(document).ready(function() {
        $('#calendar').fullCalendar({
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