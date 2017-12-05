@extends('layouts.master_admin')


@section('title')
Inventory
@stop

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
            <h2>Inventario</h2>
                <a href="{{ route('inventory.create') }}" class="btn btn-info btn-md"><i class="fa fa-plus"></i>  Registrar Nuevo Producto en el Inventario </a>
                <div class="x_content">
 
           			<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    	<thead>
                      	<tr>
                        	<th>Nombre</th>
                        	<th>Marca</th>
                        	<th>Cantidad Disponible</th>
                            <th>Status</th>
                        	<th>Accion</th>

                      	</tr>
                    	</thead>
                    	<tbody>

                            @foreach($inventory as $product)
                            <tr>
                                <td>{{ $product->product->name }}</td>
                                <td>{{ $product->product->brand }}</td>
                                <td>{{ $product->quantity_available }} {{$product->unit->name}}</td>
                                <td>{{ $product->status->name }}</td>

                                <td style="width: 30%;">

                                    <a href="{{route('inventory.edit', [$product->slug])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                                    <form style="display: inline;" action="{{route('inventory.destroy', [$product->slug])}}" method="POST">{{csrf_field()}}
                                        <input type="hidden" name="_method" value="Delete">
                                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar
                                            
                                        </button>
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
