<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
	public function dashboard()
	{

            return view('admin.dashboard');
	}
}