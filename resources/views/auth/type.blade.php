@extends('layouts.app')

@section('navbar')

@endsection

@section('content')
	<div class="signup-portal-div"> 
        <div class="col-md-12 text-center py-4">
            <a href="/">
                <img src="/images/logo.png" width="200px" alt="Wall-ID Logo">
            </a>
        </div>
        <div class="col-md-12 text-center">
            <h3>How are you signing up?</h3>
        </div> 
        <div class="container">
          <div class="row">
              <div class="col-lg-2"></div>
                <div class="col-lg-4 py-1">
                    <a href="{{ route('register') }}">
                        <div class="showed-content">
                            <img src="/images/icon1.png" alt="icon">
                            <h4>Individual</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 py-1">
                    <a href="/register/organization">
                        <div class="showed-content">
                            <img src="/images/icon4.png" alt="icon">
                            <h4>Non-Individual</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2"></div>
          </div>
        </div>
        <div class=" already text-center">
            <p>Already have a wall-id account? <a href="/login">Login</a></p>
        </div> 
    </div>
@endsection


@section('footer') @endsection