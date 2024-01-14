@extends('layouts.app')

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endpush

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">Articles | <a href="{{ route('dashboard.articles.create') }}" class="btn btn-primary" style="background-color:#E04A2D;border-color:#E04A2D;">Add</a></h2>
    
    <div class="row">
        @forelse ($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card h-100" style="background-color:#FCEBE2;">
                @if ($article->image)
                <img class="card-img-top" src="{{ asset($article->image->imageURL) }}" alt="{{ $article->image->imageALT }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">Article Name: {{ $article->articleName }}</h5>
                    <h6 class="card-title" style="text-align:center; color:#808080">Description: {{ $article->description }}</h6>
                    <h6 class="card-title" style="text-align:center; color:#808080">Quantity in stock: {{ $article->quantity }}</h6>
                    <h6 class="card-title" style="text-align:center; color:#808080">Available sizes: {{ $article->size->size }}</h6>
                    <h6 class="card-title" style="text-align:center; color:#808080">Price: {{ $article->price }} TND</h6>

                </div>
                <div class="card-footer bg-transparent" style="text-align:center;">
                    <a href="{{ url('/dashboard/articles/' . $article->articleID . '/edit') }}" class="btn btn-warning" style="background-color:#E04A2D;color:white;border-color:#E04A2D;">Edit</a>

                    <form action="{{ route('dashboard.articles.destroy', $article->articleID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="background-color:#E04A2D;border-color:#E04A2D;" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
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
@endsection
