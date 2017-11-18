@extends('layouts.master_user')
@section('title')
    Perfil
@stop


@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Nuevo Referido</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                          action="{{route('referred.store')}}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" required="required"
                                       class="form-control col-md-7 col-xs-12" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Apellido
                                <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last_name" required="required"
                                       class="form-control col-md-7 col-xs-12" name="last_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number-phone">Telefono
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="number-phone" required="required"
                                       class="form-control col-md-7 col-xs-12" name="phone_number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="relationship">Relacion<span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="relationship_id" class="select2_single form-control" tabindex="-1">
                                  <option value="1">Familiar</option>
                                  <option value="2">Amigo</option>
                                  <option value="3">Vecino</option>
                                </select>
                            </div>
                        </div>

                        
                       

                       
                        


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{url('client/dashboard')}}" class="btn btn-primary">Atras</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@stop