@extends('layouts.app')

@section('title', 'Каталог товаров')

@section('content')
<h1>Каталог товаров</h1>
<a href="{{ route('cart.show') }}" class="btn btn-primary mb-4">Перейти к корзине</a>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Цена: {{ $product->price }} руб.</p>
                <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="quantity">Количество:</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить в корзину</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
