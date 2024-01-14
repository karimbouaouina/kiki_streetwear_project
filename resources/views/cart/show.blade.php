@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cart Item Details</h1>
    <div>
        <p>User: {{ $cartItem->user->name }}</p>
        <ul>
            @foreach ($cartItem->articles as $article)
            <li>{{ $article->name }} - Quantity: {{ $article->pivot->quantity }}</li>
            @endforeach
        </ul>
        <a href="{{ route('cart.edit', $cartItem->id) }}">Edit</a>
        <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('cart.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection
