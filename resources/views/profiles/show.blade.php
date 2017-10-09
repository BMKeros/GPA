@extends('layouts.master')
@section('title')
    Perfil
@stop


@section('content')

    <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    
      <tr>
        <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>        
      </tr>
    
    <tbody>
      <tr>
        <td>{{$profile->first_name}}</td>
        <td>{{$profile->second_name}}</td>
        <td>{{$profile->first_surname}}</td>
        <td>{{$profile->second_surname}}</td>
      </tr>
     
    </tbody>
  </table>

    <table class="table table-striped">
    
      <tr>
        <th>Cedula</th>
        <th>Numero Telefonico</th>
        <th>Numero Celular</th>
        <th>Hobby</th>        
      </tr>
    
    <tbody>
      <tr>
        <td>{{$profile->cedula}}</td>
        <td>    {{$profile->number_phone}}</td>
        <td>{{$profile->number_cellphone}}</td>
        <td>{{$profile->hobby}}</td>
      </tr>
     
    </tbody>
  </table>

   <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-11">
                               <a href="{{action('ProfileController@edit', $profile['id'])}}" class="btn btn-primary">Editar</a> 
                            </div>
                        </div>
  
        
  </div>
  </body>


@stop