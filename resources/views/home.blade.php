@extends('layouts.app')
@section('style')
    <style>
   body {
            background-color: #ffffff;
            height: 100vh;
            background-image:radial-gradient(circle, #ffffff 20%, rgb(225, 225, 250) 100%);
            background-attachment: fixed;
        }

    </style>
@endsection
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
