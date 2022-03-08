@extends('connect.master')

{{-- llama al login --}}
@section('title', 'Registrarse')

{{-- aqui va el codigo html para el master.blade.php --}}
@section('content')
<div class="box box-register shadow">
	<div class="header">
		<a href="{{ url('/') }}">
			{{-- <img src="{{ url('/static/images/logo.svg') }}" alt=""> --}}
			<img src="{{ url('/static/images/logo.png') }}" alt="">
		</a>
	</div>

	<div class="inside">
		{!! Form::open(['url' => '/register']) !!}

		{{-- input para el nombre del usuario --}}
		<label for="name">Nombre:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">
					<i class="fas fa-user"></i>
				</div>
			</div>
			{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
		</div>

		{{-- input para el apellido del usuario --}}
		<label for="lastname" class="mtop16">Apellido:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">
					<i class="fas fa-user-tag"></i>
				</div>
			</div>
			{!! Form::text('lastname', null, ['class' => 'form-control', 'required']) !!}
		</div>

		{{-- input para el correo --}}
		<label for="email" class="mtop16">Correo Electronicó:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">
					<i class="far fa-envelope"></i>
				</div>
			</div>
			{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
		</div>

		{{-- input para la contraseña --}}
		<label for="password" class="mtop16">Password:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">
					<i class="fas fa-lock"></i>
				</div>
			</div>
			{!! Form::password('password', ['class' => 'form-control', 'required']) !!}
		</div>

		{{-- input para confirmar-contraseña --}}
		<label for="cpassword" class="mtop16">Confirmar Password:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">
					<i class="fas fa-key"></i>
				</div>
			</div>
			{!! Form::password('cpassword', ['class' => 'form-control', 'required']) !!}
		</div>

		{{-- boton del formulario --}}
		{!! Form::submit('Registrarse', ['class' => 'btn btn-success mtop16']) !!}
		
		{{-- fin del formulario --}}
		{!! Form::close() !!} 

		{{-- alerta --}}
		@if(Session::has('message'))
			<div class="container">
				<div class="mtop16 alert alert-{{ Session::get('typealert') }}" style="display: none;">
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

		{{-- boton para el registro --}}
		<div class="footer mtop16">
			<a href="{{ url('/login') }}">Ya tengo una cuenta, Ingresar.</a>
		</div>
	</div>
</div>
@stop