@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
<h1>Корзина</h1>

@if(empty(session('cart')))
<p>Корзина пуста. Вернитесь в <a href="{{ route('products.index') }}">каталог товаров</a>.</p>
@else
<table class="table table-striped">
    <thead>
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Общая стоимость</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @php
    $totalPrice = 0;
    @endphp
    @foreach(session('cart', []) as $productId => $item)
    <tr>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['price'] }} руб.</td>
        <td>{{ $item['quantity'] }}</td>
        <td>{{ $item['price'] * $item['quantity'] }} руб.</td>
        <td>
            <form action="{{ route('remove.from.cart', $productId) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
            </form>
        </td>
    </tr>
    @php
    $totalPrice += $item['price'] * $item['quantity'];
    @endphp
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3" class="text-right"><strong>Общая стоимость:</strong></td>
        <td><strong>{{ $totalPrice }} руб.</strong></td>
        <td>
            <a href="{{ route('checkout') }}" class="btn btn-success btn-sm">Оформить заказ</a>
            <form action="{{ route('clear.cart') }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-secondary btn-sm">Очистить корзину</button>
            </form>
        </td>
    </tr>
    </tfoot>
</table>
@endif
@endsection
