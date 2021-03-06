<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>@yield('title_area')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Google Font-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
		<!--Font-Awsome-->
		<link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
		<!--Animate CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.min.css') }}"/>
		<!--Owl CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.theme.default.css') }}"/>
		<!--Favicon link-->
		<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}"/>
		<!--Barfiller CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/barfiller.css') }}"/>
		<!--Slick Nav CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slicknav.min.css') }}"/>
		<!--Bootstrap CSS-->
		@yield('css')
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
		<!--My CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"/>
		<!--Responsive CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}"/>
		<!--
		 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
		 -->
		
	</head>
	<body>
	
	@include('frontView.inc.header')
	@yield('content')
	@include('frontView.inc.footer')
	
<!-- ===================================================================================================================================
                                                            JAVASCRIPT PLUGIN 
===================================================================================================================================== -->
	@yield('js_script')	
	
	</body>
</html>