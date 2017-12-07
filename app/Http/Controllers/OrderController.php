<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseRequest;
use App\Order;
use App\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::all()->where("user_id", \Auth::user()->id);

        $cart->each(function($cart){
            $cart->user;
            $cart->product;
        });

        
        $units = count($cart);

        \Session::put('cart', $cart);
        \Session::put('units', $units);

        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $purchase_request=PurchaseRequest::create([
            'user_id' =>  \Auth::user()->id,
            'referred_id' =>  null,
            'status_id' =>  3,
            'description' =>  $data['description'],
        ]);

        $req = PurchaseRequest::all()->where('user_id', \Auth::user()->id)->last();

        $cart = Cart::all()->where("user_id", \Auth::user()->id);

        $cart->each(function($cart){
            $cart->user;
            $cart->product;
        });

        foreach($cart as $item){
            $order=Order::create([
                'request_id' =>  $req->id,
                'product_id' =>  $item->product->id,
                'status_id' =>  3,
                'quantity' =>  $item->quantity,
                'price' =>  $item->product->price,
            ]);

            $item->delete();
        }

        return redirect()->route('cart.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::where('request_id','=', $id)->get();

        return view('order.show',['orders'=> $orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
