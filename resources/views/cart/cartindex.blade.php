@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Carrito de compras</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->subtotal }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <a href="#" class="btn btn-primary">Proceder al pago</a>
    </div>
</div>











@endsection