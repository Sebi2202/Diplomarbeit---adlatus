@extends('layout/layout')

@section('container')
    </head>
    <body>
		@include('include/messages')
        @if(count($tasks) > 0)
				@foreach($tasks as $task)
					<p>{{$task}}
				@endforeach
				@else
					<p>No Posts found</p>
			@endif
@endsection