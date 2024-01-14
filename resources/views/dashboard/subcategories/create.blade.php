@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 175px; object-fit: fill; text-align:center;">
            <h2 style="color:#DD492C !important">Add a subcategory</h2>

            <form action="{{ route('dashboard.subcategories.store') }}" method="POST" class="form">
                @csrf
                <label style="color:#DD492C !important">Subcategory Name:</label>

                <div class="form__field">
                    <input type="text" name="subcategoryName" value="{{ old('subcategoryName') }}" required>
                    @error('subcategoryName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__field">
                    <select name="categoryID" required>
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->categoryID }}">{{ $category->categoryName }}</option>
                        @endforeach
                    </select>
                    @error('categoryID')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form__field">
                    <select name="imageID">
                        <option value="">Select a image</option>
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
