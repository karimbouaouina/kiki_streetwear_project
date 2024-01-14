@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 175px; object-fit: fill; text-align:center;">
            <h2 style="color:#DD492C !important">Edit Profile</h2>

            <form action="{{ route('users.update', $user->userID) }}" method="POST" class="form">
                @csrf
                @method('PUT')

                <label style="color:#DD492C !important">Email Address:</label>
                <div class="form__field">
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <label style="color:#DD492C !important">First Name:</label>
                <div class="form__field">
                    <input type="text" name="firstName" value="{{ old('firstName', $user->firstName) }}" required>
                </div>

                <label style="color:#DD492C !important">Last Name:</label>
                <div class="form__field">
                    <input type="text" name="lastName" value="{{ old('lastName', $user->lastName) }}" required>
                </div>

                <label style="color:#DD492C !important">Address:</label>
                <div class="form__field">
                    <input type="text" name="address" value="{{ old('address', $user->address) }}" required>
                </div>

                <div class="form__field">
                    <input type="submit" value="Update Profile">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
