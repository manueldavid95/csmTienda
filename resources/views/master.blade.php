<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') - Compu Space</title>

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
	<script src="{{ url('/static/js/admin.js?v=').time() }}"></script>

    {{-- JavaScript PROPIO --}}
	<script src="{{ url('/static/js/site.js?v='.time()) }}"></script>

	{{-- sweetalert --}}
	{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
	{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	{{-- estilos propios --}}
	<link rel="stylesheet" href="{{ url('/static/css/style.css?v='.time()) }}">

	{{-- fancy --}}
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</head>
<body>
    {{-- Barra de navegacion del sitio web --}}
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
				<img src="{{ url('/static/images/logo.png') }}" alt="logo computer">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            {{-- enlaces --}}
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">Inicio</a>
                    </li>

					<li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link"> Tienda</a>
                    </li>

					<li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link"> Sobre Nosotros</a>
                    </li>

					<li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link"> Contacto</a>
                    </li>

					<li class="nav-item">
                        <a href="{{ url('/car') }}" class="nav-link"> <i class="fas fa-shopping-cart"></i> <span class="carnumber">0</span> </a>
                    </li>

					{{-- condicial para los usuarios que son visitantes --}}
                    @if(Auth::guest())
                        <li class="nav-item link-acc">
                            <a href="{{ url('/login') }}" class="nav-link btn">
                                <i class="fas fa-fingerprint"></i> Ingresar</a>

                            <a href="{{ url('/register') }}" class="nav-link btn">
                                <i class="far fa-user-circle"></i> Crear Cuenta</a>
                        </li>
                    @else
						<li class="nav-item link-acc link-user dropdown">
							<a href="{{ url('/login') }}" class="nav-link btn dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								@if(is_null(Auth::user()->avatar))
									<img src="{{ url('/static/images/default_avatar.png') }}">
								@else
									<img src="{{ url('/uploads_users/'.Auth::id().'/av_'.Auth::user()->avatar) }}">
								@endif

								Hola: {{ Auth::user()->name }}
							</a>

							<ul class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
								@if(Auth::user()->role == "1")
									<li>
										<a class="dropdown-item" href="{{ url('/admin') }}">Administrador</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
								@endif

								<li>
									<a class="dropdown-item" href="{{ url('/account/edit') }}">Editar Perfil</a>
								</li>

								<li>
									<a class="dropdown-item" href="{{ url('/logout') }}">Salir</a>
								</li>
							</ul>
						</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- fin barra --}}

    @if(Session::has('message'))
		<div class="container">
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

	{{-- wrapper --}}
	<div class="wrapper">
		<div class="container">
			@yield('content')
		</div>
	</div>

</body>
</html>
