@extends('layouts.app')

@section('pageTitle')
    Sign In
@endsection

@section('headers')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sign-in.css') }}">
@endsection

@section('body')
<script src='{{ asset('js/sign-in.js') }}'></script>

<div id="logo_container" class="container pt-5 pb-5 bg-m_green_primary">
    <center><img src="{{ asset('img/logo.png') }}" class="mb-3" width="80%" alt="icon"></center>
</div>

<div class="container bg-m_green_light py-1 pt-2" id="login_label_bg">
    <h4 class="text-center"><b class="text-gray555">Login to your Account</b></h4>
</div>
<div class="container bg-white" id="login_bg">
    <center>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <a href="includes/facebook-login/"><img src="{{ asset('img/icons/icons8-facebook-50.png') }}" id="login_links" alt="" width="30px"></a>
            </div>
            <div class="col">
                <a href="includes/google-login/"><img src="{{ asset('img/icons/icons8-twitter-50.png') }}" id="login_links" alt="" width="50px"></a>
            </div>
            <div class="col">
                <a href="includes/google-login/"><img src="{{ asset('img/icons/icons8-google-50.png') }}" id="login_links" alt="" width="50px"></a>
            </div>
            <div class="col"></div>
        </div>
        <div class="row my-3">
            <small class="text-gray555">or use your email account</small>
        </div>
    </center>
    <form action="" method="post">
        @csrf
        <input id="txt_email" type="email" class="form-control login-textbox mb-3" placeholder="Email" required>
        <input id="txt_password" type="password" class="form-control login-textbox mb-3" placeholder="Password" required>
        <a href="#" id="label_forgot_password">
            <p><small><b>Forgot Password?</b></small></p>
        </a>
        <button type="submit" id="btn_login">LOGIN</button>
        <p class="mt-3 text-center">
            <small>
                Don't have an Account? <a href="https://plants-iot.free.nf/web/" id="signup"><b>Register here</b></a>
            </small>
        </p>
    </form>
</div>
@endsection