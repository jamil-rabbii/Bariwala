@extends('layouts.app')

@section('css')
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}"/>
	<!--My CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"/>
	<!--Responsive CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}"/>
@endsection
@section('content')
					@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<!--USER PANNEL STARTED-->
		<div class="user-pannel-area">
			<div class="container-fluid">
				<div class="usser-pannel">
					<div class="row">
						<div class="col-lg-2">
							<div class="user-pannel-left">
								<img src="{{ asset('assets/img/pofile.jpg') }}" alt="" />
								<p>user name</p>
								<a href="#" class="btn box-btn box-btn-submit">my profile</a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="user-pannel-right">
								<div class="row">
									<div class="col-lg-3 col-md-6">
										<div class="single-user-content">
											<i class="fa fa-search-plus" aria-hidden="true"></i>
											<h4><a href="#">search home</a></h4>
										</div>
									</div>
									<div class="col-lg-3 col-md-6">
										<div class="single-user-content" style="background-color: #457b45;">
											<i class="fa fa-plus-circle" aria-hidden="true"></i>
											<h4><a href="#">submit new property</a></h4>
										</div>
									</div>
									<div class="col-lg-3 col-md-6">
										<div class="single-user-content" style="background-color: #919116;">
											<i class="fa fa-star" aria-hidden="true"></i>
											<h4><a href="#">my property</a></h4>
										</div>
									</div>
									<div class="col-lg-3 col-md-6">
										<div class="single-user-content" style="background-color: #a25e5e;">
											<i class="fa fa-heart" aria-hidden="true"></i>
											<h4><a href="#">bookmark listing</a></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
