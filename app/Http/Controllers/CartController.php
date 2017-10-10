<?php

namespace App\Http\Controllers;

use App\Products;
use App\Cart;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
        if (!\Session::has('cart')) \Session::put('cart', []);
        if (!\Session::has('elems')) \Session::put('elems', []);
		// \Session::forget('cart');
	}

    // Show cart
    public function show()
    {

    	$cart = Cart::all();

    	$cart->each(function($cart){
    	    $cart->user;
    	    $cart->product;
    	});

    	// $cart = \Session::get('cart');
    	$elems = $cart->sum('quantity');

    	\Session::put('cart', $cart);
    	\Session::put('elems', $elems);


    	return view('cart.show');
    }

    // Add cart
    public function add(Products $product)
    {

    	$product = Cart::create([
    	    'user_id' => \Auth::user()->id,
    	    'product_id' => $product->id,
    	    'quantity' => $product->quantity = 1,
    	]);

    	return redirect('/user/cart/show');
    }
}
