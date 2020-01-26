@extends('layouts.app')

@section('content')
		<header class="header-area">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<a href="#"><i></i>(+88) 01712345678</a>
							<a href="#"><i></i>bariwala@gmail.com</a>
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
								<!--<a href="#home"><span>land</span>load</a>-->
								<img src="{{ asset('assets/img/Screenshot_2020-01-25 Landload(7).png')}}" alt="" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="submit" style="float:right;margin-top:0;margin-left:0;">
								<a class="box-btn" href="{{ route('login') }}" style="float:right;">Signin<i></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
<!--REGISTER SECTION START-->
		<div class="reg-area">
			<div class="container">
				<div class="reg">
					<div class="row">
						<div class="col-lg-5 col-md-5 col-sm-12">
							<div class="reg-left">
								<img src="assets/img/icon_negotiation.png" alt="" />
								<h4>Please 
								register</h4>
								<p>Our extensive database of listings and market info provide the most accurate.</p>
							</div>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-12">
							<div class="reg-right">
								<div class="reg-form">
									<form class="form-horizontal" method="POST" action="{{ route('register') }}">
									@csrf
									<div class="form-group">
										<div class="row">
											<label class="control-label col-lg-2 col-md-12 col-sm-2" for="name">Name:</label>
											<div class="col-lg-10 col-md-12 col-sm-10">
											  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

												@error('name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<label class="control-label col-lg-2 col-md-12 col-sm-2" for="email">Email:</label>
											<div class="col-lg-10 col-md-12 col-sm-10">
												<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<label class="control-label col-lg-2 col-md-12 col-sm-12" for="password">Password:</label>
											<div class="col-lg-10 col-md-12 col-sm-12">
												<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<label class="control-label col-lg-2 col-md-12 col-sm-12" for="password-confirm">
											Confirm-password:</label>
											<div class="col-lg-10 col-md-12 col-sm-12">
												<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
										  <button type="submit" class="btn box-btn box-btn-submit">Sign Up</button>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
