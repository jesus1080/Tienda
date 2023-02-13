@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('cart.index') }}" class="btn btn-primary">
                            Carrito de compras
                        </a>
                    </div>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!Estoy aqui') }}
                </div>
                <div class="container">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="card mb-3">
                            <img src="{{ URL::asset(str_replace('\\', '/', 'uploads/products/ ' . $product->image_url)) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <h6 class="card-subtitle text-muted">{{ $product->price }}</h6>
                                <a href="{{route('addToCart', $product->id)}}" class="btn btn-primary">Add to Cart</a>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
