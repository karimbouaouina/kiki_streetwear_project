@extends('layouts.app')

@section('content')
    <h1>Sizes</h1>
    <a href="{{ route('sizes.create') }}">Create New Size</a>
    <ul>
        @foreach ($sizes as $size)
            <li>{{ $size->size }}
                <a href="{{ route('sizes.show', $size->sizeID) }}">View</a>
                <a href="{{ route('sizes.edit', $size->sizeID) }}">Edit</a>
                <form action="{{ route('sizes.destroy', $size->sizeID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
