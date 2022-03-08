@extends('admin.master')

@section('title', 'Categorias')


@section('breadcrumb')
	<li class="breadcrumb-item">
		<a href="{{ url('/admin/categories') }}">
			<i class="far fa-folder-open"></i> Categorias
		</a>
	</li>
@endsection

{{-- contenido principal de la vista --}}
@section('content')
	<div class="container-fluid">
		<div class="row">
			{{-- colummna para crear las categorias --}}
			<div class="col-md-3">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title">
							<i class="fas fa-edit"></i> Editar Categoria
						</h2>
					</div>

					{{-- inside --}}
					<div class="inside">
						{!! Form::open(['url' => '/admin/category/'.$cat->id.'/edit', 'files' => true]) !!}
						{{-- CAMPO PARA EL NOMBRE DE LA CATEGORIA --}}
						<label for="name">Nombre:</label>
						<div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                       

						 	{!! Form::text('name', $cat->name, ['class' => 'form-control']) !!}
						</div>

						{{-- CAMPO PARA EL MODULO --}}
						<label for="module" class="mtop16">Módulo:</label>
						<div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
						 	{!! Form::select('module', getModulesArray(), $cat->module, ['class' => 'form-select']) !!}
						</div>

						{{-- CAMPO PARA EL ICONO --}}
						<label for="icon" class="mtop16">Ícono:</label>
						<div class="form-file">
							{!! Form::file('icon', ['class' => 'form-control', 'id' => 'customFile', 'accept' => 'image/*']) !!}
						</div>

						{{-- CAMPO PARA EL BOTON --}}
						{!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}


						{!! Form::close() !!}
					</div>
				</div>
			</div>

			@if(!is_null($cat->icono))
				{{-- colummna para crear las categorias --}}
				<div class="col-md-3">
					<div class="panel shadow">
						<div class="header">
							<h2 class="title">
								<i class="fas fa-edit"></i> Icono
							</h2>
						</div>
				
						{{-- inside --}}
						<div class="inside">
							<img src="{{ url('/uploads/'.$cat->file_path.'/'.$cat->icono) }}" class="img-fluid">
						</div>
					</div>
				</div>
			@endif
		</div>

	</div>
@endsection