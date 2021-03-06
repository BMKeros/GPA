@extends('layouts.master')

@section('menu')
    <li><a href="{{ route('user.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a>

    <li>
        <a>
            <i class="fa fa-users"></i>Referidos
            <span class="fa fa-chevron-down"></span>
        </a>
        <ul class="nav child_menu" style="display: none">
            <li>
                <a href="{{ route('referred.create') }}">Nuevo Referido</a>
            </li>
            <li>
                <a href="{{ route('referred.index') }}">Mis Referidos</a>
            </li>
        </ul>
    </li>
    <li><a href="{{ route('catalogue.index') }}"><i class="fa fa-briefcase"></i>Catalogo</a>
    <li><a href="{{ route('purchase-requests.index') }}"><i class="fa fa-book"></i>Solicitudes de Compra</a>
    <li><a href="{{ route('payment.index') }}"><i class="fa fa-money"></i>Abonos</a>
@endsection