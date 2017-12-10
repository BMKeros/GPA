@extends('layouts.master_admin')

@section('title')
Rechazar Abono
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

                <h2>Rechazar Abono</h2>

                <div class="clearfix"></div>
            </div>
        	<div class="x_content">
            	<br />
                <form method="POST" action="{{route('payment.update', [$payment->id])}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">{{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <h2 class="text-center"><b>Razón del rechazo:</b>
                        </h2>
                        
                        <div class="text-center">
                            <textarea name="rejected"  cols="80" rows="4" style="width:300px;height:80px;" value="hola"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                      	<div class="text-center">
                        	<button type="submit" class="btn btn-danger">Rechazar</button>
                      	</div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

	
@stop