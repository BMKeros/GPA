<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

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

            return redirect()->route('payment.index')->with('success', "El Abono del Usuario: {$payment->user->name} ha sido ACEPTADO.");
        }
        else{

            $this->validate(request(),[

                'rejected' => 'required',
            ]);

            $payment->reason_rejected = $request->rejected;
            $payment->status_id = 5;
            $payment->save();

            return redirect()->route('payment.index')->with('success', "El Abono del Usuario: {$payment->user->name} ha sido RECHAZADO.");
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
