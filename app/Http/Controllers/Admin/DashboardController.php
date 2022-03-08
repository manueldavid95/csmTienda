<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User, App\Http\Models\Product;


class DashboardController extends Controller
{
    public function __Construct() {
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
    	$this->middleware('isadmin');
    }

    public function getDashboard() {
        // consultas a la base de datos
        $users = User::count();
        $products = Product::where('status', '1')->count();
        $data = ['users' => $users, 'products' => $products];

    	return view('admin.dashboard', $data);
    }
}
