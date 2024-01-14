@extends('layouts.app')

@section('content')
    <h1>Detail Information</h1>
    <div>
        <strong>Price:</strong> {{ $detail->price }}
    </div>
    <div>
        <strong>Quantity:</strong> {{ $detail->quantity }}
    </div>
    <div>
        <strong>Article:</strong> {{ $detail->article->articleName }}
    </div>
    <div>
        <strong>Size:</strong> {{ $detail->size->size }}
    </div>
    <div>
        <strong>Color:</strong> {{ $detail->color->color }}
    </div>
    <div>
        <strong>Status:</strong> {{ $detail->status }}
    </div>
    <a href="{{ route('details.edit', $detail->detailID) }}">Edit</a>
    <form action="{{ route('details.destroy', $detail->detailID) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('details.index') }}">Back to list</a>
@endsection
