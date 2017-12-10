<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseRequest;
use App\Order;
use App\Cart;
use App\Payment;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $subtotal_= 0;
        $porcen= 0;
        $precio_total=0;
        $orders = Order::where('request_id','=', $id)->get();

     
        
        foreach ($orders as $order) {
            $subtotal_ += $order->product->price * $order->quantity;
            if (\Auth::user()->hasRole('SOCIO')) {
                $porcen += ($order->getPrecioUnitario()) * ($order->product->associated_percentage/100);
            }else{
                $porcen += ($order->getPrecioUnitario()) * ($order->product->street_percentage/100);
                }
           
            $precio_total = $subtotal_ + $porcen;
  
        };
        
        #Obtener abonos de una solicitud
        $payments = Payment::where([['request_id', '=', $id], ['status_id', '=', 4]])->get();

        $total_payment = 0;
        if (isset($payments)) {
            foreach ($payments as $payment) {
               $total_payment += $payment->quantity;
            }
        }

        

        return view('order.show',['orders'=> $orders,'subtotal_'=>$subtotal_,'porcen'=>$porcen,'precio_total'=>$precio_total, 'payments' => $payments, 'total_payment' => $total_payment, 'request_id' => $id ]);
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
