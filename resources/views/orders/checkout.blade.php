<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
</head>
<body>
<h1>Оформление заказа</h1>
@if(session('error'))
<div>{{ session('error') }}</div>
@endif
<ul>
    @php
    $totalPrice = 0;
    @endphp
    @foreach(session('cart', []) as $productId => $item)
    <li>
        {{ $item['name'] }} - {{ $item['quantity'] }} шт. x {{ $item['price'] }} руб. = {{ $item['quantity'] * $item['price'] }} руб.
        @php
        $totalPrice += $item['quantity'] * $item['price'];
        @endphp
    </li>
    @endforeach
</ul>
<p>Общая стоимость: {{ $totalPrice }} руб.</p>
<form action="{{ route('checkout') }}" method="POST">
    @csrf
    <button type="submit">Оформить заказ</button>
</form>
</body>
</html>
