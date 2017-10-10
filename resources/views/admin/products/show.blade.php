@extends('layouts.master_admin')


@section('title')
{{$product->name}}
@stop

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              	<div class="x_title">
                	<h2>Producto {{$product->name}}</h2>
                	<div class="clearfix"></div>
               	</div>
                <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">
                    	<div class="product-image">
                      		<img src="{{ asset('images/products/').'/'.$product->image }}" alt="..." />
                    	</div>
                  	</div>

                  	<div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                    	<h3 class="prod_title">Producto {{$product->name}} </h3>

                    	<p>Descripcion del producto : Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.{{$product->description}}</p>
                    	<br />


                    	<div class="">
                      		<h2>Categoria : {{$product->category->name}}</h2>
                    	</div>                    

                    	<div class="">
                     		<h2>Marca:  {{$product->brand}}</h2>
                   		 </div>

                    	<div class="">
                      		<h2>Cantidad: {{$product->quantity}} {{$product->unit->abbreviation}}</h2>
                    	</div>

                    	<div class="">
                      		<h2>Cantidad disponible: {{$product->quantity_available}}</h2>
                    	</div>

                    	<div class="">
                      		<div class="product_price">
                        		<h1 class="price">Precio {{$product->price}}</h1>
                        		<span class="price-tax">asociado % {{$product->associated_percentage}}</span><br>
                        		<span class="price-tax">calle % {{$product->street_percentage}}</span>
                        		<br>
                     		 </div>
                    	</div>
                    	<div class="">
                      		<h2>Limite por asociado:</h2>
							<span class="price-tax">{{$product->product_limit}}</span>
                    	</div>
                  	</div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop