<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyCsm - @yield('title')</title>

	{{-- bootstrap --}}
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	{{-- estilos propios --}}
	<link rel="stylesheet" href="{{ url('/static/css/connect.css?v='.time()) }}">

	{{-- jquery --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

	{{-- iconos de fontAwesone --}}
	<script src="https://kit.fontawesome.com/b530223926.js" crossorigin="anonymous"></script>
</head>
<body>

	@section('content')
	@show
</body>
</html>