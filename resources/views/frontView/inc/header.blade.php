<!--HEADER SECTION START-->
		<header class="header-area">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<a href="tel:+8801712345678"><i class="fa fa-phone" aria-hidden="true"></i>(+88) 01712345678</a>
							<a href="mailto:bariwala@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>realland@gmail.com</a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="headerr-login">
							@guest
								@if (Route::has('register'))
								<a href="/login">log in<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
								@endif
								@else
								<a href="/login">My Profile<i class="fa fa-user" aria-hidden="true"></i></a>
							@endguest
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-down">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="logo">
								<a href="">
								<!--<a href="#home"><span>land</span>load</a>-->
								<img src="{{ asset('assets/img/Screenshot_2020-01-25 Landload(7).png')}}" alt="" />
								
							</div>
						</div>