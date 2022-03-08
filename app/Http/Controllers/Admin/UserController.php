<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Modelo de usuarios
use App\User;

class UserController extends Controller
{
    public function __Construct() {
    	$this->middleware('auth');
		$this->middleware('user.status');
		$this->middleware('user.permissions');
    	$this->middleware('isadmin');
    }

    public function getUsers($status) {
		if($status == 'all'):	
    		$users = User::orderBy('id', 'Desc')->paginate(30);
		else:
			$users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(30);
		endif;
    	$data = ['users' => $users];
    	return view('admin.users.home', $data);
    }

	public function getUserEdit($id) {
		$u = User::findOrFail($id);
		$data = ['u' => $u];
		// retorna la vista
		return view('admin.users.user_edit', $data);
	}

	// Editar un usuario
	public function postUserEdit(Request $request, $id) {
		$u = User::findOrFail($id);
		$u->role = $request->input('user_type');

		if($request->input('user_type') == "1"):
			if(is_null($u->permissions)):
				$permissions = [
					// dashboard
					'dashboard' => true
				];
				$permissions = json_encode($permissions);
				$u->permissions = $permissions;
			endif;
		else:
			$u->permissions = null; 
		endif;

		if($u->save()):
			if($request->input('user_type') == "1"):
				return redirect('/admin/user/'.$u->id.'/permissions')->with('message', 'El rango del usuario, se actualizo con éxito')->with('typealert', 'success');
			else:
				return back()->with('message', 'El rango del usuario, se actualizo con éxito')->with('typealert', 'success');
			endif;
		endif;
	}
	// fin

	public function getUserBanned($id) {
		$u = User::findOrFail($id);
		if($u->status == "100"):
			$u->status = "0";
			$msg = "Usuario Activo Nuevamente.";
		else:
			$u->status = "100";
			$msg = "Usuario Suspendio Con éxito.";
		endif;

		if($u->save()):
			return back()->with('message', $msg)->with('typealert', 'success');
		endif;
	}

	public function getUserPermissions($id) {
		$u = User::findOrFail($id);
		$data = ['u' => $u];
    	return view('admin.users.user_permissions', $data);
	}

	public function postUserPermissions(Request $request, $id) {	
		// return $request->except(['_token']);
		$u = User::findOrFail($id);
		$u->permissions = $request->except(['_token']);
		if($u->save()):
			return back()->with('message', 'Los permisos del usuario fueron actualizados con éxito.')->with('typealert', 'success');
		endif;
	}
}
