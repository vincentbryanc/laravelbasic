@extends('layouts.auth')
@section('title')
    Login
@endsection
@section('content')
<div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="frmLogin">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <span class="db"><img src="{{ URL::asset('assets/images/logos/logo-icon.png') }}" alt="logo" /></span>
                        </a>
                        <h5 class="font-medium mb-3">Sign In to Continue</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3" id="frmLogin" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" name="email" class="form-control" placeholder="Email"  value="{{ old('email') }}">
                                </div>
                                @error('email')
                                <div role="alert" style="text-align: left; color: red; margin: -10px 0px 10px 0px;">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                                @error('password')
                                <div role="alert" style="text-align: left; color: red; margin: -10px 0px 10px 0px;">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="form-group text-center">
                                    <div class="col-xs-12 pb-3">
                                        <button class="btn btn-block btn-info" style="background-color:#1b5e21;color:#ffffff;" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection