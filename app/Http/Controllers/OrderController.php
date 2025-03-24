<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Корзина пуста.');
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'total_price' => $totalPrice
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);

            $product = Product::find($productId);
            $product->update(['stock' => $product->stock - $item['quantity']]);
        }

        session()->forget('cart');
        return redirect()->route('orders.index')->with('success', 'Заказ успешно оформлен.');
    }

    public function index()
    {
        $orders = Order::with('products')->get();
        $totalOrdersPrice = $orders->sum('total_price');
        return view('orders.index', compact('orders', 'totalOrdersPrice'));
    }

    public function destroy($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->delete();
        return back()->with('success', 'Заказ удален.');
    }
}
