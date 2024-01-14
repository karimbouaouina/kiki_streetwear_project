@extends('layouts.profileLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" />
@endsection

@section('content')
<div class="container my-4">
    <h1>Personal Details</h1>
    <div class="user-details-box">
        <div class="detail">
            <span class="highlight">First Name:</span>
            <span class="label">{{ $user->firstName }}</span>
        </div>
        <div class="detail">
            <span class="highlight">Last Name:</span>
            <span class="label">{{ $user->lastName }}</span>
        </div>
        <div class="detail">
            <span class="highlight">Email:</span>
            <span class="label">{{ $user->email }}</span>
        </div>
        <div class="detail">
            <span class="highlight">Address:</span>
            <span class="label">{{ $user->address }}</span>
        </div>
        <div>
            <a href="{{ route('users.edit', $user->userID) }}" class="profileEditBtn" style="align-self: flex-end;">Edit</a>
        </div>
    </div>
</div>
@endsection
