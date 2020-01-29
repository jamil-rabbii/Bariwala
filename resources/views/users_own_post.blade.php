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
						@include('frontView.inc.user_info_left')
						<div class="col-lg-10">
							<!-- USERS OWN POST -->
							<div class="users-own-post-table">
								<table class="table table-bordered table-hover">
									<thead class="bg-danger text-white">
										<tr>
											<th colspan="2"><i class="fa fa-home" aria-hidden="true"></i>My property</th>
											<th scope="col"><i class="fa fa-calendar-o" aria-hidden="true"></i>Expiration Date</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<img src="{{ asset('assets/img/dream_house_take_away.jpg') }}" alt="" />
											</td>
											<td>
												<div class="user-house-info">
													<h2>Weston Hightpointe Place</h2>
													<p><i></i>157 West 57th St, 77 - Central Park South, NYC</p>
													<h3><span>&#2547; 6000</span></h3>
												</div>
											</td>
											<td>
												<div class="ex-date">
													<p>30 December, 2018</p>
												</div>
											</td>
											<td>
												<div class="user-post-table-link">
													<a class="text-success" href="#"><i class="fa fa-minus-circle" aria-hidden="true"></i>edit</a>
													<a class="text-danger" href="#"><i class="fa fa-trash" aria-hidden="true"></i>delete</a>
												</div>
											</td>
										</tr>
										<!--<tr>
											<td>
												<img src="{{ asset('assets/img/dream_house_take_away.jpg') }}" alt="" />
											</td>
											<td>
												<div class="user-house-info">
													<h2>Weston Hightpointe Place</h2>
													<p><i></i>157 West 57th St, 77 - Central Park South, NYC</p>
													<h3><span>&#2547; 6000</span></h3>
												</div>
											</td>
											<td>
												<div class="ex-date">
													<p>30 December, 2018</p>
												</div>
											</td>
											<td>
												<div class="user-post-table-link">
													<a class="text-success" href="#"><i class="fa fa-minus-circle" aria-hidden="true"></i>edit</a>
													<a class="text-danger" href="#"><i class="fa fa-trash" aria-hidden="true"></i>delete</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<img src="{{ asset('assets/img/residia_nishi_azabu.jpg') }}" alt="" />
											</td>
											<td>
												<div class="user-house-info">
													<h2>Weston Hightpointe Place</h2>
													<p><i></i>157 West 57th St, 77 - Central Park South, NYC</p>
													<h3><span>&#2547; 6000</span></h3>
												</div>
											</td>
											<td>
												<div class="ex-date">
													<p>30 December, 2018</p>
												</div>
											</td>
											<td>
												<div class="user-post-table-link">
													<a class="text-success" href="#"><i class="fa fa-minus-circle" aria-hidden="true"></i>edit</a>
													<a class="text-danger" href="#"><i class="fa fa-trash" aria-hidden="true"></i>delete</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<img src="{{ asset('assets/img/dream_house_take_away.jpg') }}" alt="" />
											</td>
											<td>
												<div class="user-house-info">
													<h2>Weston Hightpointe Place</h2>
													<p><i></i>157 West 57th St, 77 - Central Park South, NYC</p>
													<h3><span>&#2547; 6000</span></h3>
												</div>
											</td>
											<td>
												<div class="ex-date">
													<p>30 December, 2018</p>
												</div>
											</td>
											<td>
												<div class="user-post-table-link">
													<a class="text-success" href="#"><i class="fa fa-minus-circle" aria-hidden="true"></i>edit</a>
													<a class="text-danger" href="#"><i class="fa fa-trash" aria-hidden="true"></i>delete</a>
												</div>
											</td>
										</tr>-->
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
@endsection
