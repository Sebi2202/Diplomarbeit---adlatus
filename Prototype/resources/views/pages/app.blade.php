@extends('layout/layout')

@section('content')
        <style type="text/css">
            div {
                text-align:center;
				font-family: 'Roboto', sans-serif;
            }
			
			textarea {
				height:100px;
				width:300px;
				resize:none;
			}
			
			.agree {
				position:relative;
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
				position:relative;
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
            <h1>{{$title}}!</h1>
            <textarea disabled> </textarea>
			<button class="agree">Agree</button>
			<button class="disagree">Disagree</button> 
        </div>
@endsection