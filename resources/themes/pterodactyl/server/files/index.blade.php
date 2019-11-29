{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.files.header')
@endsection

@section('content-header')
    <h1>@lang('server.files.header')<small>@lang('server.files.header_sub')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a></li>
        <li>@lang('navigation.server.file_management')</li>
        <li class="active">@lang('navigation.server.file_browser')</li>
    </ol>
@endsection

@section('content')
<div class="card">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div id="load_files">
                <div class="box-body table-responsive no-padding">
                    <div class="callout callout-info" style="margin:10px;">@lang('server.files.loading')</div>
                </div>
            </div>
            <div class="box-footer with-border">
                <p class="text-muted small" style="margin: 0 0 2px;">When configuring any file paths in your server plugins or settings you should use <code1>/home/container</code1> as your base path. The maximum size for web-based file uploads to this node is <code1>100 MB</code1>.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
    {!! Theme::js('vendor/async/async.min.js') !!}
    {!! Theme::js('vendor/lodash/lodash.js') !!}
    {!! Theme::js('vendor/siofu/client.min.js') !!}
    @if(App::environment('production'))
        {!! Theme::js('js/frontend/files/filemanager.min.js?updated-cancel-buttons') !!}
    @else
        {!! Theme::js('js/frontend/files/src/index.js') !!}
        {!! Theme::js('js/frontend/files/src/contextmenu.js') !!}
        {!! Theme::js('js/frontend/files/src/actions.js') !!}
    @endif
    {!! Theme::js('js/frontend/files/upload.js') !!}
@endsection
