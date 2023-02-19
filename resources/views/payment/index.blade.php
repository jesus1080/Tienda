@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Registro de pedidos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Total</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $item)
                <tr>
                    @php
                        $data = json_decode($item->description, true);
                    @endphp
                
                    <td>
                    
                    @foreach ($data as $a) 
                        <p>{{$a['name']. '----precio: $ '. $a['price']}}</p>
                    @endforeach
                    
                    </td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at->format('d/m/Y')}}</td>
                    <td>
                        <form method="POST" action="{{ route('payments.update', $item->id) }}" >
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">DESPACHAR</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection