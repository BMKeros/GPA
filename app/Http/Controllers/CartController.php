<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Cart;

class CartController extends Controller
{

    // Show cart
    public function show()
    {

    	$cart = Cart::all();

    	return view('cart.show', compact('cart'));
    }

    // Add cart
    public function add(Products $product)
    {

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
