<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заказов</title>
</head>
<body>
<h1>Список заказов</h1>
@if(session('success'))
<div>{{ session('success') }}</div>
@endif
<ul>
    @foreach($orders as $order)
    <li>
        Номер заказа: {{ $order->id }}<br>
        Дата заказа: {{ $order->created_at->format('d.m.Y H:i:s') }}<br>
        Товары: {{ implode(', ', $order->products->pluck('name')->toArray()) }}<br>
        Общая стоимость: {{ $order->total_price }} руб.<br>
        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить заказ</button>
        </form>
    </li>
    @endforeach
</ul>
<p>Итоговая стоимость всех заказов: {{ $totalOrdersPrice }} руб.</p>
</body>
</html>
