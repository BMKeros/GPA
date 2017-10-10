<?php

namespace App\Http\Controllers;

use App\Product;
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
        if (!\Session::has('units')) \Session::put('units', []);
		// \Session::forget('cart');
	}

    // Show cart
    public function show()
    {

    	$cart = Cart::all();
    	// $cart = \Session::get('cart');

    	$cart->each(function($cart){
    	    $cart->user;
    	    $cart->product;
    	});

    	
    	$units = $cart->sum('quantity');

    	\Session::put('cart', $cart);
    	\Session::put('units', $units);


    	return view('cart.show');
    }

    // Add cart
    public function add(Product $product)
    {

    	$product = Cart::create([
    	    'user_id' => \Auth::user()->id,
    	    'product_id' => $product->id,
    	    'quantity' => $product->quantity = 1,
    	]);

    	$cart = Cart::all();
    	$units = $cart->sum('quantity');

    	$cart->each(function($cart){
    	    $cart->user;
    	    $cart->product;
    	});
    	

    	\Session::put('cart', $cart);
    	\Session::put('units', $units);

    	return redirect('/user/catalogue');
    }
}
