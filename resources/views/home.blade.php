@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"style="background-color: #FCEBE2;">{{ __('Admin Dashboard') }}</div>

                <div class="card-body" style="background-color: #FCEBE2;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Logged in.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
