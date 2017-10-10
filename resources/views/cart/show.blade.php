@extends('layouts.master') 

@section('title') 
    Carrito 
@stop 

@section('content')

@php
    $cart = \Session::get('cart');
    $user = "";
    $subtotal = 0;
    $porciento = 0;
    $porcentaje = 0;
    $total = 0;
@endphp

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos del carrito</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <!-- title row -->

                    <div class="row">
                        <div class="col-xs-12 invoice-header">
                            <h1>Invoice. <small class="pull-right">Date:
                            16/08/2016</small></h1>
                        </div><!-- /.col -->
                    </div><!-- info row -->

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            De
                            <address>
                                <strong>A.C Bmkeros R.L</strong><br />
                                795 Freedom Ave, Suite 600<br />
                                New York, CA 94107<br />
                                Phone: 1 (804) 123-9876<br />
                                Email: ironadmin.com
                            </address>
                        </div><!-- /.col -->

                        <div class="col-sm-4 invoice-col">
                            Para

                            @foreach($cart as $item)
                                @php
                                    $user = $item->user->name;
                                @endphp
                            @endforeach

                            <address>
                                <strong>{{ $user }}</strong><br />
                                795 Freedom Ave, Suite 600<br />
                                New York, CA 94107<br />
                                Phone: 1 (804) 123-9876<br />
                                Email: jon@ironadmin.com
                            </address>
                        </div><!-- /.col -->

                        <div class="col-sm-4 invoice-col">
                            <b>Pedido #007612</b><br />
                            <br />
                            <b>Order ID:</b> 4F3S8J<br />
                            <b>Payment Due:</b> 2/22/2014<br />
                            <b>Account:</b> 968-34567
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- Table row -->

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
                                    </tr>
                                </thead>

                                <tbody>

                                    @if(count($cart)>0)
                                        @foreach($cart as $item)
                                            <tr>
                                                <td><img src="{{ $item->product->image }}" alt=""></td>

                                                <td>{{ $item->product->name }}</td>

                                                <td>{{ number_format($item->product->price,2) }}</td>

                                                <td>{{ $item->quantity }}</td>

                                                <td>{{ number_format($item->product->price * $item->quantity,2) }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                                @if(count($cart)<1)
                                    <p style="text-align: center;">
                                        No tiene ningun producto agregado al carrito
                                    </p>
                                @endif
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->

                        <div class="col-xs-6">
                            <p class="lead">Payment Methods:</p><img src=
                            "images/visa.png" alt="Visa" /> <img src=
                            "images/mastercard.png" alt="Mastercard" /> <img src=
                            "images/american-express.png" alt="American Express" />
                            <img src="images/paypal2.png" alt="Paypal" />

                            <p class="text-muted well well-sm no-shadow" style=
                            "margin-top: 10px;">Etsy doostang zoodles disqus groupon
                            greplin oooj voxy zoodles, weebly ning heekya handango imeem
                            plugg dopplr jibjab, movity jajah plickers sifteo edmodo
                            ifttt zimbra.</p>
                        </div><!-- /.col -->

                        <div class="col-xs-6">
                            <p class="lead">Amount Due 2/22/2014</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                            @foreach($cart as $item)
                                                @php
                                                    $subtotal += $item->product->price * $item->quantity;
                                                    $porciento = $item->product->street_percentage;
                                                    $porcentaje = $subtotal * number_format($porciento)/100;
                                                    $total = number_format($subtotal + $porcentaje,2);

                                                @endphp
                                            @endforeach

                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                            

                                            <td>{{ number_format($subtotal,2) }}</td>
                                            </tr>

                                            <tr>
                                                <th>Porcentaje {{ number_format($porciento) }}%</th>

                                                <td>{{ number_format($porcentaje,2) }}</td>
                                            </tr>

                                            <tr>
                                                <th>Total:</th>

                                                <td>{{ $total }}</td>
                                            </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <!-- this row will not appear when printing -->

                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick=
                            "window.print();">Print</button> <button class=
                            "btn btn-success pull-right"> Submit Payment</button>
                            <button class="btn btn-primary pull-right" style=
                            "margin-right: 5px;"> Generate PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop