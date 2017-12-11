@extends(\Auth::user()->hasRole('ADMIN') ? ' layouts.master_admin' : 'layouts.master_user')

@section('title') 
    Ordenes 
@stop 

@section('content')

    <div class="clearfix"></div>
    <div class="page-title">
        <div class="title_left">
            <h3>Ordenes</h3>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ordenes</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="row">
                        <div class="col-xs-12 table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>

                                        <th>Producto</th>

                                        <th>Precio</th>

                                        <th>Cantidad</th>

                                        <th>Subtotal</th>

                                        <th>Porcentaje</th>

                                        <th>MontoPorcentaje</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                        @foreach($orders as $order)
                                            <tr>
                                                <td><img style="width: 40px; height: 40px;" src="{{ asset('images/products/').'/'.$order->product->image }}" alt=""></td>

                                                <td>{{ $order->product->name}}</td>
                                                <td>{{ $order->product->price}}</td>
                                                <td>{{ $order->quantity}}</td>
                                                <td>{{ $order->get_unit_price()}}</td>
                                                @if(\Auth::user()->hasRole('SOCIO') == true)
                                                  <td>{{ $order->product->associated_percentage}}%</td>
                                                @else
                                                  <td>{{ $order->product->street_percentage}}%</td>
                                                @endif

                                                 <td>{{ $order->get_percentage_unit_price()}}</td>
                                            </tr>
                                        @endforeach
                                  
                                </tbody>
                            </table>
                               
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">

                        <div class="col-xs-12">
                            <h2>Detalles</h2>
                            <div class="clearfix"></div>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>  

                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                            

                                            <td>{{ $subtotal_ }} Bs</td>
                                            </tr>

                                            <tr>
                                                <th>Porcentaje: </th>

                                                <td>{{ $porcen}} Bs</td>
                                            </tr>

                                            <tr>
                                                <th>Total:</th>

                                                <td>{{ $precio_total }} Bs</td>
                                            </tr>
                                        
                                    </tbody>
                                </table>

                                

                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">

                        <div class="col-xs-12">
                            <h2>Abonos</h2>
                            <div class="clearfix"></div>

                            <div class="table-responsive">
                                <table class="table">
                                @if($total_payment != 0 )
                                    <thead> 
                                        <tr>
                                            <th>
                                                Monto
                                            </th>
                                            <th>
                                                Fecha
                                            </th>
                                        </tr>

                                    </thead>
                                @endif
                                    <tbody>

                                        @foreach($payments as $payment)

                                            <tr>
                                                <td>{{$payment->quantity}} Bs</td>
                                                <td>{{$payment->created_at->format('d/m/Y ')}}</td>
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <th>Total abonado:  {{$total_payment}} Bs de {{ $precio_total }} Bs</th>
                                            </tr>
                                    </tbody>
                                </table>

                                

                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                @if(\Auth::user()->hasRole('ADMIN') != 1)
                    <div class="row">

                        <div class="col-xs-12">
                                <a href="{{ route('purchase-requests.index')}}">
                                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"> Volver</button>
                                </a>
                                @if($total_payment == 0 || $total_payment != $precio_total)
                                <a href="{{route('payment.create', ['solicitud' => $request_id ])}}"><button class="btn btn-success pull-right">Abonar</button></a>
                                @endif
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@stop