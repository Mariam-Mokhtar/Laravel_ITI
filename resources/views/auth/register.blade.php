{{-- @extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection --}}
@extends('layouts.app')

@section('style')
    <style>
    body {
            background-color: #ffffff;
            height: 100vh;
            background-image:radial-gradient(circle, #ffffff 20%, rgb(225, 225, 250) 100%);
            background-attachment: fixed;
        }
        .login {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            background-color: rgb(255, 255, 255);
            border-radius: 20px;
        }


        input {
            border: none;
            border-bottom: 1px solid #a4a4a4;
            background-color: inherit;
            outline: none;
        }

        .my-color {
            color: rgba(0, 0, 0, 0.3);
        }

        .login-btn {
            border: none;
            padding: 7px 20px;
            width: 50%;
            border-radius: 10px;
            font-size: 1.2rem;
            background-image: linear-gradient(43deg, #a6d6be 0%, hsla(269, 100%, 77%, 1) 100%);
            color: white;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <form class="login m-auto my-5 px-0 py-4 w-75 rounded-5 shadow" method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="fs-bolder mb-3">Register</h1>
        <div class="login-form row  w-75 justify-content-between">
            <div class="col-12 mb-3">
                <label for="name" class="fw-light mb-1">{{ __('Name') }}</label>
                <div>
                    <input id="name" type="text" class="w-100 @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
            <div class="col-12 mb-3 ">
                <label for="email" class="fw-light mb-1">{{ __('Email Address') }}</label>
                <div>
                    <input id="email" type="email" class="w-100 @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mb-3">
                <label for="password" class="fw-light mb-1">{{ __('Password') }}</label>
                <div>
                    <input id="password" type="password" class="w-100 @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            <div class="col-12 mb-3">
                <label for="password-confirm" class="fw-light mb-1">{{ __('Confirm Password') }}</label>
                <div>
                    <input id="password-confirm" type="password" name="password_confirmation" required
                        autocomplete="new-password" class="w-100">
                </div>
            </div>
        </div>
        <button type="submit" class="login-btn my-3">
            {{ __('Register') }}
        </button>
    </form>
    </section>
@endsection
