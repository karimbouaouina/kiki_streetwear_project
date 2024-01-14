@extends('layouts.app')

@section('content')
    <h1>Size: {{ $size->size }}</h1>
    <p>Size ID: {{ $size->sizeID }}</p>
    <a href="{{ route('sizes.index') }}">Back to Sizes</a>
@endsection
