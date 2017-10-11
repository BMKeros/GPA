@extends('layouts.master_user')


@section('title')
Catalogo
@stop


@section('content')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Catalogo de Productos</h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                            <ul class="pagination pagination-split">
                                <li><a href="#">A</a>
                                </li>
                                <li><a href="#">B</a>
                                </li>
                                <li><a href="#">C</a>
                                </li>
                                <li><a href="#">D</a>
                                </li>
                                <li><a href="#">E</a>
                                </li>
                                <li>...</li>
                                <li><a href="#">W</a>
                                </li>
                                <li><a href="#">X</a>
                                </li>
                                <li><a href="#">Y</a>
                                </li>
                                <li><a href="#">Z</a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>

                        @foreach($products as $product)
                        <div class="col-md-3">
                            <p>Producto: {{$product->name}}  </p>
                            <div class="thumbnail" style="height: 5%; padding: 0;">
                                <div class="image view view-first">
                                    <img style="width: 80%; height: 100%; margin: auto;" src="{{ asset('images/products/').'/'.$product->image }}" alt="image" />
                                    <div class="mask">
                                        <p>Producto {{$product->name}}</p>
                                        <div class="tools tools-bottom">
                                            <a href="{{ route('catalogue.show',[$product->slug]) }}"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('cart.add',[$product->slug]) }}"><i class="fa fa-shopping-cart cart" style="margin-top:0; margin-bottom: 3px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_price" style="margin: 0; padding: 0;">

                                    <h4>Marca: {{$product->brand}}</h4>
                                    <h4>Cantidad: {{$product->quantity}}{{$product->unit->abbreviation}}  </h4>
                                    <h4 class="price">Precio: {{$product->price}}Bs</h4>
                                </div>

                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
