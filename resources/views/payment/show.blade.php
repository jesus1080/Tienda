@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Comprobante de pago</div>

                <div class="card-body">
                    <p>Nombre del cliente: {{ $payment->user->name }}</p>
                    <p>Total a pagar: {{ $payment->amount }}</p>

                    @php
                        $data = json_decode($payment->description, true);
                    @endphp
                    <p>Descripción: </p>
                    @foreach ($data as $a) 
                        <p>{{$a['name']. '----precio: $ '. $a['price']}}</p>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <a href="{{ url('/home') }}" class="btn btn-primary">Regresar a home</a>
    </div>
</div>
@endsection
