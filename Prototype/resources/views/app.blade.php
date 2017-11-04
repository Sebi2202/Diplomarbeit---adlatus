<!doctype html>
<html>
    <head>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <title>Appseite</title>
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
				background-color:green;
			}
			
			.disagree {
				position:relative;
				bottom:50px;
				background-color:red;
			}
        </style>
    </head>
    <body>
        <div>
            <h1>Appseite!</h1>
            <textarea disabled> </textarea>
			<button class="agree">Agree</button>
			<button class="disagree">Disagree</button> 
        </div>
    </body>
</html>