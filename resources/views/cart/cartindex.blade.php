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
    @if (auth()->check())
        <div class="d-flex justify-content-end">
            <a href="{{ route('pay')}}" class="btn btn-primary">Proceder al pago</a>
        </div>
    @else
    <form method="POST" action="" class="mb-3">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="d-inline-flex">
                        <input type="email" name="email" class="form-control" id="email" style="width: 100%;" required>
                        <button type="submit" class="btn btn-primary ms-2">Proceder al pago</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @endif
   
</div>

@endsection