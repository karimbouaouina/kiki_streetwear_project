@extends('layouts.app')

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">{{ $subcategory->subcategoryName }}</h2>
    <div class="row">
        @forelse ($subcategory->articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card h-100" style="background-color:#FCEBE2;">
                    @if ($article->image)
                        <img class="card-img-top" src="{{ asset($article->image->imageURL) }}" alt="{{ $article->image->imageALT }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center;">{{ $article->articleName }}</h5>
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
@endsection
