@extends('layouts.app')

@section('content')
@if(Auth::guest())
    <?php
        return redirect('/login');
    ?>
@endif
@if(Auth::check())
    </head>
    <body>
        <h2>You're logged in!</h2>
        <button><a href="/dashboard/create_patient">+</a></button>
@endif

@endsection
