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
                    <h2>Orden</h2>
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
                      <th>Precio</th>
                      <th>Producto</th>
                      <th>Cantidad</th>

                    </tr>
                  </thead>
                  <tbody>

                        
                      @foreach($orders as $order)
                        <tr>
                          <td>{{ $order->price}}</td>
                          <td>{{ $order->product->name}}</td>
                          <td>{{ $order->quantity}}</td>
                        </tr>  
                      @endforeach
                                            
                                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>

@stop