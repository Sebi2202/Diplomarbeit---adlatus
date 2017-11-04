@extends('layout/layout')

@section('content')
        <style type="text/css">
            div {
                text-align:center;
				font-family: 'Roboto', sans-serif;
            }

            .field {
                padding: 20px;
                box-sizing: border-box;
            }

            .sbm {
				background-color:#aaa;
    			border:1px solid;
    			color:white;
    			padding:6px 12px;
    			text-align:center;
    			text-decoration: none;
    			display:inline-block;
    			font-size:14px;
				width:100px;
				margin-left:10px;
                border-radius:5px;
            }

        </style>
    </head>
    <body>
        <div>
            <h1>{{$title}}!</h1>
            <input type="text" class="field" size="40">
            <input type="submit" class="sbm" value="Submit!">
        </div>
@endsection