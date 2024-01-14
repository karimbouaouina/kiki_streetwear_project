@extends('layouts.authLayout')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="{{ asset('images/loginlogo.png') }}" alt="Logo" style="height: 175px; object-fit: fill; text-align:center;">
            <h2 style="color:#DD492C !important">Edit Article</h2>

            <form action="{{ route('dashboard.articles.update', $article->articleID) }}" method="POST" class="form">
                @csrf
                @method('PUT')

                <div class="form__field">
                    <input type="text" name="articleName" placeholder="Article Name" value="{{ $article->articleName }}" required>
                </div>

                <div class="form__field">
                    <input type="text" name="description" placeholder="Description" value="{{ $article->description }}" required>
                </div>

                <div class="form__field">
                    <input type="text" name="price" placeholder="Price" value="{{ $article->price }}" required>
                </div>

                <div class="form__field">
                    <input type="text" name="quantity" placeholder="Quantity" value="{{ $article->quantity }}" required>
                </div>

                <div class="form__field">
                    <input type="text" name="status" placeholder="Status" value="{{ $article->status }}" required>
                </div>

                <div class="form__field">
                    <select name="sizeID" required>
                        <option value="">Select a Size</option>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->sizeID }}" {{ (isset($article->size) && $article->size->sizeID === $size->sizeID) ? 'selected' : '' }}>
                                {{ $size->size }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form__field">
                    <select name="colorID" required>
                        <option value="">Select a Color</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->colorID }}" {{ (isset($article->color) && $article->color->colorID === $color->colorID) ? 'selected' : '' }}>
                                {{ $color->color }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form__field">
                    <select name="subcategoryID" required>
                        <option value="">Select a Subcategory</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->subcategoryID }}" {{ $article->subcategoryID === $subcategory->subcategoryID ? 'selected' : '' }}>
                                {{ $subcategory->subcategoryName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form__field">
                    <select name="imageID">
                        <option value="">Select an Image</option>
                        @foreach ($images as $image)
                            <option value="{{ $image->imageID }}" {{ $article->imageID === $image->imageID ? 'selected' : '' }}>
                                {{ $image->imageALT }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form__field">
                    <input type="submit" value="Update Article">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
