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
							<div class="user-pannel-right">
								<div class="row">
									<div class="search-user-form">
										
										<form action="/insert" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
											<div class="form-sec row">
												<h3>Basic Information</h3>
													@if(count($errors) >0)
														<div class="alert alert-danger alert-dismissable fade show" role="alert">
															Image validation error <br><br>
															 <button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true">&times;</span>
                                   								 </button>
															<ul>
																@foreach($errors->all() as $errors)
																<li>{{ $errors }}</li> <br>
																@endforeach
															</ul>
														</div>
													@endif

													@if(session('insertsuccess'))
						                                <div class="alert alert-success alert-dismissable fade show" role="alert">
						                                    <b>Thanks!</b> {{session('insertsuccess')}}
						                                    <button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true">&times;</span>
						                                    </button>
						                                </div>
                                				 	@endif
												<div class="form-group col-md-12">
													<label for="">Advertisement Title * </label>
													<input type="" class="form-control" id="title" name="title" placeholder="perfect house for rent">
												</div>
												<div class="form-group col-md-4">
													<label for="">property type * </label>
													<select id="property_type" name="property_type" class="form-control">
														<option value="house" selected>house</option>
														<option value="apartment">apartment</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="">rent for * </label>
													<select id="rent_for" name="rent_for" class="form-control">
														<option value="family" selected>family</option>
														<option value="bachelor">bachelor</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="">rental period * </label>
													<select id="rental_period" name="rental_period" class="form-control">
														<option value="yearly" selected>yearly</option>
														<option value="monthly">monthly</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="price"> price * </label>
													<input type="number" class="form-control" id="price" name="price" placeholder="TK * ">
												</div>
												<div class="form-group col-md-4">
													<label for="room"> room * </label>
													<select id="room" name="room" class="form-control">
														<option value="1" selected>1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">more than 5</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="FeaturedImage">Featured Image * </label>
													<input type="file" class="form-control" id="featured_image" name="featured_image" placeholder="image">
												</div>
												<div class="form-group col-md-4">
													<label for="">Namplate Image * </label>
													<input type="file" class="form-control" id="num_plate" name="num_plate" placeholder="image">
												</div>
												<div class="form-group col-md-4">
													<label for="">Other Images * </label>
													<input type="file" class="form-control" id="other_img" name="other_img[]" placeholder="image" multiple>
													<p style="font-size:12px;text-transform:none;">Upload at least 2 image</p>
												</div>
												<div class="form-group col-md-12">
													<label for="description">Description * </label>
													<textarea class="form-control" rows="5" id="description" name="description"></textarea>
												</div>
											</div>
											<div class="form-sec row">
												<h3>Location</h3>
												<div class="form-group col-md-8">
													<label for="location">Adress * </label>
													<input type="text" class="form-control" id="location" name="location" placeholder="adrress *">
												</div>
												<div class="form-group col-md-4">
													<label for="city">City * </label>
													<input type="text" class="form-control" id="city" name="city" placeholder="city *">
												</div>
											</div>
											<div class="form-sec row">
												<h3>Detailed Information</h3>
												<div class="form-group col-md-4">
													<label for="bedrooms">bedrooms * </label>
													<select id="bedrooms" name="bedrooms" class="form-control">
														<option value="1" selected>1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">more than 5</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="bathrooms">bathrooms * </label>
													<select id="bathrooms" name="bathrooms" class="form-control">
														<option value="1" selected>1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">more than 5</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="parking">parking * </label>
													<select id="parking" name="parking" class="form-control">
														<option value="yes" selected>yes</option>
														<option value="no">no</option>
													</select>
												</div>
											</div>
											<div class="form-sec row">
												<h3>Other Features</h3>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]" value="Air Conditioning">Air Conditioning 
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]" value="Lawn">Lawn
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]"
														value="Swimming Pool">Swimming Pool
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]"
														value="Exercise Room">Exercise Room 
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]"
														value="Barbecue">Barbecue
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]" value="Microwave">Microwave
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]"
														value="TV Cable">TV Cable
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]" value="Washer">Washer
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]" value="Outdoor Shower">Outdoor Shower
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="extra_facilities[]" value="Gym">Gym
													</label>
												</div>
											</div>
											<div class="form-group col-md-4">
												<label for="userId"></label>
												<input type="hidden" class="form-control" id="userId" name="add_id" value="{{ Auth::user()->id }}">
											</div>
											<div class="form-sec row mt-4">
												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <button type="submit" class="btn box-btn box-btn-submit"><i class="fa fa-plus" aria-hidden="true" style="margin-right:5px;"></i>publish</button>
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
		</div>
		
@endsection
