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
                                    <td>{{ $purchase->status->name }}</td>
                                    <td>{{ $purchase->description }}</td>
                                    <td style="width: 30%;">

                                        <a style="display:inline-block;float:left;" href="{{ route('order.show', $purchase->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver </a>
                                        @if($purchase->status_id == '3')
                                    
                                            <form style="display:inline-block;float:left;" action="{{route('purchase-requests.update', [$purchase->id])}}" method="POST">
                                                {{csrf_field()}}

                                                <input name="_method" type="hidden" value="PATCH">
                                                
                                                <input name="accion" type="hidden" value="aceptar">

                                                <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-thumbs-up"></i> Aceptar
                                                </button>

                                            </form>

                                            <form style="display:inline-block;float:left;" action="{{route('purchase-requests.update', [$purchase->id])}}" method="POST">
                                                {{csrf_field()}}

                                                <input name="_method" type="hidden" value="PATCH">

                                                <input name="accion" type="hidden" value="rechazar">
                                                
                                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-thumbs-down"></i> Rechazar
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