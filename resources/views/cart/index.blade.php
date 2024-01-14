@extends('layouts.userLayout')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cart.css') }}" />
@endsection

@section('content')
<div class="container my-4">
    <h1>Cart Items</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cartItems as $cartItem)
            <tr class="cart-item">
                    <td>
                        <div class="cart-item-info">
                            <img src="{{ $cartItem->article->image->imageURL }}" alt="" />
                            <p>{{ $cartItem->article->articleName }}</p>
                        </div>
                    </td>
                    <td><p>{{ $cartItem->quantity }}</p></td>
                    <td><p>{{ $cartItem->article->price * $cartItem->quantity }} TND</p></td>
                    <td> <form action="{{ route('cartitem.remove', [$cartItem->cartID, $cartItem->article->articleID]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cart-item-button">Remove</button>
                </form></td>
                </tr>

            @empty
            <td>Your cart is empty.</td>
            @endforelse
            
        </tbody>
        </table>
        @if (!empty($cartItems))
            <p style="align-self: flex-end;color: black;"><strong style="color: #DD492C;">Total:</strong> {{ $totalPrice }} TND</p>
            <a href="{{ route('orders.create') }}" class="order-button">Order</a>
        @else
            <button class="order-button" style="background-color: #dddddd; !important" disabled>Order</button>
        @endif
    </div>
</div>
@endsection
