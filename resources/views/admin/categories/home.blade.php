@extends('admin.master')

@section('title', 'Categorias')


@section('breadcrumb')
	<li class="breadcrumb-item">

		<a href="{{ url('/admin/categories') }}">
			<i class="far fa-folder-open"></i> Categorias
		</a> 

		
		{{-- <i class="far fa-folder-open"></i> Categorias --}}

		{{-- <a href="{{ url('/admin/categories/0') }}">
			<i class="far fa-folder-open"></i> Categorias
		</a>
 --}}		
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
							<i class="fas fa-plus"></i> Agregar Categoria
						</h2>
					</div>

					{{-- inside --}}
					<div class="inside">
						@if (kvfj(Auth::user()->permissions, 'category_add'))

						{!! Form::open(['url' => '/admin/category/add']) !!}
						{{-- CAMPO PARA EL NOMBRE DE LA CATEGORIA --}}
						<label for="name">Nombre:</label>
						<div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
						 	{!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>

						{{-- CAMPO PARA EL MODULO --}}
						<label for="module" class="mtop16">Módulo:</label>
						<div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
						 	{!! Form::select('module', getModulesArray(), 0, ['class' => 'form-select']) !!}
						</div>

						{{-- CAMPO PARA EL ICONO --}}
						<label for="icon" class="mtop16">Ícono:</label>
						<div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
						 	{!! Form::text('icon', null, ['class' => 'form-control']) !!}
						</div>

						{{-- CAMPO PARA EL BOTON --}}
						{!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
						{!! Form::close() !!}

						@endif
					</div>
				</div>
			</div>

			{{-- copia de arriba --}}
			<div class="col-md-9">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title">
							<i class="far fa-folder-open"></i> Categorias
						</h2>
					</div>

					{{-- inside --}}
					<div class="inside">
						{{-- menu de navegacion --}}
						<nav class="nav nav-pills nav-fill">
							@foreach(getModulesArray() as $m => $k)
								<a class="nav-link" href="{{ url('/admin/categories/'.$m) }}">
									<i class="fas fa-list"></i> {{ $k }}
								</a>
							@endforeach
						</nav>

						{{-- tabla para las categorias --}}
						<table class="table mtop16">
							<thead>
								<tr>
									<td width="32"></td>
									<td>Nombre</td>
									<td width="140"></td>
								</tr>
							</thead>

							<tbody>
								@foreach($cats as $cat)
									<tr>
										<td>{!! htmlspecialchars_decode($cat->icono) !!}</td>
										<td>{{ $cat->name }}</td>
										<td>
											<div class="opts">
												@if (kvfj(Auth::user()->permissions, 'category_edit'))
												<a href="{{ url('/admin/category/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
													<i class="fas fa-edit"></i>
												</a>
												@endif

												@if (kvfj(Auth::user()->permissions, 'category_delete'))
												<a href="{{ url('/admin/category/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
													<i class="fas fa-trash-alt"></i>
												</a>
												@endif
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection