@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 175px; object-fit: fill; text-align:center;">
            <h2 style="color:#DD492C !important">Create New Article</h2>

            <form action="{{ route('dashboard.articles.store') }}" method="POST" class="form">
                @csrf

                <div class="form__field">
                    <input type="text" name="articleName" placeholder="Article Name" value="{{ old('articleName') }}" required>
                </div>

                <div class="form__field">
                    <input type="text" name="description" placeholder="Description" value="{{ old('description') }}" required>

                </div>

                <div class="form__field">
                    <input type="text" name="price" placeholder="Price" value="{{ old('price') }}" required>
                </div>

                <div class="form__field">
                    <input type="text" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}" required>
                </div>

                <div class="form__field">
                    <input type="text" name="status" placeholder="Status" value="{{ old('status') }}" required>
                </div>

                <div class="form__field">
                    <select name="sizeID" required>
                        <option value="">Select a Size</option>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->sizeID }}">{{ $size->size }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form__field">
                    <select name="colorID" required>
                        <option value="">Select a Color</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->colorID }}">{{ $color->color }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form__field">
                    <select name="subcategoryID" required>
                        <option value="">Select a Subcategory</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->subcategoryID }}">{{ $subcategory->subcategoryName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form__field">
                    <select name="imageID">
                        <option value="">Select an Image</option>
                        @foreach ($images as $image)
                            <option value="{{ $image->imageID }}">{{ $image->imageALT }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form__field">
                    <input type="submit" value="Create Article">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
