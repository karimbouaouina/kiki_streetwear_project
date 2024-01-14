@extends('layouts.userLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/orders-list.css') }}" />
@endsection

@section('content')
<div class="container my-4">
    <h1>Orders</h1>
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Cart Details</th>
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
                                    <p>Price: {{ number_format($cartItem->article->price * $cartItem->quantity, 2) }} TND</p>
                                </div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection
