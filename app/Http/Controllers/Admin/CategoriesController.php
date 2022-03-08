<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// componente para validar
use Validator, Str;

// traemos el modelo al area de trabajo
use App\Http\Models\Category;

class CategoriesController extends Controller
{
     public function __Construct() {
    	$this->middleware('auth');
    	$this->middleware('user.status');
    	$this->middleware('user.permissions');
    	$this->middleware('isadmin');
    }

    public function getHome($module) {
    	$cats = Category::where('module', $module)->orderBy('name', 'Asc')->get();
    	$data = ['cats' => $cats];

    	return view('admin.categories.home', $data);
    }

    public function postCategoryAdd(Request $request) {
    	// validando informacion
    	$rules = [
    		'name' => 'required',
    		'icon' => 'required'
    	];

    	// Mensajes para mostrar
    	$messages = [
    		'name.required' => 'Se requiere de un nombre para la catetgoria.',
    		'icon.required' => 'Se requiere de un icono para la catetgoria.'
    	];

    	// validacion
    	$validator = Validator::make($request->all(), $rules, $messages);
    	if ($validator->fails()) :
    		return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
    	else:
    		$c = new Category;
    		$c->module = $request->input('module');
    		$c->name = e($request->input('name'));
    		$c->slug = Str::slug($request->input('name'));
    		$c->icono = e($request->input('icon'));
    		if($c->save()):
    			return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
    		endif;
    	endif;
    }

    public function getCategoryEdit($id) {
    	$cat = Category::find($id);
    	$data = ['cat' => $cat];

    	return view('admin.categories.edit', $data);
    }

     public function postCategoryEdit(Request $request, $id) {
    	// validando informacion
    	$rules = [
    		'name' => 'required',
    		'icon' => 'required'
    	];

    	// Mensajes para mostrar
    	$messages = [
    		'name.required' => 'Se requiere de un nombre para la catetgoria.',
    		'icon.required' => 'Se requiere de un icono para la catetgoria.'
    	];

    	// validacion
    	$validator = Validator::make($request->all(), $rules, $messages);
    	if ($validator->fails()) :
    		return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
    	else:
    		$c = Category::find($id);
    		$c->module = $request->input('module');
    		$c->name = e($request->input('name'));
    		$c->slug = Str::slug($request->input('name'));
    		$c->icono = e($request->input('icon'));
    		if($c->save()):
    			return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
    		endif;
    	endif;
    }

    public function getCategoryDelete($id) {
    	$c = Category::find($id);

    	if($c->delete()):
    		return back()->with('message', 'Borrado con éxito.')->with('typealert', 'success');
    	endif;
    }
}
