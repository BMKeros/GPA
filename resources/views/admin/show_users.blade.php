@extends('layouts.master')

@section('title')
	Dashboard
@stop
{{-- items for sidenavbar --}}

@section('menu')

	<li>
		<a href="{{ route('users.index') }}"> <i class="fa fa-users"></i> Usuarios</a>
		<ul class="nav child_menu" style="display: none">
			<li>
				<a href="index.html">Dashboard</a>
			</li>
			<li>
				<a href="index2.html">Dashboard2</a>
			</li>
			<li>
				<a href="index3.html">Dashboard3</a>
			</li>
		</ul>
	</li>

@stop

@section('content')
	
	<div class="x_content">
		<p class="text-muted font-13 m-b-30">
        	Todo los usuarios registrados en el sistema
      	</p>
      	<table id="datatable" class="table table-striped table-bordered">
	        <thead>
	          	<tr>
		            <th>Nombre</th>
		            <th>Apellido</th>
		            <th>Telefono</th>
		            <th>Cedula</th>
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($profiles as $profile)
					
					<tr>
		            	<td>{{ $profile['first_name'] }}</td>
		            	<td>{{ $profile['second_surname'] }}</td>
		            	<td>{{ $profile['number_phone'] }}</td>
		            	<td>{{ $profile['cedula'] }}</td>
		        	</tr>

	        	@endforeach
		        
	        </tbody>
      	</table>
   	</div>
@stop