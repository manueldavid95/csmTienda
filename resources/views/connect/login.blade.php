@extends('connect.master')

{{-- llama al login --}}
@section('title', 'Login')

{{-- aqui va el codigo html para el master.blade.php --}}
@section('content')
<div class="box box-login shadow">
	<div class="header">
		<a href="{{ url('/') }}">
			{{-- <img src="{{ url('/static/images/logo.svg') }}" alt=""> --}}
			<img src="{{ url('/static/images/logo.png') }}" alt="">
		</a>
	</div>

	<div class="inside">
		{!! Form::open(['url' => '/login']) !!}

		{{-- input para el correo --}}
		<label for="email">Correo Electronicó:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">
					<i class="far fa-envelope"></i>
				</div>
			</div>
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>

		{{-- input para la contraseña --}}
		<label for="password" class="mtop16">Password:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">
					<i class="fas fa-lock"></i>
				</div>
			</div>
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>

		{{-- boton del formulario --}}
		{!! Form::submit('Ingresar', ['class' => 'btn btn-success mtop16']) !!}
		
		{!! Form::close() !!} 

		{{-- alerta --}}
		@if(Session::has('message'))
			<div class="container">
				<div class="mtop16 alert alert-{{Session::get('typealert')}}" style="display: none;">
					{{Session::get('message')}}
					@if ($errors->any())
						<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					@endif
					<script>
						$('.alert').slideDown();
						setTimeout(function() {$('.alert').slideUp();}, 10000);
					</script>
				</div>
			</div>
		@endif

		{{-- boton para el registro --}}
		<div class="footer mtop16">
			<a href="{{ url('/register') }}">¿Si no tienes una cuenta?, Registrate.</a>
			<a href="{{ url('/recover') }}">Recuperar Contraseña.</a>
		</div>
	</div>
</div>
@stop