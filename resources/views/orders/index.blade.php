@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/orders-list.css') }}" />
@endsection

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">Orders</h2>
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Cart Details</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->orderID }}</td>
                    <td>{{ $order->user->firstName }} {{ $order->user->lastName }}</td>
                    <td>
                        @foreach($order->cartItems as $cartItem)
                                <div class="cart-item">
                                    <p>Article: {{ $cartItem->article->articleName }}</p>
                                    <p>Size: {{ $cartItem->article->size->size }}</p>
                                    <p>Color: {{ $cartItem->article->color->color }}</p>
                                    <p>Quantity: {{ $cartItem->quantity }}</p>
                                    <p>Price: {{ number_format($cartItem->article->price, 2) }} TND</p>
                                </div>
                        @endforeach
                    </td>
                    <td>

                    <form action="{{ route('orders.destroy', $order->orderID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="background-color:#E04A2D;border-color:#E04A2D;" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
