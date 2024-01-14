@extends('layouts.app')

@section('content')
    <h1>Create Bill</h1>

    <form method="POST" action="{{ route('bills.store') }}">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" required>
        </div>

        <div>
            <label for="billingDate">Billing Date:</label>
            <input type="date" id="billingDate" name="billingDate" value="{{ old('billingDate') }}" required>
        </div>

        <div>
            <label for="taxRegistrationNumber">Tax Registration Number:</label>
            <input type="text" id="taxRegistrationNumber" name="taxRegistrationNumber" value="{{ old('taxRegistrationNumber') }}" required>
        </div>

        <div>
            <label for="orderID">Order:</label>
            <select id="orderID" name="orderID" required>
                @foreach ($orders as $order)
                    <option value="{{ $order->orderID }}" {{ old('orderID') == $order->orderID ? 'selected' : '' }}>
                        {{ "Order #" . $order->orderID }} 
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
