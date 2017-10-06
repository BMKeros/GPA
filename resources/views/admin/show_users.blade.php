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
		            <th>Name</th>
		            <th>Position</th>
		            <th>Office</th>
		            <th>Age</th>
		            <th>Start date</th>
		            <th>Salary</th>
	          	</tr>
	        </thead>

	        <tbody>
		        <tr>
	            	<td>Tiger Nixon</td>
	            	<td>System Architect</td>
	            	<td>Edinburgh</td>
	            	<td>61</td>
	            	<td>2011/04/25</td>
	            	<td>$320,800</td>
		        </tr>
	          	<tr>
	            	<td>Garrett Winters</td>
	            	<td>Accountant</td>
	            	<td>Tokyo</td>
	            	<td>63</td>
	            	<td>2011/07/25</td>
	            	<td>$170,750</td>
	          	</tr>
	          	<tr>
	            	<td>Ashton Cox</td>
	            	<td>Junior Technical Author</td>
	            	<td>San Francisco</td>
	            	<td>66</td>
	            	<td>2009/01/12</td>
	            	<td>$86,000</td>
	          	</tr>
	          	<tr>
	            	<td>Cedric Kelly</td>
	            	<td>Senior Javascript Developer</td>
	            	<td>Edinburgh</td>
	            	<td>22</td>
	            	<td>2012/03/29</td>
	            	<td>$433,060</td>
	          	</tr>
	          	<tr>
	            	<td>Airi Satou</td>
	            	<td>Accountant</td>
	            	<td>Tokyo</td>
	            	<td>33</td>
	            	<td>2008/11/28</td>
	            	<td>$162,700</td>
	          	</tr> 
	        </tbody>
      	</table>
   	</div>
@stop