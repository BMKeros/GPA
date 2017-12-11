<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Order;
use App\PurchaseRequest;


class AdministrationPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $payments = Payment::all();
        return view('admin.payment.index', ['payments' => $payments]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return view('admin.payment.show',['payment' => $payment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('admin.payment.edit',['payment' => $payment]);
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
        $payment = Payment::findOrFail($id);

        if($request->accion === 'aceptar'){
            $payment->status_id = 4;
            $payment->save();

            $orders = Order::where('purchase_request_id', '=', $payment->purchase_request->id)->get();

            $subtotal_= 0;
            $porcen= 0;
            $total_price=0;
    
            foreach ($orders as $order) {
                $subtotal_ += $order->product->price * $order->quantity;
                if (\Auth::user()->hasRole('SOCIO')) {
                    $porcen += ($order->get_unit_price()) * ($order->product->associated_percentage/100);
                }else{
                    $porcen += ($order->get_unit_price()) * ($order->product->street_percentage/100);
                    }
               
                $total_price = $subtotal_ + $porcen;
      
            };
            $all_payment = Payment::where([['purchase_request_id', '=', $payment->purchase_request->id], ['status_id', '=', 4]])->get();

            if(isset($all_payment)){

                $deposit = 0;
                foreach ($all_payment as $pay) {
                    $deposit += $pay->quantity;
                }
            }

            if (isset($deposit)) {
                if($total_price == $deposit){

                    $purchase = PurchaseRequest::findOrFail($payment->purchase_request->id);
                    $purchase->status_id = 6;
                    $purchase->save();
                    
                    return redirect()->route('admin-payment.index')->with('success', "El Abono del Usuario: {$payment->user->name} ha sido ACEPTADO. Se ha COMPLETADO EL PAGO para esta compra!.");  
                }
                 
            }

            return redirect()->route('admin-payment.index')->with('success', "El Abono del Usuario: {$payment->user->name} ha sido ACEPTADO.");
        }
        else{

            $this->validate(request(),[

                'rejected' => 'required',
            ]);

            $payment->reason_rejected = $request->rejected;
            $payment->status_id = 5;
            $payment->save();

            return redirect()->route('admin-payment.index')->with('success', "El Abono del Usuario: {$payment->user->name} ha sido RECHAZADO.");
        }
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
