@extends('layout/layout')

@section('content')
        <style type="text/css">
            div {
                text-align:center;
				font-family: 'Roboto', sans-serif;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>{{$title}}!</h1>
            <input type="text" size="40" placeholder="Text eingeben!..">
            <input type="submit" value="Submit!">
        </div>
@endsection