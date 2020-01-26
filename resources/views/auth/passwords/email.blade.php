@extends('layouts.app')

@section('content')
		<header class="header-area">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<a href="#"><i></i>(+88) 01712345678</a>
							<a href="#"><i></i>realland@gmail.com</a>
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
								<img src="assets/img/Screenshot_2020-01-25 Landload(7).png" alt="" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="submit" style="float:right;margin-top:0;margin-left:0;">
								<a class="box-btn" href="{{ route('register') }}" style="float:right;">register<i></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
<div class="container">
	<div class="extra-padding" style="padding:100px 0;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn box-btn box-btn-submit">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
