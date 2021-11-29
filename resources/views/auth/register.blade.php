@extends('layouts.app')

@section('navbar') @endsection

@section('content')

    <section class="login-area-sign">
        <div class="row m-0">
            <div class="col-lg-6 mx-auto">
                <div class="login-content signup-content-only">
                    <div class="login-form">
                        <div class="logo text-center">
                            <a href="/">
                                <img src="/images/logo.png" style="width: 170px;" alt="Wall-ID Logo">
                            </a>
                        </div>
                        <div class="col-lg-12 text-center">
                            <h3>Individual Sign Up</h3>
                            <p>Fill up the form below to sign up for your Wall-ID account.</p>
                        </div>
                        <form class="form-form-div" action="/register" method="POST">
                            @csrf

                            <!-- Full Name Here -->
                            <div>
                                <label for="firsname">Firstname</label>
                                <input type="text" required placeholder="Firstname" name="firstname" class="@error('firsname') is-invalid @enderror" value="{{old('firstname')}}">
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div>
                                <label for="lastname">Lastname</label>
                                <input type="text" required placeholder="Lastname" name="lastname" class="@error('lastname') is-invalid @enderror" value="{{old('lastname')}}">
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div>
                                <label for="username">Username</label>
                                <input type="text" required placeholder="Username" name="username" class="@error('username') is-invalid @enderror" value="{{old('username')}}">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Email Here -->
                            <div>
                                <label for="email">Email</label>
                                <input type="email" required placeholder="myemail@email.com" name="email" class="@error('email') is-invalid @enderror" value="{{old('email')}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Telephone Number Here -->
                            <div>
                                <label for="phone">Telephone number</label>
                                <input type="tel" required placeholder="Enter your phone number" class="@error('phone') is-invalid @enderror" value="{{old('phone')}}" name="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Here -->
                            <div>
                                <label for="password">Password</label>
                                <input type="password" required placeholder="*********" name="password" class="@error('password') is-invalid @enderror" value="{{old('password')}}">
                                <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Retype Password Here -->
                            <div>
                                <label for="retype password">Retype password</label>
                                <input type="password" required placeholder="*********" name="password_confirmation">
                                <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                            </div>

                            <!-- Accept Privacy Policy -->
                            <div class="accept-terms">By clicking submit, you agree to Wall-ID <a href="#">Terms of Service</a> and <a href="#">Privacy Policy.</a></div>

                            <!-- Submit Button Here-->
                            <div class="signup-btn-div text-center">
                                <input type="submit" value="Sign Up" class="submit-form">
                            </div>

                            <!-- Alread Have An Account -->
                            <div class="already">Already have a wall-id account? <a href="/login">Login</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
@endsection

@section('footer') @endsection
