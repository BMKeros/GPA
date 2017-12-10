@extends('layouts.master_admin')


@section('title')
@if($payment->status->id == 4)
Abonos
@else
Solicitud de abono
@endif
@stop

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              	<div class="x_title">
                    @if($payment->status->id == 4)
                    <h2>Abono</h2>
                    @else
                    <h2>Solicitud de abono</h2>
                    @endif
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

                    <div class="ln_solid"></div>
                    
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <br><br>       
                            @if($payment->status->id == 3)
                            <form style="display:inline-block;float:left;" action="{{route('payment.update', [$payment->id])}}" method="POST">{{csrf_field()}}

                                <input name="_method" type="hidden" value="PATCH">
                                                
                                <input name="accion" type="hidden" value="aceptar">

                                <button type="submit" class="btn btn-success btn-md" data-toggle="tooltip" title="Aceptar!"><span class="glyphicon glyphicon-ok"></span>Aceptar
                                </button>

                            </form>

                            <a href="{{route('payment.edit',$payment['id'])}}"><button class="btn btn-danger">Rechazar</button></a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@stop