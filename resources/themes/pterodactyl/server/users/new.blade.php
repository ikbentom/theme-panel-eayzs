{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.users.new.header')
@endsection

@section('content-header')
    <h1>@lang('server.users.new.header')<small>@lang('server.users.new.header_sub')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a></li>
        <li><a href="{{ route('server.subusers', $server->uuidShort) }}">@lang('navigation.server.subusers')</a></li>
        <li class="active">@lang('server.users.add')</li>
    </ol>
@endsection

@section('content')
<?php $oldInput = array_flip(is_array(old('permissions')) ? old('permissions') : []) ?>
<form action="{{ route('server.subusers.new', $server->uuidShort) }}" method="POST">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="form-group">
                        <label class="control-label">@lang('server.users.new.email')</label>
                        <div>
                            {!! csrf_field() !!}
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                            <p class="text-muted small">@lang('server.users.new.email_help')</p>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="btn-group pull-left">
                        <a id="selectAllCheckboxes" class="btn btn-sm btn-default">@lang('strings.select_all')</a>
                        <a id="unselectAllCheckboxes" class="btn btn-sm btn-default">@lang('strings.select_none')</a>
                    </div>
                    <input type="submit" name="submit" value="@lang('server.users.add')" class="pull-right btn btn-sm btn-primary" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($permissions as $block => $perms)
            <div class="col-sm-6" style="max-width: 100%;">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-warning">
                        <h3 class="card-title">@lang('server.users.new.' . $block . '_header')</h3>
                    </div>
                    <div class="card-body">
                        @foreach($perms as $permission => $daemon)
                            <div class="tab-content">
                                <div class="tab-pane active">

	<div class="form-check">
		<label for="{{ $permission }}" class="form-check-label">
		<input @lang('server.users.new.' . str_replace('-', '_', $permission) . '.title') id="{{ $permission }}" name="permissions[]" type="checkbox" value="{{ $permission }}" class="form-check-input">
		<span class="form-check-sign"><span class="check"></span></span> <p class="text-muted small" style=" font-size: 100%; ">@lang('server.users.new.' . str_replace('-', '_', $permission) . '.description')</p></label>
	</div>
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if ($loop->iteration % 2 === 0)
                <div class="clearfix visible-lg-block visible-md-block visible-sm-block"></div>
            @endif
        @endforeach
    </div>
</form>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#selectAllCheckboxes').on('click', function () {
                $('input[type=checkbox]').prop('checked', true);
            });
            $('#unselectAllCheckboxes').on('click', function () {
                $('input[type=checkbox]').prop('checked', false);
            });
        })
    </script>
@endsection
