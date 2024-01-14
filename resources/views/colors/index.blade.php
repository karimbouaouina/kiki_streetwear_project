@extends('layouts.app')

@section('content')
    <h1>Colors</h1>
    <a href="{{ route('colors.create') }}">Create New Color</a>
    <ul>
        @foreach ($colors as $color)
            <li>{{ $color->color }}
                <a href="{{ route('colors.show', $color->colorID) }}">View</a>
                <a href="{{ route('colors.edit', $color->colorID) }}">Edit</a>
                <form action="{{ route('colors.destroy', $color->colorID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
