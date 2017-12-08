@extends('layouts.master_user')

@section('title') 
    Carrito 
@stop 

@section('content')

    @section('head')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.css')}}"></script>
    <script src="{{ asset('plugins/datatables/responsive.bootstrap.min.css')}}"></script>

    @stop

    @section('content')
    @if (\Session::has('success'))
    <div class="clearfix"></div>
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    <div class="clearfix"></div>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <h2>Solicitudes de Compra</h2>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Descripción</th>
                                <th>Orden</th>
                            </tr>
                            </thead>
                            <tbody>
                       
                                @foreach($purchase_requests as $purchase_request)
                                <tr>
                                    <td>{{ $purchase_request->status->name }}</td>
                                    <td>{{ $purchase_request->description }}</td>

                                    <td style="width: 30%;">


                                        <a href="{{route('order.show',$purchase_request['id'])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

             
                    </div>
            </div>
       </div>     
    </div> 

    @stop

    @section('script')
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>




     
        <script type="text/javascript">
            $(document).ready(function() {

                $('#datatable-responsive').DataTable();

            });
        </script>
    @stop