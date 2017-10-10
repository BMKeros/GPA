@extends('layouts.master_admin')


@section('title')
Inventory
@stop

@section('head')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.css')}}"></script>
<script src="{{ asset('plugins/datatables/responsive.bootstrap.min.css')}}"></script>

@stop

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <h2>Inventario</h2>
                <a href="{{ route('inventory.create') }}" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>Registrar Nuevo Producto en el Inventario </a>
                <div class="x_content">
 
           			<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    	<thead>
                      	<tr>
                        	<th>Nombre</th>
                        	<th>Marca</th>
                        	<th>Categoria</th>
                        	<th>Precio</th>
                        	<th>Existencia</th>
                            <th>Status</th>


                        	<th>Accion</th>

                      	</tr>
                    	</thead>
                    	<tbody>


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
