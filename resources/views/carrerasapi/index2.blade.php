<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<title>Carreras UTH</title>
</head>
<body>
	<div class="container">
		<h1>Carreras</h1>
		@foreach ($carreras as $carrera)
			<div class="panel panel-default">
			<div class="panel-body">
				<a href="/carreras/{{ $carrera->id }}">
				{{ $carrera->nombre }}
				</a>
			</div>
		</div>
		@endforeach
	</div>
</body>
</html>