@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>
    <div>
        <p>Order ID: {{ $order->orderID }}</p>
        <p>User: {{ $order->user->firstName }} {{ $order->user->lastName }}</p>
        <p>Order Date: {{ $order->created_at->toFormattedDateString() }}</p>
        @if($order->cart)
            <h2>Cart Details:</h2>
            @foreach ($order->cart->details as $detail)
                <div>
                    <p>Article: {{ $detail->article->articleName }}</p>
                    <p>Size: {{ $detail->size->size }}</p>
                    <p>Color: {{ $detail->color->color }}</p>
                    <p>Quantity: {{ $detail->quantity }}</p>
                    <p>Price: {{ $detail->sellingPrice }} TND</p>
                </div>
            @endforeach
        @else
            <p>No cart details available.</p>
        @endif
    </div>
    <a href="{{ route('orders.index') }}">Back to Orders</a>
@endsection
