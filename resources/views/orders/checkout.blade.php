@extends('layouts.app')

@section('title', 'Оформление заказа')

@section('content')
<h1>Оформление заказа</h1>
@auth
@if(!empty(session('cart')))
<ul class="list-group mb-3">
    @php
    $totalPrice = 0;
    @endphp
    @foreach(session('cart', []) as $productId => $item)
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0">{{ $item['name'] }}</h6>
            <small class="text-muted">{{ $item['quantity'] }} шт. x {{ $item['price'] }} руб.</small>
        </div>
        <span class="text-muted">{{ $item['quantity'] * $item['price'] }} руб.</span>
        @php
        $totalPrice += $item['quantity'] * $item['price'];
        @endphp
    </li>
    @endforeach
    <li class="list-group-item d-flex justify-content-between">
        <span>Общая стоимость</span>
        <strong>{{ $totalPrice }} руб.</strong>
    </li>
</ul>
<form action="{{ route('checkout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success btn-block">Оформить заказ</button>
</form>
@else
<p>Корзина пуста. Вернитесь в <a href="{{ route('products.index') }}">каталог товаров</a>.</p>
@endif
@else
<p>Для оформления заказа необходимо <a href="{{ route('login') }}">войти</a> или <a href="{{ route('register') }}">зарегистрироваться</a>.</p>
@endauth
@endsection
