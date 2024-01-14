@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 175px; object-fit: fill; text-align:center;">
            <h2 style="color:#DD492C !important">Edit Subcategory</h2>

            <form action="{{ route('dashboard.subcategories.update', $subcategory->subcategoryID) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                
                <label style="color:#DD492C !important">Subcategory Name:</label>
                
                <div class="form__field">
                    <input type="text" name="subcategoryName" placeholder="Nom de la sous-catégorie" value="{{ $subcategory->subcategoryName }}" required>
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
                            <option value="{{ $category->categoryID }}" {{ $subcategory->categoryID == $category->categoryID ? 'selected' : '' }}>{{ $category->categoryName }}</option>
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
                        <option value="">Select an image</option>
                        @foreach ($images as $image)
                            <option value="{{ $image->imageID }}" {{ $subcategory->imageID == $image->imageID ? 'selected' : '' }}>{{ $image->imageALT }}</option>
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
