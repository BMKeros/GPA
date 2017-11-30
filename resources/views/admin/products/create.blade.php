@extends('layouts.master_admin')
@section('title')
@if ($product == null)
    Nueva Producto
@else
    Editar Producto
@endif
@stop


@section('content')
<div class="clearfix"></div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong>
        <ul>
    @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
    @endforeach
        </ul>
    </div>
@endif
<div class="clearfix"></div>
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
                                    @if (old('category') == $category->id )
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>

                                    @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
       
                                @endif                               
                            @endforeach

                            </select>
                        </div>
                    </div>
               		<div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                   		</label>
                		<div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name" @if ($product == null) value="{{old('name')}}" @else value="{{$product->name}}" @endif>
               		 	</div>
               		</div>
               		<div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand">Marca<span class="required">*</span>
                      	</label>
               			
               			<div class="col-md-6 col-sm-6 col-xs-12">
                    		<input type="text" id="brand" name="brand" required="required" class="form-control col-md-7 col-xs-12" @if ($product == null) value="{{ old('brand')}}" @else value="{{$product->brand}}" @endif>
                		</div>
                	</div>

                    <div class="form-group">
                        <label for="price" class="control-label col-md-3 col-sm-3 col-xs-12">Precio<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="price" class="form-control col-md-7 col-xs-12" type="text" name="price" @if (is_null($product)) value="{{ old('price') }}"@else value="{{$product->price}}" @endif>
                        </div>
                    </div>
                    <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Porcentaje<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input id="precio-name" class="form-control col-md-7 col-xs-12" type="text" name="associated_percentage"  placeholder="Asociado" @if (is_null($product)) value="{{ old('associated_percentage') }}" @else value="{{$product->associated_percentage}}" @endif>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input id="precio-name" class="form-control col-md-7 col-xs-12" type="text" name="street_percentage" placeholder="Calle" @if (is_null($product)) value="{{ old('street_percentage') }}" @else value="{{$product->street_percentage}}" @endif>
                        </div>

                    </div>

                    <div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">imagen <span class="required">*</span>
                      	</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
                        	<input id="image" class="form-control" type="file" name="image" value="{{ old('image') }}">
                      	</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion <span class="required" for="description">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="description" required="required" class="form-control" name="description">@if (is_null($product)){{ old('description') }} @else {{$product->description}} @endif</textarea>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    
                    <div class="form-group">
                      	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        	<button type="submit" class="btn btn-success">@if (is_null($product)) Crear @else Guardar @endif</button>
                      	</div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

	
@stop