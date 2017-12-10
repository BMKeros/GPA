@extends('layouts.master_user')
@section('title')
Abonar Pedidos
@stop


@section('content')
@if (\Session::has('error'))
<div class="clearfix"></div>
<div class="alert alert-error">
    <strong>Error!</strong>
    <ul>
        <li>{{ \Session::get('error') }}</li>
    </ul>
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
                <h2>Abonar Compra</h2>

                <div class="clearfix"></div>
            </div>
        	<div class="x_content">
            	<br />
                <form method="POST" action="{{route('payment.store' )}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data"> {{csrf_field()}}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Metodo<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" name="method">
                                <option value="0" selected>--Seleccione--</option>
                            @foreach($methods as $method)

                                @if (old('method') == $method->id )
                                <option selected value="{{ $method->id }}">{{ $method->name }}</option>
                                @else
                                <option value="{{ $method->id }}">{{ $method->name }}</option>
                                @endif
   

                            @endforeach

                            </select>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="mount" class="control-label col-md-3 col-sm-3 col-xs-12">Monto<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input id="mount" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="mount" value ="{{old('mount')}}">
                        </div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Comprobante <span class="required">*</span>
                      	</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
                        	<input id="image" class="form-control" type="file" name="voucher">
                      	</div>
                    </div>
					<div class="form-group">
                        <label for="observacion" class="control-label col-md-3 col-sm-3 col-xs-12">Observacion<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            <input id="observacion" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="observation" value ="{{old('observation')}}">
                        </div>
                    </div>
                    <div class="form-group">
                      	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                            <input type="hidden" name="request_id" value="{{$request_id['solicitud']}}">
                        	<button type="submit" class="btn btn-primary"> Abonar </button>
                      	</div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
