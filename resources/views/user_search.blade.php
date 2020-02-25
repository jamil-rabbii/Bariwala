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
							<div class="admin-pannel-left">
								<ul>
									<li><a href="/user/info">my profile</a></li>
									<li><a class="hover_active" href="/user/search">search home</a></li>
									<li><a href="/user/add_property">advertise home</a></li>
									<li><a href="/user/own_post">my posts</a></li>
									<li><a href="/user/bookmark">bookmark listing</a></li>
									@if(Auth::user()->admin_ship==1)
									<li><a href="/Admin/pending_post">admin mode</a></li>
									@endif
								</ul>
							</div>
						</div>
						<div class="col-lg-10">
							<!--SEARCHING SECTION START-->
							<div class="user-search">
								<section class="search">
									<div class="container">
										<div class="row">
											<div class="col-lg-12 clo-md-12 col-sm-12">
												<form action="/usersr_search_result" method="post" enctype="multipart/form-data">
												@csrf
													<div class="row">
														<div class="col-lg-10 clo-md-10 col-sm-12">
															<div class="row">
																<div class="col-lg-3 clo-md-3 col-sm-12">
																	<div class="form-group">
																		<label for="city">SELECT YOUR CITY</label>
																		<input type="text" class="form-control" id="city" name="city">
																	</div>
																</div>
																<div class="col-lg-3 clo-md-3 col-sm-12">
																	<div class="form-group">
																		<label for="max_price">MAX PRICE</label>
																		<input type="int" class="form-control" id="max_price" name="max_price">
																	</div>
																</div>
																<div class="col-lg-3 clo-md-3 col-sm-12">
																	<div class="form-group">
																		<label for="bedrooms">ROOMS</label>
																		<input type="int" class="form-control" id="bedrooms" name="bedrooms">
																	</div>
																</div>
																<div class="col-lg-3 clo-md-3 col-sm-12">
																	<div class="form-group">
																		<label for="">SEARCHING FOR * </label>
																		<select id="searching_for" class="form-control" name="searching_for">
																			<option value="family" selected>Family</option>
																			<option value="bachelor">Bachelor</option>
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-2 clo-md-2 col-sm-12">
															<button type="submit" class="btn btn-default box-btn search-home">search</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
@endsection
