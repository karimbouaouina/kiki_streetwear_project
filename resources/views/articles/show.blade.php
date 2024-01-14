@extends('layouts.userLayout')

@push('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="container my-4">
    <div class="article-layout">
        @if ($article->image)
        <div class="user-article-image">
            <img class="card-img-top user-article-img" src="{{ asset($article->image->imageURL) }}"
                alt="{{ $article->image->imageALT }}">
        </div>
        @endif
        <div class="article-aside">
            <p class="article-subcategory">{{ $article->subcategory->subcategoryName }}</p>
            <h5 class="article-title">{{ $article->articleName }}</h5>
            <p class="article-description">{{ $article->description }}</p>
            <p class="article-description">Available Sizes: {{ $article->size->size }}</p>
            <p class="article-price">{{ $article->price }} TND</p>
            <form action="{{ route('cartitem.create', $article->articleID) }}" method="POST" class="article-actions">
                    @csrf
                    <div style="display:flex;align-items:center;border: 1px solid #ddd;">
                        <button type="button" style="background:white;border:0;height:37px;width:37px;outline:none; color: #DD492C; font-size: 20px; font-weight: 600; " onclick="decrement()">-</button>
                        <input type="number" name="quantity" id="quantity" min="1" style="width:37px;height:37px;color:#000;outline:none;text-align:center;" value="1" />
                        <button type="button" style="background:white;border:0;height:37px;width:37px;outline:none; color: #DD492C; font-size: 20px; font-weight: 600;" onclick="increment()">+</button>
                    </div>
                    <button type="submit" class="btn btn-danger" style="background-color:#E04A2D;border-color:#E04A2D;">Add to cart</button>
                </form>
        </div>
    </div>
</div>

<script>

function increment() {
    quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value) + 1;
}

function decrement(articleID) {
    quantityInput = document.getElementById('quantity' );
    if(quantityInput.value > 1){
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
}


</script>
@endsection