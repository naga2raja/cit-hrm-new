@extends('layout.mainlayout')

@section('content')

<div class="inner-wrapper login-body">
    <div class="login-wrapper">
<div class="container">
    <div class="loginbox shadow-sm">
        <div class="login-left">
            <!-- <img class="img-fluid" src="{{ assetUrl('img/logo.png') }}" alt="Logo"> -->
            <h1 class="img-fluid text-white"><i>CIT-HRM</i></h1>
            <p class="text-white">Cabc's Group India</p>
        </div>
        <div class="login-right">
            <div class="login-right-wrap">
                <h1>{{ __('Reset Password') }}</h1>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-0">
                                <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white btn-block">
                                    {{ __('Reset Password') }}
                                </button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
