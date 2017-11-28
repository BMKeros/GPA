@extends('layouts.master_user')


@section('title')
{{$inventory->product->name}} {{$inventory->product->brand}}
@stop

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              	<div class="x_title">
                	<h2>Producto </h2>
                	<div class="clearfix"></div>
               	</div>

                <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">
                    	<div class="product-image">
                      		<img src="{{ asset('images/products/').'/'.$inventory->product->image }}" alt="..." />
                    	</div>

                        <h4>Descripcion del producto :</h4>
                        <p style="width: 90%;">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.{{$inventory->product->description}}</p>
                  	</div>

                  	<div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                    	<h3 class="prod_title">{{ ucwords($inventory->product->name) }} {{ ucwords($inventory->product->brand) }} </h3>

                    	<div class="">
                      		<h2>Categoria : {{$inventory->product->category->name}}</h2>
                    	</div>                    

                    	<div class="">
                      		<h2>Cantidad disponible: {{$inventory->quantity_available}}</h2>
                    	</div>
                        <div class="">
                            <h2>Limite por asociado:</h2>
                            <span class="price-tax">{{$inventory->product->product_limit}}</span>
                        </div>
                    	<div class="">
                      		<div class="product_price">
                        		<h3 class="price" style="font-size:20px; color: #266BB9;"><b>Precio: {{ number_format($inventory->product->price,2) }} Bs<b></h3>
                        		<span class="price-tax">Asociado: {{ number_format($inventory->product->associated_percentage) }}%</span><br>
                        		<span class="price-tax">Calle: {{ number_format($inventory->product->street_percentage) }}%</span>
                        		<br>
                     		</div>
                    	</div>
                        <div class="">
                            <a href="{{ route('cart.add', [$inventory->slug, 'view' => 'product']) }}">
                                <button type="button" class="btn btn-default btn-lg" >Agregar al carrito</button>
                            </a>
                        </div>
                  	</div>   
                </div>
            </div>
        </div>
    </div>
</div>

@stop