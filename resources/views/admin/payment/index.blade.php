@extends('layouts.master_admin')

@section('title') 
    Solicitudes de Abonos 
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
                <h2>Solicitudes de Abonos</h2>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="text-align: center; width: 20%;">Usuario</th>
                                <th style="text-align: center; width: 20%;">Estado</th>
                                <th style="text-align: center; width: 20%;">Monto</th>
                                <th style="text-align: center; width: 20%;">Fecha</th>
                                <th style="text-align: center; width: 20%;">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td style="text-align: center;">
                                        {{$payment->user->name}}
                                    </td>
                                    <td style="text-align: center;">
                                    @if ($payment->status->id == 3)
                                    <span class="btn btn-primary btn-xs" >Pendiente</span>
                                    @elseif($payment->status->id == 4)
                                    <span class="btn btn-success btn-xs">Aceptado</span>
                                    @else
                                    <span class="btn btn-danger btn-xs">Rechazado</span>      
                                    @endif
                                    </td>
                                    <td style="text-align: center;" >{{ $payment->quantity }} Bs</td>

                                    <td style="text-align: center;">
                                        {{$payment->created_at->format('d-m-Y')}}
                                    </td>

                                    <td style="text-align: center; width: 30%;">

                                        <a href="{{route('payment.show',$payment['id'])}}" class="btn btn-info btn-md" data-toggle="tooltip" title="Ver!" style="margin-left: 5%;"><span class="glyphicon glyphicon-eye-open"></span></a>

                                        @if($payment->status->id == 3)
                                        <form style="display:inline !important;" action="{{route('payment.update', [$payment->id])}}" method="POST">{{csrf_field()}}

                                            <input name="_method" type="hidden" value="PATCH">
                                                
                                            <input name="accion" type="hidden" value="aceptar">

                                            <button type="submit" class="btn btn-success btn-md" data-toggle="tooltip" title="Aceptar!"><span class="glyphicon glyphicon-ok"></span>
                                            </button>

                                        </form>

                                        <a href="{{route('payment.edit',$payment['id'])}}" class="btn btn-danger btn-md" data-toggle="tooltip" title="Rechazar!"><span class="glyphicon glyphicon-remove"></span></a>
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
        <style type="text/css">
            .clearfix::after, form::after{
                content: ".";
                display: inline-block;
                height: 0;
                clear: both;
                visibility: hidden;
            }
        </style>
    @stop
