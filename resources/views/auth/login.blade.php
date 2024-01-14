@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 125px; object-fit: fill; text-align:center;margin-bottom:30px;">
            <h2 style="color:#DD492C !important">Login</h2>

            <form action="{{ route('login') }}" method="post" class="form">
                @csrf

                <div class="form__field">
                    <input type="text" placeholder="USERNAME" name="username" value="{{ old('username') }}" required autofocus>
                </div>

                <div class="form__field">
                    <input type="password" placeholder="••••••••••••" name="password" required>
                </div>

                <div class="form__field" style="margin-bottom:0px !important">
                    <input type="submit" value="LOGIN">
                </div>
            </form>

            <p>Don't have an account ? <a href="{{ route('register') }}">SIGNUP</a></p>
        </div>
    </div>
</div>
@endsection
