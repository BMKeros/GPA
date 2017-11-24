@extends('layouts.master_admin')

@section('title')
    Registro
@stop

@section('content')
    
 <div class="container">
    <div class="clearfix"></div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Registrar usuario</h2>
                                <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form id="demo-form2" data-parsley-validate class=" form-horizontal form-label-left" method="POST"
                            action="{{ route('users.store') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de usuario
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" required="required"
                                        class="form-control col-md-7 col-xs-12" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email 
                                    <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" required="required"
                                        class="form-control col-md-7 col-xs-12" name="email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Contraseña
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="password" required="required"
                                        class="form-control col-md-7 col-xs-12" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">Repita la contraseña <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="password_confirmation" required="required"
                                        class="form-control col-md-7 col-xs-12" name="password_confirmation">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Regitrar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    @stop