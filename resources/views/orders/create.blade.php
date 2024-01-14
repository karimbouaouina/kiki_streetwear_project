@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 125px; object-fit: fill; text-align:center;margin-bottom:25px;">
            <h2 style="color:#DD492C !important">Confirm Order</h2>
            <form action="{{ route('orders.store') }}" method="POST" class="form">
                @csrf 
                <label style="color:#DD492C !important">Full Name:</label>
                <div class="form__field">
                    <input type="text" name="name" placeholder="Name" value="{{ auth()->user()->firstName . ' ' . auth()->user()->lastName }}" required>
                </div>
                <label style="color:#DD492C !important">Address:</label>
                <div class="form__field">
                    <input type="text" name="address" placeholder="Address" value="{{ auth()->user()->address }}" required>
                </div>
                <label style="color:#DD492C !important">Tax Registration Number:</label>
                <div class="form__field">
                    <input type="text" name="taxRegistrationNumber" required>
                </div>
                <div class="form__field">
                    <input type="submit" value="Order" class="order-button">
                </div>
            </form>
        </div>
    </div>   
</div>
@endsection
