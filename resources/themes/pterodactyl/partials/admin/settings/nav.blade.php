@include('partials/admin.settings.notice')

@section('settings::nav')
    @yield('settings::notice')
<div class="navlinks" style=" margin-top: 0px!important;color: white; ">
    <div class="col-xs-12" style="width: 100%;">
        <div class="nav-tabs-custom nav-tabs-floating">
            <ul class="nav nav-tabs">
                    <li @if($activeTab === 'basic')class="active1"@endif><a href="{{ route('admin.settings') }}">General</a></li>
                    <li @if($activeTab === 'mail')class="active1"@endif><a href="{{ route('admin.settings.mail') }}">Mail</a></li>
                    <li @if($activeTab === 'advanced')class="active1"@endif><a href="{{ route('admin.settings.advanced') }}">Advanced</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
