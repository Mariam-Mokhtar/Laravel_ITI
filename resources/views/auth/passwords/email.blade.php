{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="login m-auto my-5 px-0 py-5 w-50 rounded-5 shadow" method="POST" action="{{ route('password.email') }}">
        @csrf
        <h2 class="fs-bolder mb-4">Reset Password</h2>

        <div class="login-form w-75">
            <div class="mb-4">
                <label for="email" class="fw-light mb-1">{{ __('Email Address') }}</label>
                <div class="username-input">
                    <input id="email" type="email" class="w-100 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}"placeholder="Type your email" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="my-4 w-100 login-btn">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>
    </section>
@endsection
