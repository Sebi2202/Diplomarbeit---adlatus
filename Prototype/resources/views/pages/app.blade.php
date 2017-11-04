@extends('layout/layout')

@section('content')
        <style type="text/css">
            div {
                text-align:center;
				font-family: 'Roboto', sans-serif;
            }
			
			.agree {
				bottom:50px;
				background-color:lightgreen;
			}
			
			.disagree {
				bottom:50px;
				background-color:red;
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