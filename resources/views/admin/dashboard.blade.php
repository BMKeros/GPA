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