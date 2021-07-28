@extends('layout.mainlayout')

@section('content')
<div class="inner-wrapper login-body">
    <div class="login-wrapper">
<div class="container">
    <div class="row justify-content-center">
        <div class="loginbox shadow-sm">
            <div class="login-left">
                <!-- <img class="img-fluid" src="{{ assetUrl('img/logo.png') }}" alt="Logo"> -->
                <h1 class="img-fluid text-white"><i>CIT-HRM</i></h1>
                <p class="text-white">Cabc's Group India</p>
            </div>

            <div class="login-right">
                <div class="login-right-wrap">
                    <h1>Forgot Password?</h1>
                    <p class="account-subtitle">Enter your email to get a reset link</p>
                    

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group mb-0">
                                <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white btn-block">
                                    {{ __('Reset Password') }}
                                </button>
                        </div>
                    </form>

                    <div class="text-center dont-have">Remember your password? <a href="/login">Login</a></div>

                </div>
            </div>
        </div>

        </div>
    </div>
</div>
</div>
</div>
@endsection
