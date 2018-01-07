@extends('layout/layout')

@section('content')
@if(Auth::check())
    {!! Html::style('css/app.css') !!}
    {!! Html::style('vendor/calendar/fullcalendar/fullcalendar.min.css') !!}
</head>
<body>
    <div class="container">
        
        {!! Form::open(['action' => 'PatientController@store', 'method' => 'POST']) !!}
        <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>HALLO</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal">Abbrechen</button>
                        {!! Form::submit('Done', ['class' => '']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    
        <div id="calendar">

        </div>
    </div>
</body>
    {!! Html::script('js/app.js') !!}
    {!! Html::script('vendor/calendar/fullcalendar/lib/jquery.min.js') !!}
    {!! Html::script('vendor/calendar/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('vendor/calendar/fullcalendar/fullcalendar.min.js') !!}

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

            events: BASEURL + '/tasks/{id}'
            });

        });
            
    </script>

@endif
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection