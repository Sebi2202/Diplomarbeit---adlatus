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
			}
			
			.delete {
				bottom:50px;
				background-color:red;
				border:none;
    			color:white;
    			padding:6px 12px;
    			text-align:center;
    			text-decoration:none;
    			display:inline-block;
    			font-size:14px;
				width:80.3px;
				margin-top: 0.5%;
			}

			#containers {
				border: 1px solid; 
				margin-top:0.2%; 
				width: 30%; 
				margin-left: 35%
			}
			
        </style>
    </head>
    <body>
		@include('include/messages')
        <div id="box">
            <h1>Willkommen zur Appseite</h1>
			@if(count($tasks) > 0)
				@foreach($tasks as $task)
					@if($task->confirmed != 1 && count($task->confirmed = 0) > 0)
						<div id="containers">
							<p>{{$task->body}}
							{!! Form::open(['action' => ['TasksController@update', $task->id], 'method' => 'POST']) !!}
                    			{{Form::submit('Agree', ['class' => 'agree'])}}
								{{Form::hidden('_method', 'PUT')}}
           					{!! Form::close() !!}

							{!! Form::open(['action' => ['TasksController@destroy', $task->id], 'method' => 'POST']) !!}
                    			{{Form::submit('Delete', ['class' => 'delete'])}}
								{{Form::hidden('_method', 'DELETE')}}
           					{!! Form::close() !!}
							</p>
						</div>
					<!-- <button class="agree">Agree</button><button class="disagree">Disagree</button>-->
						@else
							<div id="containers">
								<p style="font-size: 9pt">
									The Task with the id of {{$task->id}} is already closed
									{!! Form::open(['action' => ['TasksController@destroy', $task->id], 'method' => 'POST']) !!}
                    					{{Form::submit('Delete', ['class' => 'delete'])}}
										{{Form::hidden('_method', 'DELETE')}}
           							{!! Form::close() !!}
								</p>
							</div>
					@endif
				@endforeach
				@else
					<p>No Tasks found</p>
			@endif
        </div>
@endsection