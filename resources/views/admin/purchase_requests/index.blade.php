@extends('layouts.master_admin')
@section('title')
	Solicitudes
@stop

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    <br />
@endif

	<div class="row">
        <div class="col-md-12">
         	<div class="x_panel">
         		<h2>Solicitudes</h2>
         		
            	<div class="x_content">
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    	<thead>
                      	<tr>
                        	<th>Usuario</th>
                        	<th>Estado</th>
                        	<th>Descripcion</th>
                        	<th>Accion</th>

                      	</tr>
                    	</thead>
                    	<tbody>

                            @foreach($purchases as $purchase)

                                <tr>
                                    <td>{{ $purchase->user->name }}</td>

                                    <td style="text-align: center; width: 30%;">
                                        @if ($purchase->status->id == 3)
                                            <span class="btn btn-primary btn-xs" >Pendiente</span>
                                        @elseif($purchase->status->id == 4)
                                            <span class="btn btn-success btn-xs">Aceptado</span>
                                        @else
                                            <span class="btn btn-danger btn-xs">Rechazado</span>      
                                        @endif
                                    </td>

                                    <td>{{ $purchase->description }}</td>
                                    <td style="width: 30%;">

                                        <a href="{{route('admin-order.show',$purchase['id'])}}" class="btn btn-info btn-md" data-toggle="tooltip" title="Ver!"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        @if($purchase->status_id == '3')
                                    
                                            <form style="display:inline-block;float:left;" action="{{route('admin-purchase-requests.update', [$purchase->id])}}" method="POST">
                                                {{csrf_field()}}

                                                <input name="_method" type="hidden" value="PATCH">
                                                
                                                <input name="accion" type="hidden" value="aceptar">

                                                <button type="submit" class="btn btn-success btn-md" data-toggle="tooltip" title="Aceptar!"><span class="glyphicon glyphicon-ok"></span>
                                                </button>

                                            </form>

                                            <form style="display:inline-block;float:left;" action="{{route('admin-purchase-requests.update', [$purchase->id])}}" method="POST">
                                                {{csrf_field()}}

                                                <input name="_method" type="hidden" value="PATCH">

                                                <input name="accion" type="hidden" value="rechazar">
                                                
                                                <button type="submit" class="btn btn-danger btn-md" data-toggle="tooltip" title="Rechazar!"><span class="glyphicon glyphicon-remove"></span>
                                                </button>


                                            </form>

                                        @endif
                                        
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