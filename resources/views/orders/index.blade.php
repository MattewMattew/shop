@extends('layouts.app')

@section('title', 'Список заказов')

@section('content')
<h1>Список заказов</h1>

@auth
<div>
    @if(count($orders) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Номер заказа</th>
            <th>Дата заказа</th>
            <th>Товары</th>
            <th>Общая стоимость</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->created_at->format('d.m.Y H:i:s') }}</td>
            <td>{{ implode(', ', $order->products->pluck('name')->toArray()) }}</td>
            <td>{{ $order->total_price }} руб.</td>
            <td>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <p>Итоговая стоимость всех заказов: {{ $totalOrdersPrice }} руб.</p>
    @else
    <p>У вас нет заказов.</p>
    @endif
</div>
@else
<p>Для просмотра заказов необходимо <a href="{{ route('login') }}">войти</a> или <a href="{{ route('register') }}">зарегистрироваться</a>.</p>
@endauth
@endsection
