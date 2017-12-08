@extends('layouts.master_user')

@section('title') 
    Carrito 
@stop 

@section('content')

    @php
        $cart = \Session::get('cart');

    @endphp

    <div class="clearfix"></div>
    <div class="page-title">
        <div class="title_left">
            <h3>Carrito de Compras</h3>
        </div>

        
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="x_panel">
                @if(count($cart)>0)
                    <p class="x_title text-center">
                        <a href="{{ route('cart.trash') }}" class="btn btn-danger text-center">
                            Vaciar carrito <i class="fa fa-trash"></i>
                        </a>
                    </p>
                @endif
                <div class="x_content">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12 table">
                            @if(count($cart)>0)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>

                                            <th>Producto</th>

                                            <th>Precio</th>

                                            <th>Cantidad</th>

                                            <th>Subtotal</th>

                                            <th>Quitar</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        
                                            @foreach($cart as $item)
                                                <tr>
                                                    <td><img style="width: 40px; height: 40px;" src="{{ asset('images/products/').'/'.$item->product->image }}" alt=""></td>
                                                    
                                                    <td>{{ $item->product->name }}</td>

                                                    <td>{{ number_format($item->product->price,2) }}</td>

                                                    <td>
                                                        <input 
                                                            type="number"
                                                            min="1"
                                                            max="100"
                                                            value="{{ $item->quantity }}"
                                                            id="product_{{ $item->product->id }}"
                                                            style="width: 80px;" 
                                                        >

                                                        <a 

                                                            class="btn btn-warning btn-update-item"
                                                            data-href="{{ route('cart.update', [$item->product->slug]) }}"
                                                            data-id ="{{ $item->product->id }}"
                                                            style="margin-right: -30px; margin-left: 5px;" 
                                                        >
                                                            <i class="fa fa-refresh"></i>
                                                        </a>

                                                    </td>

                                                    <td>{{ number_format($item->product->price * $item->quantity,2) }} Bs</td>
                                                
                                                    <td>
                                                        <a href="{{ route('cart.delete', [$item->product->slug]) }}" class="btn btn-danger">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">

                        <div class="col-xs-6 pull-right">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>

                                            <tr>
                                                <th>Total:</th>

                                                <td>{{ number_format($total) }} Bs</td>
                                            </tr>
                                        
                                    </tbody>
                                </table>
                            @endif

                            </div>
                        </div><!-- /.col -->
                            @if(count($cart)<1)
                                <h2 style="text-align: center;">
                                    No tiene ningun producto agregado al carrito
                                </h2> 
                            @endif
                    </div><!-- /.row -->

                    <hr>
                    <div class="row text-center">
                        <div class="col-12">
                            @if(count($cart)>0)
                            <a href="{{ route('purchase-requests.create')}}">
                                <button class="btn btn-success pull-right"> Enviar Solicitud de Compra</button>
                            </a>
                            @endif
                            <a href="{{ route('catalogue.index')}}">
                                <button class="btn btn-primary pull-right" style="margin-right: 5px;"> Volver</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop