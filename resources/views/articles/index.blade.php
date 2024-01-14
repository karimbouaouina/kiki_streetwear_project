@extends('layouts.userLayout')

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endpush

@section('content')
<div class="container my-4">
        
    <div class="row">
        @forelse ($articles as $article)
        <div class="col-md-4 mb-4 ">
            <div class="card h-100 position-relative" style="background-color:#FCEBE2;border-radius: 15px; box-shadow: 7px 1px 3px rgba(0,0,0,0.1);">
                <a href="{{ $article->image->imageURL }}" target="_blank" style="top: 5px;right:8px;position: absolute; z-index: 50;">
                    <img src="{{ asset('images/view.png') }}" alt="" width="25" />
                </a>
                @if ($article->image)
                <a href="{{ url('/articles', $article->articleID) }}">
                <img class="card-img-top" src="{{ asset($article->image->imageURL) }}" alt="{{ $article->image->imageALT }}"> </a>
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">{{ $article->articleName }}</h5>
                    <p style="text-align:center;">{{ $article->size->size }}</p>
                    <p style="text-align:center;">{{ $article->price }} TND</p>
                </div>
                <div class="card-footer bg-transparent" style="text-align:center;">
                <form action="{{ route('cartitem.create', $article->articleID) }}" method="POST" style="display:flex;flex-direction:column;align-items:center;">
                    @csrf
                    <div style="display:flex;align-items:center;height:37px;margin-bottom:20px;">
                        <button type="button" style="background:white;border:0;height:37px;width:37px;outline:none; color: #DD492C; font-size: 20px; font-weight: 600; " onclick="decrement({{ $article->articleID }})">-</button>
                        <input type="number" name="quantity" id="quantity{{ $article->articleID }}" min="1" style="width:37px;height:37px;color:#000;outline:none;text-align:center;" value="1" />
                        <button type="button" style="background:white;border:0;height:37px;width:37px;outline:none; color: #DD492C; font-size: 20px; font-weight: 600; " onclick="increment({{ $article->articleID }})">+</button>
                    </div>
                    <button type="submit" class="btn btn-danger" style="background-color:#E04A2D;border-color:#E04A2D;">Add to cart</button>
                </form>
            </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>No articles found in this subcategory.</p>
        </div>
        @endforelse
    </div>
</div>
<script>

function increment(articleID) {
    console.log(1);
    quantityInput = document.getElementById('quantity'+ articleID);
    quantityInput.value = parseInt(quantityInput.value) + 1;
}

function decrement(articleID) {
    quantityInput = document.getElementById('quantity' + articleID);
    if(quantityInput.value > 1){
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
}


</script>
@endsection
