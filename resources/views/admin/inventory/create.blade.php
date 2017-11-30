@extends('layouts.master_admin')

@section('title')
@if (is_null($inventory))
    Agregar al inventario
@else
    Editar Inventario
@endif
@stop



@section('content')
@if (\Session::has('error'))
<div class="clearfix"></div>
<div class="alert alert-error">
    <p>{{ \Session::get('error') }}</p>
</div>
@endif

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
            @if (is_null($inventory))
                <h2>Agregar al Inventario</h2>
            @else
                <h2>Editar Inventario</h2>

            @endif
                <div class="clearfix"></div>
            </div>
        	<div class="x_content">
            	<br />
            @if (is_null($inventory))
                <form method="POST" action="{{route('inventory.store')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">{{csrf_field()}}
            @else
                <form method="POST" action="{{route('inventory.update', [$inventory->slug])}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">{{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
            @endif
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Producto<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="product">
                                <option value="0" selected>--Seleccione--</option>
                            @foreach($products as $product)
                                @if ($inventory)

                                    @if ($inventory->product->id == $product->id)
                                    <option value="{{ $product->id }}" selected>{{ $product->name }} {{ $product->brand }}</option>
                                    @else
                                    <option value="{{ $product->id }}">{{ $product->name }} {{ $product->brand }}</option>
                                    @endif
                                @else
                                    @if (old('product') == $product->id )
                                    <option selected value="{{ $product->id }}">{{ $product->name }} {{ $product->brand }}</option>
                                    @else
                                    <option value="{{ $product->id }}">{{ $product->name }} {{ $product->brand }}</option>
                                    @endif
                                @endif     

                            @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input id="quantity" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="quantity" @if (is_null($inventory)) value="{{old('quantity')}}" @else value="{{$inventory->quantity_available}}" @endif>
                        </div>
                        <div class="col-md-3 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="unit" style="text-align: center;">
                                <option value="0" selected style="text-align: center;">unidad</option>
                            @foreach($units as $unit)
                                @if ($inventory)
                                    @if ($inventory->unit->id == $unit->id)
                                    <option value="{{ $unit->id }}" selected>{{ $unit->name }}</option>
                                    @else
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endif
                                @else
                                    @if (old('unit') == $unit->id )
                                    <option selected value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @else
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endif
                                    
                                @endif    
                            @endforeach

                            </select>
                        </div>
                    </div>

                       
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="status">
                            <option value="0" selected>--Seleccione--</option>
                            @if(is_null($inventory))

                                @if(old('status') == 1)
                                <option value="1" selected>Disponible</option>
                                <option value="2">No Disponible</option>
                                @elseif(old('status') == 2)
                                <option value="1">Disponible</option>
                                <option value="2" selected>No Disponible </option>
                                @else
                                <option value="1">Disponible</option>
                                <option value="2">No Disponible</option> 
                                @endif                               
                            @else
                                @if($inventory->status->id == 1)
                                <option value="1" selected>Disponible</option>
                                <option value="2">No Disponible</option>
                                @elseif($inventory->status->id == 2)
                                <option value="1">Disponible</option>
                                <option value="2" selected>No Disponible </option> 
                                @endif
                            @endif             
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                      	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        	<button type="submit" class="btn btn-primary">@if (is_null($inventory)) Crear @else Actualizar @endif</button>
                      	</div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

	
@stop