<div class="sidebar shadow">

	{{-- primera parte --}}
	<div class="section-top">
		<div class="logo">
			<img src="{{ url('static/images/logo.svg') }}" class="img-fluid">
		</div>

		<div class="user">
			<span class="subtitle">Hola:</span>
			<div class="name">
				{{ Auth::user()->name }} {{ Auth::user()->lastname }}
				<a href="{{ url('/logout') }}" class="icono-salir" data-toggle="tooltip" data-placement="top" title="Salir de la cuenta">
					<i class="fas fa-sign-out-alt"></i>
				</a>
			</div>
			<div class="email">{{ Auth::user()->email }}</div>
		</div>
	</div>

	{{-- segundo --}}
	<div class="main">
		<ul>
			@if (kvfj(Auth::user()->permissions, 'dashboard'))
			<li>
				<a href="{{ url('/admin') }}" class="lk-dashboard"><i class="fas fa-home"></i> Dashboard</a>
			</li>
			@endif

			@if (kvfj(Auth::user()->permissions, 'categories'))
			<li>
				<a href="{{ url('/admin/categories/0') }}" class="lk-categories lk-category_add lk-category_edit lk-category_delete">
					<i class="far fa-folder-open"></i> Categorias
				</a>
			</li>
			@endif

			@if (kvfj(Auth::user()->permissions, 'products'))
			<li>
				<a href="{{ url('/admin/products/1') }}" class="lk-products lk-product_add lk-product_search lk-product_edit lk-product_gallery_add"><i class="fas fa-boxes"></i> Productos</a>
			</li>
			{{-- <li>
				<a href="{{ url('/admin/products/all') }}" class="lk-products lk-product_add lk-product_search lk-product_edit lk-product_gallery_add"><i class="fas fa-boxes"></i> Productos</a>
			</li> --}}
			{{-- /admin/products/all --}}
			@endif

			@if (kvfj(Auth::user()->permissions, 'orders_list'))
			<li>
				<a href="{{ url('/admin/orders/all') }}" class="lk-orders_list"><i class="fas fa-clipboard-list"></i>Ordenes</a>
			</li>
			@endif

			@if (kvfj(Auth::user()->permissions, 'user_list'))
			<li>
				<a href="{{ url('/admin/users/all') }}" class="lk-user_list lk-user_edit lk-user_permissions"><i class="fas fa-user"></i>Usuarios</a>
			</li>
			@endif

			@if (kvfj(Auth::user()->permissions, 'sliders_list'))
			<li>
				<a href="{{ url('/admin/sliders') }}" class="lk-sliders_list"><i class="far fa-images"></i>sliders</a>
			</li>
			@endif

			@if (kvfj(Auth::user()->permissions, 'settings'))
			<li>
				<a href="{{ url('/admin/settings') }}" class="lk-settings"><i class="fas fa-cogs"></i>configuraciones</a>
			</li>
			@endif


		</ul>
	</div>
</div>
