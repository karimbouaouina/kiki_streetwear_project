@extends('layouts.app')

@section('content')
    <h1>Edit Size</h1>
    <form method="POST" action="{{ route('sizes.update', $size->sizeID) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="size">Size:</label>
            <input type="text" id="size" name="size" value="{{ $size->size }}" required>
        </div>
        <button type="submit">Update Size</button>
    </form>
@endsection
