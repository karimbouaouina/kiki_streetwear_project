@extends('layouts.app')

@section('content')
    <h1>Edit Order</h1>
    <form method="POST" action="{{ route('orders.update', $order->orderID) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="userID">User:</label>
            <select id="userID" name="userID" required>
                @foreach ($users as $user)
                    <option value="{{ $user->userID }}" {{ $order->userID == $user->userID ? 'selected' : '' }}>
                        {{ $user->firstName }} {{ $user->lastName }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update Order</button>
    </form>
@endsection
