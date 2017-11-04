@extends('layout/layout')

@section('content')
        <style type="text/css">
            #box {
                text-align:center;
				font-family: 'Roboto', sans-serif;
            }
			
			.agree {
				bottom:50px;
				background-color: #4CAF50;
    			border:none;
    			color:white;
    			padding:6px 12px;
    			text-align:center;
    			text-decoration: none;
    			display:inline-block;
    			font-size:14px;
				width:80.3px;
				margin-left:10px;
			}
			
			.disagree {
				bottom:50px;
				background-color:red;
				border:none;
    			color:white;
    			padding:6px 12px;
    			text-align:center;
    			text-decoration:none;
    			display:inline-block;
    			font-size:14px;
				width:auto;
				margin-left:10px;
			}
			
        </style>
    </head>
    <body>
        <div id="box">
            <h1>Willkommen zur Appseite</h1>
			@if(count($tasks) > 0)
				@foreach($tasks as $task)
					<p>{{$task}} <button class="agree">Agree</button><button class="disagree">Disagree</button></p>
				@endforeach
			@endif
        </div>
@endsection