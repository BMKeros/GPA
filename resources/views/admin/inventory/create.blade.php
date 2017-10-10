@extends('layouts.master_admin')

@section('title')
    Add Inventory
@stop


@section('content')

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Agregar al Inventario</h2>
                <div class="clearfix"></div>
            </div>
        	<div class="x_content">
            	<br />
                <form method="POST" action="{{route('inventory.store')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">{{csrf_field()}}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Producto<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="product">
                                <option value="0" selected>--Seleccione--</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} {{ $product->brand }} {{ $product->quantity }} {{ $product->unit->abbreviation }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>

               		<div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Existencia<span class="required">*</span>
                   		</label>
                		<div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="name" value="">
               		 	</div>
               		</div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="product">
                                <option value="0" selected>--Seleccione--</option>
                                <option value="0" selected>Disponible o Activo</option>
                                <option value="0" selected>No Disponible o Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                      	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                        	<button type="submit" class="btn btn-primary">Crear</button>
                      	</div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

	
@stop