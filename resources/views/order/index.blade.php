@extends('layouts.master_user')

@section('title') 
    Carrito 
@stop 

@section('content')

    @php
        $cart = \Session::get('cart');
        $subtotal = 0;
        $porciento = 0;
        $porcentaje = 0;
        $total = 0;
    @endphp

    <div class="clearfix"></div>
    <div class="page-title">
        <div class="title_left">
            <h3>Solicitud de Compra</h3>
        </div>

        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pedidos</h2>
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
                                    </tr>
                                </thead>

                                <tbody>

                                    @if(count($cart)>0)
                                        @foreach($cart as $item)
                                            <tr>
                                                <td><img style="width: 40px; height: 40px;" src="{{ asset('images/products/').'/'.$item->product->image }}" alt=""></td>

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

                        <div class="col-xs-12">
                            <h2>Detalles</h2>
                            <div class="clearfix"></div>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                            @foreach($cart as $item)
                                                @php
                                                    $subtotal += $item->product->price * $item->quantity;
                                                    $porciento = $item->product->street_percentage;
                                                    $porcentaje = $subtotal * number_format($porciento)/100;

                                                @endphp
                                            @endforeach

                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                            

                                            <td>{{ number_format($subtotal,2) }} Bs</td>
                                            </tr>

                                            <tr>
                                                <th>Porcentaje Calle: {{ number_format($porciento) }}%</th>

                                                <td>{{ number_format($porcentaje,2) }} Bs</td>
                                            </tr>

                                            <tr>
                                                <th>Total:</th>

                                                <td>{{ number_format($subtotal + $porcentaje) }} Bs</td>
                                            </tr>
                                        
                                    </tbody>
                                </table>

                                

                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <form id="form-order" data-parsley-validate class="form-horizontal form-label-left" method="post"
                          action="{{route('order.store')}}">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h2>Descripcion</h2>
                                    <div class="clearfix"></div>
                                    <textarea id="description" class="form-control" name="description"></textarea>
                                </div>
                            </div>   
                        </div>

                        <div class="ln_solid"></div>

                        <div class="row">
                            <div class="col-12">

                                <button type="submit" class="btn btn-success pull-right"> Enviar Solicitud</button>

                                <a href="{{ route('cart.show')}}">
                                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"> Volver</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop