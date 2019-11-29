{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
<!DOCTYPE html>
<html>
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
            {!! Theme::css('vendor/select2/select2.min.css?t={cache-version}') !!}
            {!! Theme::css('vendor/sweetalert/sweetalert.min.css?t={cache-version}') !!}
            {!! Theme::css('vendor/animate/animate.min.css?t={cache-version}') !!}
            {!! Theme::css('css/pterodactyl.css?t={cache-version}') !!}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 
            <!--   Core JS Files   -->
            <script src="/themes/pterodactyl/vendor/home/js/jquery.min.js"></script>
            <script src="/themes/pterodactyl/vendor/home/js/popper.min.js"></script>
            <script src="/themes/pterodactyl/vendor/home/js/bootstrap-material-design.min.js"></script>
            <script src="/themes/pterodactyl/vendor/home/js/perfect-scrollbar.jquery.min.js"></script>
            <script src="/themes/pterodactyl/vendor/home/js/chartist.min.js"></script>
            <script src="/themes/pterodactyl/vendor/home/js/bootstrap-notify.js"></script>
            <script src="/themes/pterodactyl/vendor/home/js/material-dashboard.min.js?v=2.1.0"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
            <!--     Fonts and icons     -->
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="/themes/pterodactyl/vendor/sweetalert/sweetalert.min.css?t=17dd5bea643c7e1d222a1f31860d3ce4">
            <link rel="stylesheet" type="text/css" href="/themes/pterodactyl/css/terminal.css">
  
            <!-- CSS Files -->
            <link href="/themes/pterodactyl/vendor/home/sidebar/material-dashboard.min.css?v=2.1.0" rel="stylesheet">
            <link href="/themes/pterodactyl/vendor/home/sidebar/sidebar.css" rel="stylesheet">
            <link href="/themes/pterodactyl/vendor/home/sidebar.css" rel="stylesheet">
			<link href="/themes/pterodactyl/css/overrides.css" rel="stylesheet">
			

            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        @show
		
		
    </head>
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
		<div class="logo"> <a class="simple-text logo-normal"> BASIC ADMINISTRATION </a> </div>
                        <li class="{{ Route::currentRouteName() !== 'admin.index' ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.index') }}">
                                <i class="material-icons">person</i> <span>Overview</span>
                            </a>
                        </li>
						
                        <li class="{{ Route::currentRouteName() !== 'admin.statistics' ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.statistics') }}">
                                <i class="material-icons">https</i>  <span>Statistics</span>
                            </a>
                        </li>
						
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'admin.settings') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.settings')}}">
                                <i class="fa fa-code"></i> <span>Settings</span>
                            </a>
                        </li>
						
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'admin.api') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.api.index')}}">
                                <i class="fa fa-server"></i> <span>Application API</span>
                            </a>
                        </li>
		<div class="logo"> <a class="simple-text logo-normal"> MANAGEMENT </a> </div>
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'admin.databases') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.databases') }}">
                                <i class="fa fa-database"></i> <span>Databases</span>
                            </a>
                        </li>
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'admin.locations') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.locations') }}">
                                <i class="fa fa-globe"></i> <span>Locations</span>
                            </a>
                        </li>
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'admin.nodes') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.nodes') }}">
                                <i class="fa fa-sitemap"></i> <span>Nodes</span>
                            </a>
                        </li>
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'admin.servers') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.servers') }}">
                                <i class="fa fa-server"></i> <span>Servers</span>
                            </a>
                        </li>
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'admin.users') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.users') }}">
                                <i class="fa fa-users"></i> <span>Users</span>
                            </a>
                        </li>
		<div class="logo"> <a class="simple-text logo-normal"> SERVICE MANAGEMENT </a> </div>
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'admin.nests') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.nests') }}">
                                <i class="fa fa-th-large"></i> <span>Nests</span>
                            </a>
                        </li>
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'admin.packs') ?: 'active' }}">
                            <a class="nav-link" href="{{ route('admin.packs') }}">
                                <i class="fa fa-archive"></i> <span>Packs</span>
                            </a>
                        </li>
		<div class="logo"> <a class="simple-text logo-normal"> Custom Controls </a> </div>
                        <li class="{{ ! starts_with(Route::currentRouteName(), 'customization') ?: 'active' }}">
                            <a class="nav-link" href="/admin/customization/">
                                <i class="fa fa-th-large"></i> <span>Customization</span>
                            </a>
                        </li>


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
                <a class="nav-link" href="{{ route('index') }}" data-toggle="tooltip" data-placement="bottom" title="Exit Admin Control">
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
        </div>
        @section('footer-scripts')
            {!! Theme::js('js/keyboard.polyfill.js') !!}
            <script>keyboardeventKeyPolyfill.polyfill();</script>

            {!! Theme::js('js/laroute.js?t={cache-version}') !!}
            {!! Theme::js('vendor/jquery/jquery.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/sweetalert/sweetalert.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/bootstrap/bootstrap.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/slimscroll/jquery.slimscroll.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/adminlte/app.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/socketio/socket.io.v203.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/bootstrap-notify/bootstrap-notify.min.js?t={cache-version}') !!}
            {!! Theme::js('vendor/select2/select2.full.min.js?t={cache-version}') !!}
            {!! Theme::js('js/admin/functions.js?t={cache-version}') !!}
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

            <script>
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                })
            </script>
        @show
    </body>
</html>
