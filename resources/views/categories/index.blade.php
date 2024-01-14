{{-- Extend your main layout --}}
@extends('layouts.userLayout')

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endpush

@section('content')
<div class="container my-4">
    <h1>Categories</h1>
    <div class="row">
        @forelse ($categories as $category)
        <a class="col-md-4 mb-4" href="{{ url('/categories/'.$category->categoryName) }}" style="text-decoration: none;">
            <div class="card h-100" style="background-color:#FCEBE2; border:none;">
                @if ($category->image)
                <img class="card-img-top" src="{{ asset($category->image->imageURL) }}" alt="{{ $category->image->imageALT }}">
                @else
                <img class="card-img-top" src="{{ asset('images/placeholder.png') }}" alt="No image available">
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">{{ $category->categoryName }}</h5>
                </div>
            </div>
        </a>
        @empty
        <div class="col-12">
            <p>No categories found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
