

@extends('layouts.merge.site')
@section('titulo', 'Verificar Email')
@section('content')
    <!-- Verificar Email start -->
    <div class="login-area pb-100 pt-100" style="background-image:url(/site/img/hero/angola1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-6 justify-content-center mx-auto text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">

                                <span>
                                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                </span>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4 alert alert-info" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />

                                @if (session('status') == 'verification-link-sent')
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                    </div>
                                @endif
                            </div>
                            <div class="login-form">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf

                                    <div>
                                        <x-button>
                                            {{ __('Resend Verification Email') }}
                                        </x-button>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Verificar Email end -->
@endsection
@section('CSSJS')
    <link rel="stylesheet" href="/lg/style.css">
@endsection
