@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 125px; object-fit: fill; text-align:center;margin-bottom:25px;">
            <h2 style="color:#DD492C !important">Register</h2>

            <form action="{{ route('register') }}" method="POST" class="form">
                @csrf

                <div class="form__field">
                    <input type="text" name="firstName" placeholder="First Name" value="{{ old('firstName') }}">
                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__field">
                    <input type="text" name="lastName" placeholder="Last Name" value="{{ old('lastName') }}">
                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__field">
                    <input type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__field">
                    <input type="text" name="username" placeholder="USERNAME" value="{{ old('username') }}">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form__field">
                    <input type="email" name="email" placeholder="EMAIL" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form__field">
                    <input type="password" name="password" placeholder="PASSWORD">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form__field">
                    <input type="password" name="password_confirmation" placeholder="CONFIRM PASSWORD">
                </div>
                
                <div class="form__field">
                    <input type="submit" value="SIGNUP">
                </div>
            </form>
            
            <p>Already have an account? <a href="{{ route('login') }}">LOGIN</a></p>
        </div>
    </div>
</div>
@endsection
