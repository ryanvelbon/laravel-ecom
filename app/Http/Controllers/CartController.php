<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Models\CartItem;

class CartController extends Controller
{
    public function addItem(Request $request)
    {
    	$item = new CartItem();

    	if(Auth::check()){
    		$item->user_id = Auth::id();
    	}else{
    		$item->session_token = Session::token();
    	}

    	$item->product_id = $request['product_id'];
    	$item->quantity = $request['quantity'];
    	$item->active = true;

    	$item->save();

        // sleep(3); // uncomment this to see AJAX responsiveness

        return response()->json(['success' => 'Item added to cart.']);
    }

    public function removeItem(Request $request, $id)
    {
    	$item = CartItem::find($id);
    	$item->active = false;
    	$item->save();
    	return Redirect::back()->withSuccess("Item has been removed from your cart.");
    }

    public function removeItemsAll(Request $request)
    {
        if(Auth::check()){
            $items = Auth::user()->cart;
        }else{
            $items = CartItem::where('session_token', Session::token())->where('active', '1')->get();
        }

        foreach($items as $item){
            $item->active = false;
            $item->save();
        }

        return Redirect::back()->withSuccess("Your basket has been emptied.");
    }

    public function updateItem(Request $request, $id)
    {
        $item = CartItem::find($id);
        $item->quantity = $request['quantity'];
        $item->save();
        return Redirect::back()->withSuccess("Cart item has been updated.");
    }

    public function index()
    {
    	if(Auth::check()){
    		$cart_items = Auth::user()->cart;
    	}else{
    		$cart_items = CartItem::where('session_token', Session::token())
    								->where('active', 1)
    								->get();
    	}
    	return view('cart.index', ['cart_items' => $cart_items]);
    }
}
