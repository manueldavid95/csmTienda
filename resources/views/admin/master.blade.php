<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') - {{ Config::get('madecms.name') }}</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="routeName" content="{{ Route::currentRouteName() }}">

	{{-- iconos de fontAwesone --}}
	<script src="https://kit.fontawesome.com/b530223926.js" crossorigin="anonymous"></script>

	{{-- Google Fonts --}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

	{{-- bootstrap 5 --}}
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	{{-- estilos para la galeria de imagenes --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

	{{-- jquery --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> --}}

	{{-- ckditor 4 --}}
	<script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ url('/static/js/admin.js?v='.time()) }}"></script>

	{{-- sweetalert 2 --}}
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	{{-- estilos propios --}}
	<link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">

	{{-- fancy --}}
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip()
		});
	</script>
</head>
<body>

	{{-- contenedor --}}
	<div class="wrapper">
		<div class="col1">
			@include('admin.sidebar')
		</div>

		<div class="col2">
			<nav class="navbar navbar-expand-lg shadow">
				<div class="callapse navbar-collapse">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="{{ url('/admin') }}" class="nav-link">
								<i class="fas fa-home"></i> Dashboard
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<div class="page">

				<div class="container-fluid">
					<nav aria-label="breadcrumb shadow">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="{{ url('/admin') }}">
									<i class="fas fa-home"></i> Dashboard
								</a>
							</li>

							{{-- bloque --}}
							@section('breadcrumb')
							@show
						</ol>
					</nav>
				</div>


				@if(Session::has('message'))
					<div class="container-fluid">
						<div class="alert alert-{{ Session::get('typealert') }} mtop16" style="display: block; margin-bottom: 16px;">
							{{ Session::get('message') }}
							@if ($errors->any())
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif
							<script>
								$('.alert').slideDown();
								setTimeout(function(){ $('.alert').slideUp(); }, 10000);
							</script>
						</div>
					</div>
				@endif

				@section('content')
				@show

			</div>


		</div>
	</div>
</body>
</html>
