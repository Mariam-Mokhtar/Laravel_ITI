{{-- @extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
            background-image: radial-gradient(circle, #ffffff 20%, rgb(225, 225, 250) 100%);
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
            background-image: linear-gradient(43deg, #9b95f3 0%, rgb(228, 227, 241) 100%);
            color: white;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <form class="login m-auto my-5 px-0 py-3 w-50 rounded-5 shadow" method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="fs-bolder">Login</h1>

        <div class="login-form w-75">
            <div class=" mb-4">
                <label for="email" class="fw-light mb-1">{{ __('Email Address') }}</label>
                <div>
                    <i class="bi bi-person-fill me-1 my-color"></i>
                    <input id="email" type="email" class="w-75 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}"placeholder="Type your email" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class=" mb-4">
                <label for="password" class="fw-light mb-1">{{ __('Password') }}</label>
                <div>
                    <i class="bi bi-lock-fill me-1 my-color"></i>
                    <input id="password" type="password" class="w-75 @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Type your password">
                    @error('password')
                        <span class="invalid-feedback mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-4 ">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label fw-light mb-1" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link m-0 p-0 border-0" style="color:#5d9397"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <button class="login-btn">
            LOGIN
        </button>
        <div class="row">
            <div>
                <a class="btn btn-dark mt-4 px-3" href="{{ route('gitHub-Login') }}">
                    <i class="bi bi-github"></i>
                    Login With Github
                </a>
                <a class="btn btn-primary mt-4 px-3" href="{{ route('google-Login') }}">
                    <i class="bi bi-google"></i>
                    Login With Google
                </a>
            </div>
        </div>
        @if (session('error'))
        <div class="alert alert-danger p-2 mt-3">
            {{ session('error') }}
        </div>
    @endif

        <div class="mt-4 d-flex flex-column align-items-center w-75">
            <p class="fs-6 my-color">Not a member? <a href="{{ route('register') }}" style="color:#5d9397">Register</a></p>
        </div>
    </form>
    </section>
@endsection
