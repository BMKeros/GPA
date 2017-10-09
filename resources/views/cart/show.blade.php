@extends('layouts.master')
@section('title')
    Carrito
@stop


@section('content')

   @foreach($cart as $item)
        <tr>
            <td><img src="{{ $item->image }}"></td><br>
            <td>Producto: {{ $item->name }}</td><br>
            <td>Precio: {{ number_format($item->price, 2) }}bs</td><br>
            <td>Cantidad: {{ $item->quantity }}</td><br>
            <td>Total: {{ number_format($item->price * $item->quantity, 2) }}</td>
        </tr><br><br>
    @endforeach

    @foreach($cart as $item)
        <tr>
            <td>user_id: {{ $item->user_id }}</td><br>
            <td>Producto_id: {{ $item->product_id }}</td><br>
            <td>Cantidad: {{ $item->quantity }}</td><br>
        </tr>
    @endforeach

@stop