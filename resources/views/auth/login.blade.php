@extends('layouts.app')

@section('content')
<!--LOGIN SECTION START-->
		<div class="reg-area">
			<div class="container">
				<div class="reg">
					<div class="row">
						<div class="col-lg-5 col-md-5 col-sm-12">
							<div class="reg-left">
								<img src="assets/img/icon_negotiation.png" alt="" />
								<h4>Log In</h4>
								<p>Our extensive database of listings and market info provide the most accurate.</p>
							</div>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-12">
							<div class="reg-right">
								<div class="reg-form">
									<form class="form-horizontal"  method="POST" action="{{ route('login') }}">
									@csrf
										<div class="form-group">
											<div class="row">
												<label for="email" class="control-label col-sm-12">Email:</label>
												<div class="col-sm-12">
													<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
												<label class="control-label col-sm-12" for="password">Password:</label>
												<div class="col-sm-12">
													<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
												</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-6 col-md-offset-4">
												<div class="form-check">
													<input style="margin-left:5px;" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

													<label style="margin-left:5px;" class="form-check-label" for="remember">
														{{ __('Remember Me') }}
													</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-lg-5 col-sm-5">
											  <button type="submit" class="btn box-btn box-btn-submit">
											  {{ __('Login') }}</button>
											</div>
											<div class="forgot-pass">
												<div class="col-lg-5 col-sm-5">
													
												@if (Route::has('password.request'))
													<a class="btn btn-link" href="{{ route('password.request') }}">
														{{ __('Forgot Your Password?') }}
													</a>
												@endif
												</div>
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