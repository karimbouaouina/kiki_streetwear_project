@extends('layouts.app')

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">Subcategories | <a href="{{ route('dashboard.subcategories.create') }}" class="btn btn-primary" style="background-color:#E04A2D;border-color:#E04A2D;">Add</a></h2>
    
    <div class="row">
        @forelse ($subcategories as $subcategory)
        <div class="col-md-4 mb-4">
            <div class="card h-100" style="background-color:#FCEBE2;">
                @if ($subcategory->image)
                <img class="card-img-top" src="{{ asset($subcategory->image->imageURL) }}" alt="{{ $subcategory->image->imageALT }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">{{ $subcategory->subcategoryName }}</h5>
                </div>
                <div class="card-footer bg-transparent" style="text-align:center;">
                    <a href="{{ route('dashboard.subcategories.show', $subcategory->subcategoryID) }}" class="btn btn-info" style="background-color:#E04A2D;border-color:#E04A2D;">View</a>
                    <a href="{{ route('dashboard.subcategories.edit', $subcategory->subcategoryID) }}" class="btn btn-warning" style="background-color:#E04A2D;color:white;border-color:#E04A2D;">Edit</a>
                    <form action="{{ route('dashboard.subcategories.delete', $subcategory->subcategoryID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="background-color:#E04A2D;border-color:#E04A2D;" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>No subcategories found in this category.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
