<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>@yield('title_area')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Google Font-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
		<!--Font-Awsome-->
		<link rel="stylesheet" href="assets/css/all.min.css">
		<!--Animate CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/animate.min.css"/>
		<!--Owl CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.css"/>
		<!--Favicon link-->
		<link rel="shortcut icon" href="assets/img/favicon.png"/>
		<!--Barfiller CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/barfiller.css"/>
		<!--Slick Nav CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/slicknav.min.css"/>
		<!--Bootstrap CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
		<!--My CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
		<!--Responsive CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/responsive.css"/>
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