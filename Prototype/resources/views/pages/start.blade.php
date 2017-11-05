@extends('layout/layout')

@section('content')
        <style type="text/css">
            div {
                text-align:center;
				font-family: 'Roboto', sans-serif;
            }

            .field {
                padding: 6px;
                box-sizing: border-box;
            }

            .sbm {
				background-color:#aaa;
    			border:1px solid;
    			color:white;
    			padding:5px 10px;
    			text-align:center;
    			text-decoration: none;
    			display:inline-block;
    			font-size:13px;
				width:90px;
				margin-left:10px;
                border-radius:5px;
            }

        </style>
    </head>
    <body>
        @include('include/messages')
        <div>
            <h1>Willkommen zur Startseite!</h1>
            
            {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
                <div>
                    {{Form::text('body', '', ['class' => 'field', 'placeholder' => 'Titel eingeben'])}}
                    {{Form::submit('Submit', ['class' => 'sbm'])}}
                </div>
            {!! Form::close() !!}
        </div>
        
@endsection