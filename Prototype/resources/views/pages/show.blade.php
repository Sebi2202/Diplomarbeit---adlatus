@extends('layout/layout')

@section('container')
    </head>
    <body>
        @if(count($tasks) > 0)
				@foreach($tasks as $task)
					<p>{{$task}}
				@endforeach
				@else
					<p>No Posts found</p>
			@endif
@endsection