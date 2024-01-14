@extends('layouts.app')

@section('content')
    <h1>Bill: {{ $bill->name }}</h1>
    <p>Name: {{ $bill->name }}</p>
    <p>Address: {{ $bill->address }}</p>
    <p>Billing Date: {{ $bill->billingDate }}</p>
    <p>Tax Registration Number: {{ $bill->taxRegistrationNumber }}</p>
    @endsection
