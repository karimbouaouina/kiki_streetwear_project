@extends('layouts.app')

@section('content')
    <h1>Create New Size</h1>
    <form method="POST" action="{{ route('sizes.store') }}">
        @csrf
        <div>
            <label for="size">Size:</label>
            <input type="text" id="size" name="size" required>
        </div>
        <button type="submit">Create Size</button>
    </form>
@endsection
