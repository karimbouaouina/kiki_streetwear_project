@extends('layouts.app')

@section('content')
    <h1>Edit Color</h1>
    <form method="POST" action="{{ route('colors.update', $color->colorID) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="{{ $color->color }}" required>
        </div>
        <button type="submit">Update Color</button>
    </form>
@endsection
