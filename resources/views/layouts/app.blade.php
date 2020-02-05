<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bariwala</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}"/>
	<!--Font-Awsome-->
	<link rel="stylesheet" href="{{ asset('assets/css/all.min.css')}}">
	<!--Favicon link-->
	<link rel="shortcut icon" href="{{ asset('assets/img/pagelogo.png') }}"/>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
	<!--My CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"/>
	<!--Responsive CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}"/>
	@yield('css')
</head>
<body>
    <div id="app">
	<!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                            @endif
                        @else
						
		<header class="header-area">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<a href="tel:+8801712345678"><i class="fa fa-phone" aria-hidden="true"></i>(+88) 01712345678</a>
							<a href="mailto:bariwala@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>realland@gmail.com</a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							
						</div>
					</div>
				</div>
			</div>
			<div class="header-down">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="logo">
								<a href="/">
								<!--<a href="#home"><span>land</span>load</a>-->
								<img src="{{ asset('assets/img/Screenshot_2020-01-25 Landload(7).png')}}" alt="" />
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
						
						
						
						
						

		<nav class="navbar navbar-expand-md shadow-m">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a style="color:white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                   
                                    <a class="dropdown-item" href="{{route('password.change')}}">
                                        {{ __('Change Password') }}
                                    </a>



                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>
						</div>
					</div>
				</div>
			</div>
		</header>	

        <main class="py-4">
            @yield('content')
        </main>
    </div>
	
	@include('frontView.inc.footer')
	
	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
