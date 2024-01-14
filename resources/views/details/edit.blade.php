@extends('layouts.app')

@section('content')
    <h1>Edit Detail</h1>
    <form method="POST" action="{{ route('details.update', $detail->detailID) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="{{ $detail->price }}" required>
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{ $detail->quantity }}" required>
        </div>
        <div>
            <label for="articleID">Article:</label>
            <select id="articleID" name="articleID" required>
                @foreach ($articles as $article)
                    <option value="{{ $article->articleID }}" {{ $detail->articleID == $article->articleID ? 'selected' : '' }}>{{ $article->articleName }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="sizeID">Size:</label>
            <select id="sizeID" name="sizeID" required>
                @foreach ($sizes as $size)
                    <option value="{{ $size->sizeID }}" {{ $detail->sizeID == $size->sizeID ? 'selected' : '' }}>{{ $size->size }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="colorID">Color:</label>
            <select id="colorID" name="colorID" required>
                @foreach ($colors as $color)
                    <option value="{{ $color->colorID }}" {{ $detail->colorID == $color->colorID ? 'selected' : '' }}>{{ $color->color }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="{{ $detail->status }}" required>
        </div>
        <button type="submit">Update Detail</button>
    </form>
@endsection
