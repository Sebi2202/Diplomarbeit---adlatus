@extends('layout/layout')

@section('content')
@if(Auth::check())
    
</head>
<body>
    Test test
</body>

@endif
@if(Auth::guest())
    <h3>Sie sind nicht eingeloggt! Klicken Sie <a href="/login" style="color: black;">hier</a> um sich einzuloggen</h3>
@endif
@endsection