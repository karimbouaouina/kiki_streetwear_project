@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <h2 style="color:#DD492C !important">Add Items to Cart</h2>

            <form action="{{ route('cart.store') }}" method="POST" class="form">
                @csrf
                
                <div class="form__field">
                    <label>User:</label>
                    <select name="userID" required>
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->userID }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>

                @foreach ($articles as $article)
                    <div class="form__field">
                        <label>Article:</label>
                        <select name="articles[{{ $loop->index }}][articleID]" required>
                            <option value="">Select Article</option>
                            <option value="{{ $article->articleID }}">{{ $article->articleName }}</option>
                        </select>
                    </div>

                    <div class="form__field">
                        <label>Quantity:</label>
                        <input type="number" name="articles[{{ $loop->index }}][quantity]" min="1" required>
                    </div>

                    <div class="form__field">
                        <input type="text" name="articles[{{ $loop->index }}][sellingPrice]" placeholder="Selling Price" required>
                    </div>
                @endforeach

                <div class="form__field">
                    <input type="submit" value="Add to Cart">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
