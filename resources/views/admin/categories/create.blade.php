@extends('layouts.master_admin')

@section('title')
@if ($category == null)
    Nueva categoria
@else
    Editar categoria
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
            @if ($category == null)
                <h2>Nueva Categoria</h2>
            @else
                <h2>Editar Categoria {{$category->name}} </h2>
            @endif
                <div class="clearfix"></div>
            </div>
        	<div class="x_content">
            	<br />
            @if ($category == null)
                <form method="POST" action="{{route('categories.store')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">{{csrf_field()}}
            @else
                <form method="POST" action="{{route('categories.update', [$category])}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">{{csrf_field()}}

                <input type="hidden" name="_method" value="PUT">

            @endif


               		<div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
                   		</label>
                		<div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="name" value="@if ($category == null) {{ old('name') }} @else {{$category->name}} @endif">
               		 	</div>
               		</div>
               		<div class="form-group">
                    	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripcion <span class="required">*</span>
                      	</label>
               			
               			<div class="col-md-6 col-sm-6 col-xs-12">
                    		<input type="text" id="last-name" name="description" required="required" class="form-control col-md-7 col-xs-12" value="@if ($category == null) {{ old('description') }} @else {{$category->description}} @endif">
                		</div>
                	</div>
                    <div class="form-group">
                      	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        	<button type="submit" class="btn btn-primary">@if ($category == null) Crear @else Guardar @endif</button>
                      	</div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

	
@stop