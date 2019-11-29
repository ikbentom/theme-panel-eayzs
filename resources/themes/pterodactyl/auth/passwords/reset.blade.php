{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.auth')

<link href="/themes/pterodactyl/vendor/home/animate.css" rel="stylesheet" type="text/css">
<link href="/themes/pterodactyl/vendor/home/animsition.min.css" rel="stylesheet" type="text/css">
<link href="/themes/pterodactyl/vendor/home/util.css" rel="stylesheet" type="text/css">
<link href="/themes/pterodactyl/vendor/home/select2.min.css" rel="stylesheet" type="text/css">
<link href="/themes/pterodactyl/vendor/home/hamburgers.min.css" rel="stylesheet" type="text/css">
<link href="/themes/pterodactyl/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/pterodactyl/vendor/home/daterangepicker.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/themes/pterodactyl/vendor/home/main.css">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<style>
body {
    margin: 0;
    font-family: Poppins,sans-serif;
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #525f7f;
    text-align: left;
    background-color: #171941;
	width: 100%;
	overflow-x:hidden;
}
.squares {
	animation: a 1s infinite;
	background: #ba54f5;
	background: linear-gradient(0deg, #ba54f5, #e14eca);
	position: absolute;
	transition: .5s ease-out;
	overflow: hidden;
	border-radius: 20%
}
.squares.square1 {
	animation: a 4s infinite;
	height: 300px;
	width: 300px;
	opacity: .5;
	left: 3%;
	top: -21%
}
.squares.square2 {
	animation: a 6s infinite;
	height: 400px;
	width: 400px;
	opacity: .4;
	right: -5%;
	top: -12%
}
.squares.square3 {
	animation: a 5s infinite;
	height: 200px;
	width: 200px;
	opacity: .1;
	left: -5%;
	bottom: 0
}
.squares.square4 {
	animation: a 10s infinite;
	height: 100px;
	width: 100px;
	opacity: .9;
	right: 27%;
	top: 70%
}
.squares.square5 {
	animation: a 6s infinite;
	height: 250px;
	width: 250px;
	opacity: .1;
	left: 32%;
	bottom: 29%
}
.squares.square6 {
	animation: a 9s infinite;
	left: 10%;
	top: 35%;
	height: 80px;
	width: 80px;
	opacity: .8
}
.squares.square7 {
	animation: a 3s infinite;
	width: 300px;
	height: 300px;
	right: -5%;
	bottom: 0;
	opacity: .1
}
.col-sm-offset-3 {
	margin-left: none;
    z-index: 1000;
}
.col-sm-6 {
    width: 100%;
}
.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
    font-size: 150%;
	margin-top: 10%;
}
</style>

@section('title')
    Reset Password
@endsection

@section('content')



<div class="row">
    <div class="col-sm-offset-3 col-xs-offset-1 col-sm-6 col-xs-10">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @lang('auth.auth_error')<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach (Alert::getMessages() as $type => $messages)
            @foreach ($messages as $message)
                <div class="callout callout-{{ $type }} alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {!! $message !!}
                </div>
            @endforeach
        @endforeach
    </div>
</div>

	<div class="limiter">
		<div class="container-login100" style="background-image: url(/assets/img/dots.png);background-size:contain;background-repeat: repeat;">
    <div>
      <div class="squares square1"></div>
      <div class="squares square2"></div>
      <div class="squares square3"></div>
      <div class="squares square4"></div>
      <div class="squares square5"></div>
      <div class="squares square6"></div>
      <div class="squares square7"></div>
        <div class="content-center brand">
      </div>
    </div>

			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form id="resetForm" action="{{ route('auth.reset.post') }}" method="POST" class="login100-form validate-form">
				<span class="login100-form-title p-b-49">Reset Password</span>
                <div class="form-group has-feedback">
					<div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input type="email" name="email" class="input100" value="" required placeholder="@lang('strings.email')" autofocus>
						<span class="focus-input100" data-symbol=""></span>
                        @if ($errors->has('email'))
                            <span class="help-block text-red small">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
					</div>
                </div>
                <div class="form-group has-feedback">
					<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input type="password" name="password" class="input100" id="password" required placeholder="@lang('strings.password')" autofocus>
						<span class="focus-input100" data-symbol=""></span>
                        @if ($errors->has('password'))
                            <span class="help-block text-red small">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
					</div>
                </div>
                <div class="form-group has-feedback">
					<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
						<span class="label-input100">Confirm Password</span>
						<input type="password" name="password_confirmation" class="input100" id="password_confirmation" required placeholder="@lang('strings.confirm_password')" autofocus>
						<span class="focus-input100" data-symbol=""></span>
                        @if ($errors->has('password'))
                            <span class="help-block text-red small">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
					</div>
                </div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<div class="col-xs-4">
							</div>
    				<div style="width:100%;!important;" class="col-xs-offset-4 col-xs-4">
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}" />
                        <button type="submit" class="login100-form-btn g-recaptcha pterodactyl-login-button--main" @if(config('recaptcha.enabled')) data-sitekey="{{ config('recaptcha.website_key') }}" data-callback='onSubmit' @endif>@lang('auth.reset_password')</button>
                    </div>
            </form>
        </div>
    </div>
	</div>
</body>

	
	
	
@endsection

@section('scripts')
    @parent
    @if(config('recaptcha.enabled'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
        function onSubmit(token) {
            document.getElementById("resetForm").submit();
        }
        </script>
     @endif
@endsection
