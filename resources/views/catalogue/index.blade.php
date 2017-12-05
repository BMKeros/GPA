@extends('layouts.master_user')

@section('title')
Catalogo
@stop

@section('content')

<div class="">
    <div class="clearfix"></div>
    <div class="page-title">
        <div class="title_left">
            <h3>Catalogo de Productos</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                            {{ $inventory->links() }}
                        </div>
                        <div class="clearfix"></div>

                        @if(count($inventory)<1)
                            <h2 style="text-align: center;">
                                No hay ningún producto en el catalogo.
                            </h2>
                        @else
                            @foreach($inventory as $product)

                                <div class="col-md-3">
                                    <p>Producto: {{ ucwords($product->product->name) }}</p>
                                    <div class="thumbnail" style="height: 5%; padding: 0;">
                                        <div class="image view view-first">
                                            <img style="width: 80%; height: 100%; margin: auto;" src="{{ asset('images/products/').'/'.$product->product->image }}" alt="image" />
                                            <div class="mask">
                                                <p>Producto {{ ucwords($product->product->name) }}</p>
                                                <div class="tools tools-bottom">
                                                    <a href="{{ route('catalogue.show',[$product->slug]) }}"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('cart.add',[$product->slug]) }}"><i class="fa fa-shopping-cart cart" style="margin-top:0; margin-bottom: 3px;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_price" style="margin: 0; padding: 0;">
                                            <h4>Marca: {{$product->product->brand}}</h4>
                                            <h4>Cantidad: {{$product->quantity_available}}{{$product->unit->abbreviation}}  </h4>
                                            <h4 class="price">Precio: {{ number_format($product->product->price,2) }}Bs</h4>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                                    {{ $inventory->links() }}
                                </div>
                            @endforeach
                        @endif
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
