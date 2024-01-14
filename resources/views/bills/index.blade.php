@extends('layouts.app')

@section('content')
    <h1>Bills</h1>
    <a href="{{ route('bills.create') }}">Create New Bill</a>
    <ul>
        @foreach ($bills as $bill)
            <li>
                {{ $bill->name }} - {{ $bill->billingDate }}
                <a href="{{ route('bills.show', $bill->billID) }}">View</a>
                <a href="{{ route('bills.edit', $bill->billID) }}">Edit</a>
                <form action="{{ route('bills.destroy', $bill->billID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
