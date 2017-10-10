@extends('layouts.master_user')
@section('title')
    Referidos
@stop


@section('content')

    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Relacion</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($referreds as $referred)
       
          <tr>
            <td>{{ $referred->name }}</td>
            <td>{{$referred->last_name}}</td>
            <td>{{$referred->phone_number}}</td>
            <td>{{$referred->relationship->name}}</td>
        
          </tr>
        
      @endforeach
    </tbody>
  </table>


@stop