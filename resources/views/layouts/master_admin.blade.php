@extends('layouts.master')

@section('menu')
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
    <li>
        <a href="{{ route('users.index') }}"> <i class="fa fa-users"></i> Usuarios</a>
    </li>
    <li>
	
        <a>
            <i class="fa fa-list-ul"></i>Productos <span class="fa fa-chevron-down"></span>
        </a>
        <ul class="nav child_menu" style="display: none">
            <li><a href="{{ route('categories.index') }}">Categorias</a></li>
            <li><a href="{{ route('products.index') }}">Productos</a></li>
            <li><a href="{{ route('inventory.index') }}">Inventario</a></li>
        </ul>
    </li>
    <li>
        <a>
            <i class="fa fa-book"></i>Solicitudes<span class="fa fa-chevron-down"></span>
        </a>
        <ul class="nav child_menu" style="display: none">
            <li><a href="{{ route('admin-purchase-requests.index') }}">Solicitudes de compras</a></li>
            <li><a href="{{ route('admin-payment.index') }}">Solicitudes de abonos</a></li>
        </ul>
    </li>
@endsection
