<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Admin;

class AdminController extends Controller
{
	public function index()
	{
		// if not authenticated
		if(!Auth::guard('admin')->check()){
			return redirect()->route('admin.login');
		}

		return view('admin.dashboard');
		
	}
	public function login()
	{
		if(Auth::guard('admin')->check()){
			return redirect()->route('admin.dashboard')->withSuccess("You are already logged in.");
		}

		return view('admin.login');
	}

	private function setSessions()
    {

    }

	public function postLogin(Request $request)
    {
    	if(Auth::guard('admin')->attempt(['email' => $request['email'],
    				   'password' => $request['password']])){
    		$this->setSessions();
    		return redirect()->route('admin.dashboard');
    	}
    	return redirect()->back()->withErrors(['Incorrect email or password.']);
    }

	public function logout(Request $request)
	{
		Auth::guard('admin')->logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('admin.login');
	}
}