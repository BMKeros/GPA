<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\PaymentMethod;
use App\Order;
use App\User;
use Validator;
use File;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all()->where("user_id", \Auth::user()->id);

        return view('payment.index', ['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $methods = PaymentMethod::all();
        $request_id = $request->query();
        return view('payment.create', ['request_id'=> $request_id ],compact('methods')); 
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

        $validator = Validator::make($data, [
            'method' => 'required|not_in:0',
            'mount' => 'required|numeric',
            'observation' => 'required',
            'voucher' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        #validacion mount order
        $orders = Order::where('purchase_request_id', '=', $data['request_id'])->get();

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

        #verificar si hay  otros abonos aceptados para saber la deuda total
        $all_payment = Payment::where([['purchase_request_id', '=', $data['request_id']], ['status_id', '=', 4]])->get();

        if(isset($all_payment)){
            $deposit = 0;
            foreach ($all_payment as $pay) {
                $deposit += $pay->quantity;
            }
            $total_price = $total_price - $deposit;
        }

        if ($data['mount'] > $total_price){

            return redirect()->back()->with('error', "Este Monto no puede ser mayor a la deuda actual: {$total_price} Bs!")->withInput(); 

        }
        #Verificar que no haya un bono pendiente
        $pending_payment = Payment::where([['purchase_request_id', '=', $data['request_id']], ['status_id', '=', 3]])->count();

        if ($pending_payment > 0){
            return redirect()->back()->with('error', "No se puede realizar este abono, hasta que el ADMINISTRADOR no acepte el abono anterior para esta compra!")->withInput(); 
        }

        #creacion de carpeta para el voucher
        if(isset($request->voucher)){
            $voucher = $request->voucher;
            $voucherName = 'voucher_'. time() . '.' . $voucher->getClientOriginalExtension();
            $path = public_path() . '/images/vouchers';
            if ( !File::exists($path) ) { 
                File::makeDirectory($path); 
            } 
            $voucher->move($path, $voucherName);

        }

        $payment = Payment::create([
            'user_id' =>  \Auth::user()->id,
            'purchase_request_id' => $data['request_id'],
            'payment_method_id' => $data['method'],
            'status_id' => 3,
            'image' => $voucherName,
            'quantity' => $data['mount'],
            'description' => $data['observation']

        ]);
        return redirect()->route('payment.index')->with('success', "Pago de Abono Enviado con exito al administrador!");
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
        return view('payment.show',['payment' => $payment]);
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
