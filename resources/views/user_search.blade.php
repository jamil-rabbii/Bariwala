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
