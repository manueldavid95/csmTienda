<?php
	// Key Value From Json
	function kvfj($json, $key) {
		if ($json == null):
			return null;
		else:
			$json = $json;
			$json = json_decode($json, true);

			if(array_key_exists($key, $json)):
				return $json[$key];
			else:
				return null;
			endif;
		endif;
	}

	function getModulesArray(){
		$a = [
			'0' => 'Informatica'
			// '1' => 'Blog'
		];

		return $a;
	}

	function getRoleUserArray($mode, $id) {
		$roles = ['0' => 'Usuario', '1' => 'Administrador'];
		if(!is_null($mode)):
			return $roles;
		else:
			return $roles[$id];
		endif;
	}

	function getUserStatusArray($mode, $id) {
		$status = ['0' => 'Registrado', '1' => 'Verificado', '100' => 'Baneado'];
		if(!is_null($mode)):
			return $status;
		else:
			return $status[$id];
		endif;
	}

	function user_permissions() {
		$p = [

			// Permisos dashboard
			'dashboard' => [
				'icon' => '<i class="fas fa-home"></i>',
				'title' => 'Modulo De Dashboard',
				'keys' => [
					'dashboard' => 'Puede Ver El Dashboard.',
					'dashboard_small_stats' => 'Puede Ver Las Estadísticas Rápidas',
					'dashboard_sell_today' => 'Puede Ver Lo Facturado Hoy.'
				]
			],


			// Permisos products
			'products' => [
				'icon' => '<i class="fas fa-boxes"></i>',
				'title' => 'Modulo De Productos',
				'keys' => [
					'products' => 'Puede Ver El listado de productos.',
					'product_add' => 'Puede agregar nuevos productos.',
					'product_edit' => 'Puede editar productos.',
					'product_search' => 'Puede buscar productos.',
					'product_delete' => 'Puede eliminar productos.',
					'product_gallery_add' => 'Puede agregar imagenes a la galería.',
					'product_gallery_delete' => 'Puede eliminar imagenes de la galeria.',
				]
			],


			// Permisos categorias
			'categories' => [
				'icon' => '<i class="far fa-folder-open"></i>',
				'title' => 'Modulo De Categorias',
				'keys' => [
					'categories' => 'Puede ver la lista de Categorias.',
					'category_add' => 'Puede crear nuevas categorias.',
					'category_edit' => 'Puede editar categorias.',
					'category_delete' => 'Puede eliminar categorias.'
				]
			],

			// Permisos para los usuarios
			'users' => [
				'icon' => '<i class="fas fa-user-friends"></i>',
				'title' => 'Modulo De Usuarios',
				'keys' => [
					'user_list' => 'Puede ver la lista de Usuarios.',
					'user_edit' => 'Puede Editar Usuarios.',
					'user_banned' => 'Puede banear Usuarios.',
					'user_permissions' => 'Puede administrar Permisos De Usuario.'
				]
			],

			'sliders' => [
				'icon' => '<i class="far fa-images"></i>',
				'title' => 'Modulo De Sliders',
				'keys' => [
					'sliders_list' => 'Puede ver la lista de Sliders.',
					'slider_add' => 'Puede crear Sliders',
					'slider_edit' => 'Puede editar los Sliders',
					'slider_delete' => 'Puede eliminar los Sliders'
				]
			],

			// Modulo de configuracion
			'settings' => [
				'icon' => '<i class="fas fa-cogs"></i>',
				'title' => 'Modulo De Configuraciones',
				'keys' => [
					'settings' => 'Puede modificar la configuracion'
				]
			],

			// Modulo de Ordenes
			'orders' => [
				'icon' => '<i class="fas fa-clipboard-list"></i>',
				'title' => 'Modulo De Ordenes',
				'keys' => [
					'orders_list' => 'Puede ver el listado de ordenes.'
				]
			],
		];

		return $p;
	}

// funcion para los años
function getUserYears() {
	$ya = date('Y');
	$ym = $ya - 18;
	$yo = $ym - 62;

	return [$ym, $yo];
}

// funcion para la lista de los meses
function getMonths($mode, $key) {
	$m = [
		'01' => 'Enero',
		'02' => 'Febrero',
		'03' => 'Marzo',
		'04' => 'Abril',
		'05' => 'Mayo',
		'06' => 'Junio',
		'07' => 'Julio',
		'08' => 'Agosto',
		'09' => 'Septiembre',
		'10' => 'Octubre',
		'11' => 'Noviembre',
		'12' => 'Diciembre',
	];
	if ($mode == "list") {
		return $m;
	} else {
		return $m[$key];
	}
}
