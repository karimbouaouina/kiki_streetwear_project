@extends('layouts.app')

@section('content')
    <h1>Create New Color</h1>
    <form method="POST" action="{{ route('colors.store') }}">
        @csrf
        <div>
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>
        </div>
        <button type="submit">Create Color</button>
    </form>
@endsection
