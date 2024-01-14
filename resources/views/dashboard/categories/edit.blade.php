@extends('layouts.authLayout')

@section('title', 'Edit Category')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 175px; object-fit: fill; text-align:center;">
            <h2 style="color:#DD492C !important">Edit Category</h2>

            <form action="{{ route('dashboard.categories.update', ['categoryID' => $category->categoryID]) }}" method="POST" class="form">
                @csrf
                @method('PUT') 

                <div class="form__field">
                    <label style="color:#DD492C !important">Category Name:</label>
                    <input type="text" name="categoryName" value="{{ old('categoryName', $category->categoryName) }}" required>
                    @error('categoryName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__field">
                    <select name="imageID" required>
                        <option value="">Select Image</option>
                        @foreach ($images as $image)
                            <option value="{{ $image->imageID }}" {{ $category->imageID == $image->imageID ? 'selected' : '' }}>{{ $image->imageALT }}</option>
                        @endforeach
                    </select>
                    @error('imageID')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__field">
                    <input type="submit" value="Update">
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
