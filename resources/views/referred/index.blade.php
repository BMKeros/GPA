@extends('layouts.master_user')
@section('title')
    Referidos
@stop


@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Referidos</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
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
                    @forelse($referreds as $referred)
                     
                        <tr>
                          <td>{{ $referred->name }}</td>
                          <td>{{$referred->last_name}}</td>
                          <td>{{$referred->phone_number}}</td>
                          <td>{{$referred->relationship->name}}</td>
                       
                        </tr>

                        @empty
                          <tr>
                            <td colspan="4"><h4 align="center">USTED NO POSEE REFERIDOS REGISTRADOS</h4></td>
                          </tr>
                                      
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>

@stop