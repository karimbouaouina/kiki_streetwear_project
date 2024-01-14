@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <h2 style="color:#DD492C !important">Edit Cart Item</h2>

            <form action="{{ route('cart.update', $cartItem->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')

                @foreach ($cartItem->articles as $article)
                <div class="form__field">
                    <label>Article ({{ $article->name }}):</label>
                    <input type="number" name="articles[{{ $article->id }}][quantity]" value="{{ $article->pivot->quantity }}" min="1" required>
                </div>
                @endforeach

                <div class="form__field">
                    <input type="submit" value="Update Cart">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
