{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name', 'Pterodactyl') }} - @yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="_token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/favicons/manifest.json">
        <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
        <link rel="shortcut icon" href="/favicons/favicon.ico">
        <meta name="msapplication-config" content="/favicons/browserconfig.xml">
        <meta name="theme-color" content="#0e4688">

        @include('layouts.scripts')

        @section('scripts')

<!--   Core JS Files   -->
<script src="/themes/pterodactyl/vendor/home/js/jquery.min.js"></script>
<script src="/themes/pterodactyl/vendor/home/js/popper.min.js"></script>
<script src="/themes/pterodactyl/vendor/home/js/bootstrap-material-design.min.js"></script>
<script src="/themes/pterodactyl/vendor/home/js/perfect-scrollbar.jquery.min.js"></script>
<script src="/themes/pterodactyl/vendor/home/js/chartist.min.js"></script>
<script src="/themes/pterodactyl/vendor/home/js/bootstrap-notify.js"></script>
<script src="/themes/pterodactyl/vendor/home/js/material-dashboard.min.js?v=2.1.0"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<script src="/themes/pterodactyl/css/security.css"></script>

		
<!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/themes/pterodactyl/vendor/sweetalert/sweetalert.min.css?t=17dd5bea643c7e1d222a1f31860d3ce4">
    <link rel="stylesheet" type="text/css" href="/themes/pterodactyl/css/terminal.css">
	
	

  
<!-- CSS Files -->
  <link href="/themes/pterodactyl/vendor/home/sidebar/material-dashboard.min.css?v=2.1.0" rel="stylesheet">
  <link href="/themes/pterodactyl/vendor/home/sidebar/sidebar.css" rel="stylesheet">
  <link href="/themes/pterodactyl/vendor/home/sidebar.css" rel="stylesheet">
  <link href="/themes/pterodactyl/vendor/home/sidebar/petro-stuff.css" rel="stylesheet">

<body class="dark-edition">


  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">

      <div class="logo">
        <a href="/account" class="simple-text logo-normal">
          {{ config('app.name', 'Pterodactyl') }}
        </a>
      </div>
      <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="7f03f2d5-71fa-f8a2-23c1-e32e1b22c718" style=" overflow-y: scroll !important; ">
	  
	  
		
        <ul class="nav">
                        <li class="{{ Route::currentRouteName() !== 'account' ?: 'active' }}">
                            <a class="nav-link" href="{{ route('account') }}">
                                <i class="material-icons">person</i> <span>@lang('navigation.account.my_account')</span>
                            </a>
                        </li>
						
                        <li class="{{ Route::currentRouteName() !== 'account.security' ?: 'active' }}">
                            <a class="nav-link" href="{{ route('account.security')}}">
                                <i class="material-icons">https</i>  <span>@lang('navigation.account.security_controls')</span>
                            </a>
                        </li>
						
                        <li class="{{ (Route::currentRouteName() !== 'account.api' && Route::currentRouteName() !== 'account.api.new') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('account.api')}}">
                                <i class="fa fa-code"></i> <span>@lang('navigation.account.api_access')</span>
                            </a>
                        </li>
						
                        <li class="{{ Route::currentRouteName() !== 'index' ?: 'active' }}">
                            <a class="nav-link" href="{{ route('index')}}">
                                <i class="fa fa-server"></i> <span>@lang('navigation.account.my_servers')</span>
                            </a>
                        </li>
						
                        <li class="">
                            <a class="nav-link" id="logoutButton" data-toggle="tooltip" data-placement="bottom" href="{{ route('auth.logout') }}">
                                <i class="fa fa-sign-out"> </i> <span>Logout</span>
                            </a>
                        </li>

    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px; height: 730px;">
	                        @if (isset($server->name) && isset($node->name))
						<div class="logo"> <a class="simple-text logo-normal"> @lang('navigation.server.header') </a> </div>
                            
							<li class="{{ Route::currentRouteName() !== 'server.index' ?: 'active' }}">
							
							<a class="nav-link" href="{{ route('server.index', $server->uuidShort) }}">
                                 <i class="fa fa-terminal"></i> <span>@lang('navigation.server.console')</span>
                             </a>

                            </li>
							
                            @can('list-files', $server)
								<li @if(starts_with(Route::currentRouteName(), 'server.files')) class="active" @endif >
                                        <a class="nav-link" href="{{ route('server.files.index', $server->uuidShort) }}">
                                            <i class="fa fa-files-o"></i> <span>@lang('navigation.server.file_management')</span>
                                        </a>
								</li>
                            @endcan
							
							
                            @can('list-subusers', $server)
                                <li
                                    @if(starts_with(Route::currentRouteName(), 'server.subusers'))
                                        class="active"
                                    @endif
                                >
                                        <a class="nav-link" href="{{ route('server.subusers', $server->uuidShort)}}">
                                            <i class="fa fa-users"></i> <span>@lang('navigation.server.subusers')</span>
                                        </a>
                                </li>
                            @endcan
							
                            @can('list-schedules', $server)
                                <li
                                    @if(starts_with(Route::currentRouteName(), 'server.schedules'))
                                        class="active"
                                    @endif
                                >
									
									<a class="nav-link" href="{{ route('server.schedules', $server->uuidShort)}}">
                                        <i class="fa fa-clock-o"></i> <span>@lang('navigation.server.schedules')</span>
                                        <span class="pull-right-container">
                                            <span class="label label-primary pull-right">{{ \Pterodactyl\Models\Schedule::select('id')->where('server_id', $server->id)->where('is_active', 1)->count() }}</span>
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-databases', $server)
                                <li
                                    @if(starts_with(Route::currentRouteName(), 'server.databases'))
                                    class="active"
                                    @endif
                                >
                                        <a class="nav-link" href="{{ route('server.databases.index', $server->uuidShort)}}">
                                            <i class="fa fa-database"></i> <span>@lang('navigation.server.databases')</span>
                                        </a>
                                </li>
                            @endcan
                            @if(Gate::allows('view-startup', $server) || Gate::allows('access-sftp', $server) ||  Gate::allows('view-allocations', $server))
                                
							<li class="treeview @if(starts_with(Route::currentRouteName(), 'server.settings')) active @endif ">

						<div class="logo"> <a class="simple-text logo-normal"> Configuration </a> </div>

						@can('view-name', $server)
                        <li class="{{ Route::currentRouteName() !== 'server.settings.name' ?: 'active' }}">
                            <a class="nav-link" href="{{ route('server.settings.name', $server->uuidShort) }}">
                                <i class="fa fa-server"></i> <span>@lang('navigation.server.server_name')</span>
                            </a>
                        </li>
                        @endcan
						@can('view-allocations', $server)
                        <li class="{{ Route::currentRouteName() !== 'server.settings.allocation' ?: 'active' }}">
                            <a class="nav-link" href="{{ route('server.settings.allocation', $server->uuidShort) }}">
                                <i class="fa fa-server"></i> <span>@lang('navigation.server.port_allocations')</span>
                            </a>
                        </li>
						@endcan
						@can('access-sftp', $server)
                        <li class="{{ Route::currentRouteName() !== 'server.settings.sftp' ?: 'active' }}">
                            <a class="nav-link" href="{{ route('server.settings.sftp', $server->uuidShort) }}">
                                <i class="fa fa-server"></i> <span>@lang('navigation.server.sftp_settings')</span>
                            </a>
                        </li>
						@endcan
						@can('view-startup', $server)
                        <li class="{{ Route::currentRouteName() !== 'server.settings.startup' ?: 'active' }}">
                            <a class="nav-link" href="{{ route('server.settings.startup', $server->uuidShort) }}">
                                <i class="fa fa-server"></i> <span>@lang('navigation.server.startup_parameters')</span>
                            </a>
                        </li>
						@endcan
                                </li>

								@endif
                            @if(Auth::user()->root_admin)
						<div class="logo"> <a class="simple-text logo-normal"> @lang('navigation.server.admin_header') </a> </div>
		
                                <li>
									<a class="nav-link" href="{{ route('admin.servers.view', $server->id) }}" target="_blank">
                                        <i class="fa fa-cog"></i> <span>@lang('navigation.server.admin')</span>
                                </li>
                            @endif
                        @endif



    </ul>
</aside>
    
	  
	  
	  
	  </div></div>
    <div class="sidebar-background" style="background-image: url(../assets/img/sidebar-2.jpg) "></div></div>
    <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="19092ff2-09e3-5ed6-8274-85ad5f20b0ec">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top collapse" id="navigation-example" style="">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
						
              <li class="nav-item">
                <a class="nav-link" href="{{ route('account') }}" data-toggle="tooltip" data-placement="bottom" title="Account">
                  <i class="material-icons">person</i> <span class="hidden-xs">{{ Auth::user()->name_first }} {{ Auth::user()->name_last }}</span>
                </a>
              </li>
			  
              </li>

                            @if(isset($sidebarServerList))
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="control-sidebar">
                  <i class="fa fa-server"></i>
                </a>
              </li>
                            @endif
							
                            @if(Auth::user()->root_admin)
								
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}" data-toggle="tooltip" data-placement="bottom" title="@lang('strings.admin_cp')">
                  <i class="fa fa-gears"></i>
                </a>
              </li>
                            @endif
							
              <li class="nav-item">
                <a class="nav-link" id="logoutButton1" data-toggle="tooltip" data-placement="bottom" title="@lang('strings.logout')" href="{{ route('auth.logout') }}">
                  <i class="fa fa-sign-out"></i>
                </a>
              </li>

 
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
 
 
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-4 col-lg-12">
	
			
			

                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    @yield('content-header')
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @lang('base.validation_error')<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @foreach (Alert::getMessages() as $type => $messages)
                                @foreach ($messages as $message)
                                    <div class="alert alert-{{ $type }} alert-dismissable" role="alert">
                                        {!! $message !!}
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    @yield('content')
                </section>
            </div>





	<footer class="footer">
		<div class="container-fluid">
			<nav class="float-left">
				<ul>
					<li>
						<a href="{{ route('account') }}">My account</a>
					</li>
					<li>
						<a href="{{ route('index')}}">My Servers</a>
					</li>
					<li>
						<a href="{{ route('account.security')}}">Security Controls</a>
					</li>
				</ul>
			</nav>
			<div class="copyright float-right" id="date">
				Theme licenced by <a href="https://www.mc-market.org/resources/authors/92713/">@Batrowan</a>
			</div>
		</div>
	</footer>

            <footer class="">
                <div class="pull-right small text-gray" style="margin-right:10px;margin-top:-7px;">
                    <strong><i class="fa fa-fw {{ $appIsGit ? 'fa-git-square' : 'fa-code-fork' }}"></i></strong> {{ $appVersion }}<br />
                    <strong><i class="fa fa-fw fa-clock-o"></i></strong> {{ round(microtime(true) - LARAVEL_START, 3) }}s
                </div>
                
            </footer>
			
			
			
			




            @if(isset($sidebarServerList))
                <aside class="control-sidebar control-sidebar-dark">
                    <div class="tab-content">
                        <ul class="control-sidebar-menu">
                            @foreach($sidebarServerList as $sidebarServer)
                                <li>
                                    <a href="{{ route('server.index', $sidebarServer->uuidShort) }}" @if(isset($server) && $sidebarServer->id === $server->id)class="active"@endif>
                                        @if($sidebarServer->owner_id === Auth::user()->id)
                                            <i class="menu-icon fa fa-user bg-blue"></i>
                                        @else
                                            <i class="menu-icon fa fa-user-o bg-gray"></i>
                                        @endif
                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">{{ str_limit($sidebarServer->name, 20) }}</h4>
                                            <p>{{ str_limit($sidebarServer->description, 20) }}</p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            @endif	
            <div class="control-sidebar-bg"></div>
        </div>

         @section('footer-scripts')
            {!! Theme::js('js/keyboard.polyfill.js?t={cache-version}') !!}
            <script>keyboardeventKeyPolyfill.polyfill();</script>

            {!! Theme::js('js/laroute.js?t={cache-version}') !!}
            {!! Theme::js('vendor/jquery/jquery.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/sweetalert/sweetalert.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/bootstrap/bootstrap.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/slimscroll/jquery.slimscroll.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/adminlte/app.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/socketio/socket.io.v203.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/bootstrap-notify/bootstrap-notify.min.js?t={cache-version}') !!}
            {!! Theme::js('js/autocomplete.js?t={cache-version}') !!}

            @if(Auth::user()->root_admin)
                <script>
                    $('#logoutButton').on('click', function (event) {
                        event.preventDefault();

                        var that = this;
                        swal({
                            title: 'Do you want to log out?',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d9534f',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Log out'
                        }, function () {
                            window.location = $(that).attr('href');
                        });
                    });
                </script>
            @endif
			
            @if(Auth::user()->root_admin)
                <script>
                    $('#logoutButton1').on('click', function (event) {
                        event.preventDefault();

                        var that = this;
                        swal({
                            title: 'Do you want to log out?',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d9534f',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Log out'
                        }, function () {
                            window.location = $(that).attr('href');
                        });
                    });
                </script>
            @endif
			
        @show
    </body>
</html>
