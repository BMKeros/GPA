@extends('layouts.master_admin')
@section('title')
@if ($product == null)
    Nueva Producto
@else
    Editar Producto
@endif
@stop


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            @if ($product == null)
                <h2>Nuevo Producto</h2>
            @else
                <h2>Editar Producto {{$product->name}} </h2>
            @endif
                <div class="clearfix"></div>
            </div>
        	<div class="x_content">
            	<br />
            @if ($product == null)
            	<form id="demo-form2" method="POST" action="{{route('products.store')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data"> {{csrf_field()}}
            @else
                <form method="POST" action="{{route('products.update', [$product->slug])}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">{{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">

            @endif
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="category">
                                <option value="0" selected>--Seleccione--</option>
                            @foreach($categories as $category)
                                @if ($product)

                                    @if ($product->category->id == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    
                                @endif                               
                            @endforeach

                            </select>
                        </div>
                    </div>
               		<div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                   		</label>
                		<div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name" value="@if ($product == null) @else {{$product->name}} @endif">
               		 	</div>
               		</div>
               		<div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand">Marca<span class="required">*</span>
                      	</label>
               			
               			<div class="col-md-6 col-sm-6 col-xs-12">
                    		<input type="text" id="brand" name="brand" required="required" class="form-control col-md-7 col-xs-12" value="@if ($product == null) @else {{$product->brand}} @endif">
                		</div>
                	</div>

                    <div class="form-group">
                        <label for="price" class="control-label col-md-3 col-sm-3 col-xs-12">Precio<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="price" class="form-control col-md-7 col-xs-12" type="text" name="price" value="@if (is_null($product)) @else {{$product->price}} @endif">
                        </div>
                    </div>
                    <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Porcentaje<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input id="precio-name" class="form-control col-md-7 col-xs-12" type="text" name="associated_percentage"  placeholder="Asociado" value="@if (is_null($product)) @else {{$product->associated_percentage}} @endif">
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input id="precio-name" class="form-control col-md-7 col-xs-12" type="text" name="street_percentage" placeholder="Calle" value="@if (is_null($product)) @else {{$product->street_percentage}} @endif">
                        </div>

                    </div>

                    <div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">imagen <span class="required">*</span>
                      	</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
                        	<input id="image" class="form-control" type="file" name="image">
                      	</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion <span class="required" for="description">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="description" required="required" class="form-control" name="description">@if (is_null($product)) @else {{$product->description}} @endif</textarea>
                        </div>
                    </div>

                    <br><br>
                    <div class="ln_solid"></div>
                    
                    <div class="form-group">
                      	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        	<button type="submit" class="btn btn-success">@if (is_null($product)) Crear @else Guardar @endif</button>
                      	</div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

	
@stop