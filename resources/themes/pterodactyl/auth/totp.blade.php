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
	overflow:hidden;
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
</style>

@section('title')
    2FA Checkpoint
@endsection

@section('scripts')
    @parent
    <style>
        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection

@section('content')

	<div class="limiter">
		<div class="container-login100" style="background-image: url(../../assets/img/dots.png);background-size:contain;background-repeat: repeat;">
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
        <form id="totpForm" action="{{ route('auth.totp') }}" method="POST">
            <div class="form-group has-feedback">
                <div class="pterodactyl-login-input">
                    <input type="number" name="2fa_token" class="form-control input-lg" required placeholder="@lang('strings.2fa_token')" autofocus>
                    <span class="fa fa-shield form-control-feedback fa-lg"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-8 col-xs-4">
                    {!! csrf_field() !!}
                    <input type="hidden" name="verify_token" value="{{ $verify_key }}" />
                    <button type="submit" class="btn btn-primary btn-block btn-flat pterodactyl-login-button--main">@lang('strings.submit')</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
