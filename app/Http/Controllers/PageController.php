<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Models\CartItem;


class PageController extends Controller
{
	public function home()
	{
		$products = Product::all();
		return view('home', ['products' => $products]);
	}

	public function checkout()
	{
		if(Auth::check()){
			$cart_items = Auth::user()->cart;
		}else{
			$cart_items = CartItem::where('session_token', Session::token())
									->where('active', 1)
									->get();
		}
		return view('pages.checkout', ['cart_items' => $cart_items]);
	}

	/*
	 * This function is merely for testing.
	 */
	public function flash()
	{
		$flashMsgs = [
			array("alert-primary", "This is a flash message without a link", "#", ""),
			array("alert-success", "<strong>Success!</strong> Item added to cart!", route('cart.index'), "View Cart"),
			array("alert-danger", "To proceed to checkout you must be logged in.", route('login'), "Log in")
		];

		return redirect()->route('home', ['flashMsgs' => $flashMsgs]);
	}

	// public function dashboard()
	// {
	// 	$orders = Order::all();
	// 	return view('dashboard', ['orders' => $orders]);
	// }


	// public function contact()
	// {
	// 	return view('pages.contact');
	// }


	// public function postContact(Request $request)
	// {
	// 	$validator = Validator::make($request->all(), [
	// 		// pending
	// 	]);

	// 	if ($validator->fails()) {
	// 		return redirect()->back()->withErrors($validator)->withInput();
	// 	}
	// }
}
