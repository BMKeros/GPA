<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;

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

        $cart->each(function($cart){
            $cart->user;
            $cart->product;
        });

        
        $units = count($cart);

        \Session::put('cart', $cart);
        \Session::put('units', $units);

        $total = $this->total();


        return view('cart.show', compact('total'));
    }


    // Add cart
    public function add(Request $request, Product $product)
    {

        $cart = Cart::where('product_id', '=', $product->id)->first();

        if(count($cart)>=1){

           return redirect()->route('cart.show');

        }else{
            $product = Cart::create([
                'user_id' => \Auth::user()->id,
                'product_id' => $product->id,
                'quantity' => $product->quantity = 1,
            ]);         
        }


        $cart = Cart::all();
        $units = count($cart);

        $cart->each(function($cart){
            $cart->user;
            $cart->product;
        });
        

        \Session::put('cart', $cart);
        \Session::put('units', $units);

        return redirect()->route('cart.show');

    }

    // Update item
    public function update(Product $product, $quantity)
    {

        $cart=Cart::where('product_id', '=', $product->id)->first();

        $cart->quantity = $quantity;
        $cart->save();
 

        return redirect()->route('cart.show');
    }

    // Delete item
    public function delete(Product $product)
    {
        $cart=Cart::where('product_id', '=', $product->id)->first();
        $cart->delete();
    
        return redirect()->route('cart.show');

    }

    // Trash cart
    public function trash()
    {
        // $cart = Cart::all();
        // $cart->delete();

        return redirect()->route('cart.show');
    }

    // Total
    private function total()
    {
        $cart = Cart::all();

        $cart->each(function($cart){
            $cart->user;
            $cart->product;
        });

        $total = 0;

        foreach($cart as $item){
            $total += $item->product->price * $item->quantity;
        }

        return $total;
    }
}
