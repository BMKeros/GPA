@extends('layouts.master')


@section('title')
Categories
@stop

@section('head')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.css')}}"></script>
<script src="{{ asset('plugins/datatables/responsive.bootstrap.min.css')}}"></script>

@stop

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <h2>Productos</h2>
                <a href="{{ route('products.create') }}" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>  Registrar Nuevo Producto </a>
                <div class="x_content">
 
           			<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    	<thead>
                      	<tr>
                        	<th>Nombre</th>
                        	<th>Marca</th>
                        	<th>Categoria</th>
                        	<th>Precio</th>
                        	<th>Cantidad</th>

                        	<th>Accion</th>

                      	</tr>
                    	</thead>
                    	<tbody>
                   
							@foreach($products as $product)
							<tr>
								<td>{{ $product->name }}</td>
								<td>{{ $product->brand }}</td>
								<td>{{ $product->categories->name }}</td>
								<td>{{ $product->price }}</td>
								<td>{{ $product->quantity }}</td>

                        		<td style="width: 30%;">


		                        	<a href="{{route('products.show',[$product->slug])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver </a>
		                        	<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
		                       		<form style="display: inline;" action="{{route('products.destroy', [$product])}}" method="POST">{{csrf_field()}}
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
