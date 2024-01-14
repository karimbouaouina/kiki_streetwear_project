@extends('layouts.app')

@section('content')
    <h1>{{ isset($bill) ? 'Edit Bill' : 'Create Bill' }}</h1>

    <form method="POST" action="{{ isset($bill) ? route('bills.update', $bill->billID) : route('bills.store') }}">
        @csrf
        @if(isset($bill))
            @method('PUT')
        @endif

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $bill->name ?? '') }}" required>
        </div>


        <div>
            <label for="billingDate">Billing Date:</label>
            <input type="date" id="billingDate" name="billingDate" value="{{ old('billingDate', $bill->billingDate ?? '') }}" required>
        </div>

        <div>
            <label for="orderID">Order:</label>
            <select id="orderID" name="orderID" required>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}" {{ (isset($bill) && $bill->orderID == $order->id) ? 'selected' : '' }}>{{ $order->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">{{ isset($bill) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
