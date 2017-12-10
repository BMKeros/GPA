@extends('layouts.master_user')

@section('title') 
    Solicitudes 
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

                                        <a href="{{route('order.show',$purchase_request['id'])}}" class="btn btn-info btn-md" data-toggle="tooltip" title="Ver!"><span class="glyphicon glyphicon-eye-open"></span></a>

                                        @if($purchase_request->status->id == 4)
                                        <a href="{{route('payment.create', ['solicitud' => $purchase_request['id']])}}" class="btn btn-danger btn-md" data-toggle="tooltip" title="Abonar!"> <span class="glyphicon glyphicon-piggy-bank"></span></a>
                                        @elseif ($purchase_request->status->id == 6)
                                        <span class="btn btn-danger btn-md" style="cursor: none;">Pagado</span>
                                        @endif
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



        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
     
        <script type="text/javascript">
            $(document).ready(function() {

                $('#datatable-responsive').DataTable();

            });
        </script>
    @stop
