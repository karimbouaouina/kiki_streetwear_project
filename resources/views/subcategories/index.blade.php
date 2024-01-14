@extends('layouts.userLayout')

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="container my-4">
    <h1>{{ $category->categoryName }}</h1>
    <div class="row">
        @forelse ($subcategories as $subcategory)
        <a class="col-md-4 mb-4" href="{{ url('/articles/'.$category->categoryName.'/'.$subcategory->subcategoryName) }}" style="text-decoration: none;">
            <div class="card h-100" style="background-color:#FCEBE2; border:none;">
                @if ($subcategory->image)
                <img class="card-img-top" src="{{ asset($subcategory->image->imageURL) }}" alt="{{ $subcategory->image->imageALT }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">{{ $subcategory->subcategoryName }}</h5>
                </div>
                
            </div>
        </a>
        @empty
        <div class="col-12">
            <p>No subcategories found in this category.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
