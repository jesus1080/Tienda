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
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $item)
                <tr>
                    @php
                        $data = json_encode($item->description);
                        $data2 = json_decode($data);
                        $data3 = json_decode($data2);
                        //dd($data3);
                     
                    @endphp
                
                    <td>
                    
                    @foreach ($data3 as $a) 
                        <p>{{$a}}</p>
                    @endforeach
                    
                    </td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->status }}</td>
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