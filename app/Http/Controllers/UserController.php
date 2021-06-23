<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
	public function signup()
	{
		return view('signup');
	}

	public function postSignup(Request $request)
	{

		$validator = Validator::make($request->all(), [

			'email' => ['required',
						'unique:users',
						'max:320',
						'regex:/^[a-z0-9]+[\._]?[a-z0-9]+[@]\w+[.]\w{2,3}$/i'],

			'phone' => ['required',
						'unique:users',
						'regex:/^[0-9]{8}$/'],

			'firstName' => ['required'],

			'lastName' => ['required'],

			'password' => ['required',
						'confirmed',
						// Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character
						'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/i'],
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$user = new User();
		$user->email = $request['email'];
		$user->phone = $request['phone'];
		$user->first_name = $request['firstName'];
		$user->last_name = $request['lastName'];
		$user->password = bcrypt($request['password']);
		$user->save();

		Auth::login($user);

		return redirect()->route('home')->withSuccess("Congratulations! We have sent you an email. (not really)");
	}

	public function login()
	{
		if(Auth::check()){
			return redirect()->route('home')->withSuccess("You are already logged in.");
		}

		return view('login');
	}

	private function setSessions()
    {

    }

	public function postLogin(Request $request)
    {
    	if(Auth::attempt(['email' => $request['email'],
    				   'password' => $request['password']])){
    		$this->setSessions();
    		return redirect()->route('home');
    	}
    	return redirect()->back()->withErrors(['Incorrect email or password.']);
    }

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('login');
	}
}
