@extends('layouts.merge.site')
@section('titulo', 'Esqueceu a sua Palavra Passe?')
@section('content')
    <!-- Esqueceu a sua Palavra Passe? start -->
    <div class="login-area pb-100 pt-100" style="background-image:url(/site/img/hero/angola1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-6 justify-content-center mx-auto text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">

                                <span>
                                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                </span>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4 alert alert-info" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />

                            </div>
                            <div class="login-form">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <!-- Email Address -->
                                    <input type="email" name="email" placeholder="{{ __('Email') }}"
                                        value="{{ old('email') }}" required autofocus>


                                    <div class="button-box">

                                        <button type="submit" class="default-btn">  {{ __('Email Password Reset Link') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Esqueceu a sua Palavra Passe? end -->
@endsection
@section('CSSJS')
    <link rel="stylesheet" href="/lg/style.css">
@endsection
