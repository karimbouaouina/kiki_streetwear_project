@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('title', 'Add Category')

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 175px; object-fit: fill; text-align:center;">
            <h2 style="color:#DD492C !important">Add a Category</h2>

            <form action="{{ route('dashboard.categories.store') }}" method="POST" class="form">
                @csrf  
                <label style="color:#DD492C !important">Category Name:</label>
                <div class="form__field">
                    <input type="text" name="categoryName" value="{{ old('categoryName') }}" required>
                    @error('categoryName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__field">
                    <select name="imageID">
                        <option value="">Select Image</option>
                        @foreach ($images as $image)
                            <option value="{{ $image->imageID }}">{{ $image->imageALT }}</option>
                        @endforeach
                    </select>
                    @error('imageID')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__field">
                    <input type="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
