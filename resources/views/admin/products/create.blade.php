@extends('layouts.master')
@section('title')
new product
@stop


@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nuevo Producto</h2>
                <div class="clearfix"></div>
            </div>
        	<div class="x_content">
            	<br />
            	<form id="demo-form2" method="POST" action="{{route('products.store')}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data"> {{csrf_field()}}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="category">
                                <option value="0" selected>--Seleccione--</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>
               		<div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                   		</label>
                		<div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name">
               		 	</div>
               		</div>
               		<div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand">Marca<span class="required">*</span>
                      	</label>
               			
               			<div class="col-md-6 col-sm-6 col-xs-12">
                    		<input type="text" id="brand" name="brand" required="required" class="form-control col-md-7 col-xs-12">
                		</div>
                	</div>

                    <div class="form-group">
                        <label for="quantity" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input id="quantity" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="quantity">
                        </div>
                        <div class="col-md-3 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="units" style="text-align: center;">
                                <option value="0" selected style="text-align: center;">unidad</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label col-md-3 col-sm-3 col-xs-12">Precio<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="price" class="form-control col-md-7 col-xs-12" type="text" name="price">
                        </div>
                    </div>
                    <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Porcentaje<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input id="precio-name" class="form-control col-md-7 col-xs-12" type="number" name="associated_percentage"  placeholder="Asociado">
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input id="precio-name" class="form-control col-md-7 col-xs-12" type="number" name="street_percentage" placeholder="Calle">
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity_available">Cantidad disponible <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="quantity_available" class="form-control" required="required" type="text" name="quantity_available">
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
                            <textarea id="description" required="required" class="form-control" name="description"></textarea>
                        </div>
                    </div>

                    <br><br>
                    <div class="ln_solid"></div>
                    
                    <div class="form-group">
                      	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        	<button type="submit" class="btn btn-primary">Cancel</button>
                        	<button type="submit" class="btn btn-success">Submit</button>
                      	</div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

	
@stop