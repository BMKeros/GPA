@extends('layouts.master_admin')


@section('title')
Categorias
@stop

@section('head')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.css')}}"></script>
<script src="{{ asset('plugins/datatables/responsive.bootstrap.min.css')}}"></script>


@stop

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <h2>Categorias</h2>
                <a href="{{ route('categories.create') }}" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>  Nueva Categoria </a>
                <div class="x_content">
 
           			<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    	<thead>
                      	<tr>
                        	<th>Nombre</th>
                        	<th>Descripcion</th>
                        	<th>Accion</th>

                      	</tr>
                    	</thead>
                    	<tbody>
                   

							@foreach($categories as $category)
							<tr>
								<td>{{ $category->name }}</td>
								<td>{{ $category->description }}</td>
                        		<td>


		                        	<a href="{{route('categories.edit', [$category])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>

		                       		<form style="display: inline;" action="{{route('categories.destroy', [$category])}}" method="POST">{{csrf_field()}}
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
