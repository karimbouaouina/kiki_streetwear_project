@extends('layouts.app')

@section('content')
    <h1>Color: {{ $color->color }}</h1>
    <p>Color ID: {{ $color->colorID }}</p>
    <a href="{{ route('colors.index') }}">Back to Colors</a>
@endsection
