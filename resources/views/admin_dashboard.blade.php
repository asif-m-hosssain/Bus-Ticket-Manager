@extends('layouts.app') <!-- If you have a master layout, use it. Otherwise, create a basic layout for the admin views -->

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow p-4 rounded-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h2>{{ __('Register a brand') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('brand_register') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f9f9f9;
        background-image: url('https://unsplash.com/photos/C-zgN_LEKb8');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 1rem;
    }

    .card-header {
        background-color: #4caf50;
        border-radius: 1rem 1rem 0 0;
        padding: 1.5rem;
        font-size: 1.5rem;
    }

    .card-body {
        padding: 2rem;
    }

    .form-group label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #4caf50;
        border: none;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #45a049;
    }

    .form-control:focus {
        border-color: #4caf50;
        box-shadow: 0 0 0 0.1rem rgba(76, 175, 80, 0.25);
    }
</style>


@endsection