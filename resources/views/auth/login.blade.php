@extends('layouts.app')

@section('navbar')
    
@endsection

@section('content')

    <section class="login-area">
        <div class="row m-0">
            <div class="col-lg-4 mx-auto">
                <div class="login-content">
                    <div class="login-form">
                        <div class="logo text-center">
                            <a href="/">
                                <img src="/images/logo.png" style="width: 170px;" alt="Wall-ID Logo">
                            </a>
                        </div>
                        <div class="col-lg-12 text-center">
                            <h3>Welcome Back!</h3>
                            <p>Login to your Wall-ID account to continue.</p>
                        </div>

                        @if(session()->get('success') != null)
                            <div class="alert alert-success col-md-12 mt-2">
                                <span class="small">{{ session()->get('success') }}</span>
                            </div>
                        @endif

                        <form class="form-form-div" method="POST" action="{{route('login')}}">
                             
                            @csrf

                            <!-- Wall-ID Number or Email Here -->
                            <div class="mb-3">
                                <label for="full name">Wall-ID Email</label>
                                <input type="text" name="email" required placeholder="Enter your Email" class=" @error('email') is-invalid @enderror">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Here -->
                            <div class="mb-3">
                                <label for="password">Password</label>
                                
                                 <input type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="********">
                                 <i class="toggle-password fa fa-fw fa-eye-slash"></i>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Submit Button Here-->
                            <div class="signup-btn-div text-center">
                                <input type="submit" value="Login" class="submit-form">
                            </div>

                            <!-- Forgot Password Here -->
                            <div class="forgot-password">
                                <p>Forgot Password? <a href="{{ route('password.request') }}">Click Here</a></p>
                            </div>

                            <!-- Alread Have An Account -->
                            <div class="already">Don't have a wall-id account? <a href="/register/account-type">Sign Up</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- <div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
</div> -->
@endsection


@section('footer')
    
@endsection
