<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
</head>
<body>
<h1>Каталог товаров</h1>
@if(session('success'))
<div>{{ session('success') }}</div>
@endif
@foreach($products as $product)
<div>
    <h2>{{ $product->name }}</h2>
    <p>Цена: {{ $product->price }} руб.</p>
    <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
        @csrf
        <label for="quantity">Количество:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1">
        <button type="submit">Добавить в корзину</button>
    </form>
</div>
@endforeach
</body>
</html>
