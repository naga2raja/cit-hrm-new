@extends('layout.mainlayout')

@section('content')
<div class="inner-wrapper login-body">
    <div class="login-wrapper">
<div class="container">
    <div class="loginbox shadow-sm">

        <div class="login-left">
            <!-- <img class="img-fluid" src="img/logo.png" alt="Logo"> -->
            <h1 class="img-fluid text-white">CIT-HRM</h1>
            <h6 class="text-white mt-1">Cabc's Group India</h6>
        </div>

        <div class="login-right">
            <div class="login-right-wrap">
                <h1>Login</h1>
                <p class="account-subtitle">Access to our dashboard</p>

                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif
                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <div class="forgotpass">
                                    <input class="form-check-input1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color: #a0a0a0;">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius btn-block">
                                    {{ __('Login') }}
                                </button>                                
                        </div>
                    </form>
                    @if (Route::has('password.request'))
                    <div class="text-center forgotpass">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>  
                    </div>                                  
                    @endif

                  
                  <!--
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>
                                
                                
                                <div class="social-login">
                                    <span>Login with</span>
                                    <a href="javascript:void(0)" class="facebook"><i class="fa fa-facebook"></i></a><a href="javascript:void(0)" class="google"><i class="fa fa-google"></i></a>
                                </div>
                                -->


            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
