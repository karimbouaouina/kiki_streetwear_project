@extends('layouts.app')

@section('content')
    <h1>Create New Detail</h1>
    <form method="POST" action="{{ route('details.store') }}">
        @csrf
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required step="0.01">
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
        </div>
        <div>
            <label for="articleID">Article:</label>
            <select id="articleID" name="articleID" required>
                @foreach ($articles as $article)
                    <option value="{{ $article->articleID }}">{{ $article->articleName }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="sizeID">Size:</label>
            <select id="sizeID" name="sizeID" required>
                @foreach ($sizes as $size)
                    <option value="{{ $size->sizeID }}">{{ $size->size }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="colorID">Color:</label>
            <select id="colorID" name="colorID" required>
                @foreach ($colors as $color)
                    <option value="{{ $color->colorID }}">{{ $color->color }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required>
        </div>
        <button type="submit">Create Detail</button>
    </form>
@endsection
