<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Cart;

class CartController extends Controller
{
	public function __construct()
	{
		if(!\Session::has('cart')) \Session::put('cart', array());
		if(!\Session::has('elems')) \Session::put('elems', array());
		// \Session::forget('cart');
	}

    // Show cart
    public function show()
    {

    	$cartDB = Cart::all();
    	$cart = \Session::get('cart');
    	$a = $cartDB->sum('quantity');

    	\Session::put('cart', $cartDB);
    	\Session::put('elems', $a);

    	return view('cart.show');
    }

    // Add cart
    public function add(Products $product)
    {
    	$data = [
    	    'user_id' => \Auth::user()->id,
    	    'name' => $product->name,
    	    'price' => $product->price,
    	    'quantity' => $product->quantity = 1,
    	    'image' => $product->image,
    	];

    	\Session::put('cart', $data);

    	$product = Cart::create([
    	    'user_id' => \Auth::user()->id,
    	    'name' => $product->name,
    	    'price' => $product->price,
    	    'quantity' => $product->quantity = 1,
    	    'image' => $product->image,
    	]);

    	return redirect('/user/cart/show');
    }
}