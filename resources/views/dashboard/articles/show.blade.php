@extends('layouts.app')

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background-color:#FCEBE2;">
                    @if ($article->image)
                        <img class="card-img-top article-image" src="{{ asset($article->image->imageURL) }}" alt="{{ $article->image->imageALT }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center;">{{ $article->articleName }}</h5>
                        <p class="card-text">
                            Description: {{ $article->description }}<br>
                            Price: {{ $article->price }}<br>
                            Quantity: {{ $article->quantity }}<br>
                            Status: {{ $article->status }}<br>
                            Size: {{ $article->size->size ?? 'N/A' }}<br> 
                            Color: {{ $article->color->color ?? 'N/A' }}<br> 
                            Subcategory: {{ $article->subcategory->subcategoryName }}<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
