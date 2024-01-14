@extends('layouts.app')

@section('content')
    <h1>Details</h1>
    <a href="{{ route('details.create') }}">Create New Detail</a>
    <ul>
        @foreach ($details as $detail)
            <li>
                Article: {{ optional($detail->article)->articleName ?? 'N/A' }},
                Size: {{ optional($detail->size)->size ?? 'N/A' }},
                Color: {{ optional($detail->color)->color ?? 'N/A' }},
                Status: {{ $detail->status }},
                Price: {{ $detail->price }},
                Quantity: {{ $detail->quantity }}
                <a href="{{ route('details.show', $detail->detailID) }}">View</a>
                <a href="{{ route('details.edit', $detail->detailID) }}">Edit</a>
                <form action="{{ route('details.destroy', $detail->detailID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
