@extends('layout/layout')

@section('content')
        <style type="text/css">
            div {
                text-align:center;
				font-family: 'Roboto', sans-serif;
            }
			
			.agree {
				bottom:50px;
				background-color:#4CAF50;
				border:none;
				color:white;
				padding:15px 32px;
				text-align:center;
				text-decoration:none;
				display:inline-block;
				font-size:16px;
				width:120px;
			}
			
			.disagree {
				bottom:50px;
				background-color:red;
				border:none;
				color:white;
				padding:15px 32px;
				text-align:center;
				text-decoration:none;
				display:inline-block;
				font-size:16px;
				width:auto;
			}
			
        </style>
    </head>
    <body>
        <div>
            <h1>Willkommen zur Appseite</h1>
			@if(count($tasks) > 0)
				@foreach($tasks as $task)
					<p>{{$task}} <button class="agree">Agree</button><button class="disagree">Disagree</button></p>
				@endforeach
			@endif
        </div>
@endsection