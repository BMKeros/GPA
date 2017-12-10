@extends('layouts.master_admin')


@section('title')
Abono
@stop

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              	<div class="x_title">
                	<h2>Abono</h2>
                	<div class="clearfix"></div>
               	</div>
                <div class="x_content">

                  	<div class="col-xs-12" style="border:0px solid #e5e5e5;">

                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    <h2>Estado:</h2>
                                </th>
                                <td>                            
                                @if ($payment->status->id == 3)
                                <span class="btn btn-primary btn-md" >Pendiente</span>
                                @elseif($payment->status->id == 4)
                                <span class="btn btn-success btn-md">Aceptado</span>
                                @else
                                <span class="btn btn-danger btn-md">Rechazado</span>      
                                @endif
                                 

                                </td>   
                            </tr>
                            <tr>
                                <th>
                                    <h2>Metodo de pago:</h2>
                                </th>
                                <td>
                                    <h2>{{$payment->payment_method->name}}</h2>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h2>Monto:</h2>
                                </th>
                                <td>
                                    <h2>{{$payment->quantity}} Bs</h2>
                                </td>

                            </tr>
                            <tr>
                                <th>
                                    <h2>Observacion:</h2>
                                </th>
                                <td>
                                    <h2>{{$payment->description}}</h2>
                                </td>
                            </tr>
                            @if($payment->reason_rejected != null)
                            <tr>
                                <th>
                                    <h2>Razon del Rechazo:</h2>
                                </th>
                                <td>
                                    <h2>{{$payment->reason_rejected}}</h2>
                                </td>
                            </tr> 
                            @endif 
                        </tbody>

                    </table>
                                  


                  	</div>
                    <div class="col-md-7 col-sm-7 col-xs-12" style="border: solid 1px #e2e2e2; margin-left: 1.5%; border-radius: 2px;">
                        <div class="">
                            <h2>Comprobante:</h2>
                        </div>
                        <div class="product-image">
                            <img src="{{ asset('images/vouchers/').'/'.$payment->image }}" alt="..." />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop