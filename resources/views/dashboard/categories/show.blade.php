@extends('layouts.app')

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">{{ $category->categoryName }}</h2>
    <div class="row">
        @forelse ($category->subcategories as $subcategory)
            <div class="col-md-4 mb-4">
                <div class="card h-100" style="background-color:#FCEBE2;">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center;">{{ $subcategory->subcategoryName }}</h5>
                        @if ($subcategory->image)
                            <img src="{{ asset($subcategory->image->imageURL) }}" alt="{{ $subcategory->image->imageALT }}" class="card-img-top">
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No subcategories found for this category.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
