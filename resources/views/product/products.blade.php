@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="container my-2">
                        <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Crear producto</a>
                        <!-- rest of the code -->
                    </div>
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Lista de productos') }}
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
                                <h6 class="card-subtitle text-muted">${{ $product->price }}</h6>
                                <div class="btn-group" role="group">
                                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary btn-sm mr-2">Editar</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
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