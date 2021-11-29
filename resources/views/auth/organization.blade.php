@extends('layouts.app')

@section('navbar')

@endsection

@section('content')
	
    <section class="login-area-sign">
        <div class="row m-0">
            <div class="col-lg-6 col-md-12 mx-auto">
                <div class="login-content signup-content-only">
                    <div class="login-form">
                        <div class="logo text-center">
                            <a href="/">
                                <img src="/images/logo.png" style="width: 170px;" alt="Wall-ID Logo">
                            </a>
                        </div>
                        <div class="col-lg-12 text-center">
                            <h3>Non-Individual Sign Up</h3>
                            <p>Select type of non-individual user and fill up the selected form to continue.</p>
                        </div>
                        <div class="site-wrapper">
                            <section class="tabs-wrapper">
                                <div class="tabs">
                                    
                                    <!-------------------
                                        Group/Organisation Registration Form
                                    ------------------->
                                    
                                    <input type="radio" name="tabs" id="tab3" checked="checked" />
                                    <label for="tab3" class="label d-none">Organisation</label>

                                    <div class="tab">
                                        <div class="form-signup-div">
                                            <h4 class="title-form">Organisation Sign Up</h4>
                                            <div class="line-rule"></div>
                                            <form class="form-form-div" method="POST" action="/register/organization">
                                                @csrf

                                                <!-- Organisation Name Here -->
                                                <div class="mb-4">
                                                    <label for="organisation name">Group/Organisation name</label>
                                                    <input type="text" class="mb-0 @error('name') is-invalid @enderror" required name="name" placeholder="Enter your organisation name">

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
            
                                                <!-- Organisation Email Here -->
                                                <div class="mb-4">
                                                    <label for="organisation email">Group/Organisation email</label>
                                                    <input type="email" name="email" required placeholder="myemail@email.com" class="mb-0 @error('email') is-invalid @enderror">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
            
                                                <!-- Organisation Telephone Number Here -->
                                                <div class="mb-4">
                                                    <label for="phone">Group/Organisation phone number</label>
                                                    <input type="tel" class="mb-0 @error('phone') is-invalid @enderror" name="phone" required placeholder="Enter phone number">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
            
                                                <!-- Number Of Members Here -->
                                                <div>
                                                    <label for="number of members">Number of members</label>
                                                    <select name="employees" required>
                                                        <option value="" hidden>Select Option</option>
                                                        <option value="9">1-9 Members</option>
                                                        <option value="10">More Than 10 Members</option>
                                                    </select>
                                                </div>
            
                                                <!-- Password Here -->
                                                <div class="mb-2">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="@error('password') is-invalid @enderror" name="password" required placeholder="*********">
                                                    <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
            
                                                <!-- Retype Password Here -->
                                                <div class="mb-4">
                                                    <label for="retype password">Retype password</label>
                                                    <input type="password" name="password_confirmation" required placeholder="*********">
                                                    <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                                </div>
            
                                                <!-- Accept Privacy Policy -->
                                                <div class="accept-terms mb-4">By clicking submit, you agree to Wall-ID <a href="/terms">Terms of Service</a> and <a href="/privacy-policy">Privacy Policy.</a></div>
            
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
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('footer') @endsection