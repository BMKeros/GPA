@extends(\Auth::user()->hasRole('ADMIN') ? 'layouts.master_admin' :'layouts.master_user')

@section('title')
    Perfil
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
                            <h2>Editar Perfil</h2>
                                <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form id="demo-form2" data-parsley-validate class=" form-horizontal form-label-left" method="post"
                            action="{{action('ProfileController@update', $profile['id'])}}">
                                <input name="_method" type="hidden" value="PATCH">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Primer Nombre
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required"
                                        class="form-control col-md-7 col-xs-12" name="first_name" value="{{$profile->first_name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="second-name">Segundo Nombre
                                    <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="second-name" required="required"
                                        class="form-control col-md-7 col-xs-12" name="second_name" value="{{$profile->second_name}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-surname">Primer Apellido
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-surname" required="required"
                                        class="form-control col-md-7 col-xs-12" name="first_surname" value="{{$profile->first_surname}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="second-surname">Segundo
                                    Apellido <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="second-surname" required="required"
                                        class="form-control col-md-7 col-xs-12" name="second_surname" value="{{$profile->second_surname}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cedula">Cedula <span
                                        class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="cedula" required="required"
                                        class="form-control col-md-7 col-xs-12" name="cedula" value="{{$profile->cedula}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number-phone">Numero
                                    Telefonico <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="number-phone" required="required"
                                        class="form-control col-md-7 col-xs-12" name="number_phone" value="{{$profile->number_phone}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number-cellphone">Numero
                                    Celular <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="number-cellphone" required="required"
                                        class="form-control col-md-7 col-xs-12" name="number_cellphone" value="{{$profile->number_cellphone}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hobby">Hobby <span
                                    class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="hobby" required="required"
                                        class="form-control col-md-7 col-xs-12" name="hobby" value="{{$profile->hobby}}">
                                    </div>
                                </div>
                                @if(\Auth::user()->hasRole('ADMIN'))

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Rol<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <select class="select2_single form-control" tabindex="-1" name="rol">
                                                @foreach($roles as $rol)
                                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>

                                @endif
                                
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{action('ProfileController@show', $profile['id'])}}" class="btn btn-primary">Atras</a>	
                                        <button type="submit" class="btn btn-success">Actualizar</button>
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