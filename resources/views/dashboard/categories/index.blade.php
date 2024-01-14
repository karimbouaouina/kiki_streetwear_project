@extends('layouts.app')

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endpush

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">Categories | <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary" style="background-color:#E04A2D;border-color:#E04A2D;">Add</a></h2>
    
    <div class="row">
        @forelse ($categories as $category)
        <div class="col-md-4 mb-4">
            <div class="card h-100" style="background-color:#FCEBE2;">
                @if ($category->image)
                <img class="card-img-top" src="{{ asset($category->image->imageURL) }}" alt="{{ $category->image->imageALT }}">
                @else
                <img class="card-img-top" src="{{ asset('images/placeholder.png') }}" alt="No image available">
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">{{ $category->categoryName }}</h5>
                </div>
                <div class="card-footer bg-transparent" style="text-align:center;">
                    <a href="{{ route('dashboard.categories.show', $category->categoryID) }}" class="btn btn-info" style="background-color:#E04A2D;border-color:#E04A2D;">View</a>
                    <a href="{{ route('dashboard.categories.edit', $category->categoryID) }}" class="btn btn-secondary" style="background-color:#E04A2D;border-color:#E04A2D;">Edit</a>
                    <form method="POST" action="{{ route('dashboard.categories.delete', $category->categoryID) }}" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="background-color:#E04A2D;border-color:#E04A2D;" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>No categories found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
