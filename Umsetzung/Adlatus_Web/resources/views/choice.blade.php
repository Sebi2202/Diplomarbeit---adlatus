@extends('layout/layout')

@section('content')
@if(Auth::check())

</head>
<body>
    <button><a href="/dashboard/patient/calendar/{{$user->id}}">zum tagesplan</a></button>

    <button><a href="/dashboard/patient/edit/{{$user->id}}">Informationen des Users</a></button>
</body>

@endif
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection