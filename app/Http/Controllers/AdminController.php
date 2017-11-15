<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
	public function dashboard()
	{
            
            return view('admin.dashboard');
	}

	public function logout()
	{
            Auth::logout();
            
            return redirect()->route('homepage')->withSuccess('Wylogowano pomyślnie');
	}
}