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
								<p> {{ Auth::user()->name }}</p>
								<a href="#" class="btn box-btn box-btn-submit">my profile</a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="user-pannel-right">
								<div class="row">
									<div class="search-user-form">
										<form action="#">
											<div class="form-sec row">
												<h3>Basic Information</h3>
												<div class="form-group col-md-12">
													<label for="">Property Title * </label>
													<input type="" class="form-control" id="" placeholder="perfect house for rent">
												</div>
												<div class="form-group col-md-4">
													<label for="">property type * </label>
													<select id="" class="form-control">
														<option selected>house</option>
														<option>apartment</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="">rent for * </label>
													<select id="" class="form-control">
														<option selected>family</option>
														<option>bachelor</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="">rental period * </label>
													<select id="" class="form-control">
														<option selected>house</option>
														<option>apartment</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="">Property price * </label>
													<input type="number" class="form-control" id="" placeholder="TK * ">
												</div>
												<div class="form-group col-md-4">
													<label for="">Property room * </label>
													<select id="" class="form-control">
														<option selected>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>more than 5</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="">Featured Image * </label>
													<input type="file" class="form-control" id="" placeholder="image">
												</div>
												<div class="form-group col-md-12">
													<label for="comment">Description * </label>
													<textarea class="form-control" rows="5" id="comment"></textarea>
												</div>
											</div>
											<div class="form-sec row">
												<h3>Location</h3>
												<div class="form-group col-md-8">
													<label for="">Adress * </label>
													<input type="text" class="form-control" id="" placeholder="adrress *">
												</div>
												<div class="form-group col-md-4">
													<label for="">City * </label>
													<input type="text" class="form-control" id="" placeholder="city *">
												</div>
											</div>
											<div class="form-sec row">
												<h3>Detailed Information</h3>
												<div class="form-group col-md-4">
													<label for="">bedrooms * </label>
													<select id="" class="form-control">
														<option selected>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>more than 5</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="">bathrooms * </label>
													<select id="" class="form-control">
														<option selected>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>more than 5</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="">parking * </label>
													<select id="" class="form-control">
														<option selected>yes</option>
														<option>no</option>
													</select>
												</div>
											</div>
											<div class="form-sec row">
												<h3>Other Features</h3>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="Air Conditioning">Air Conditioning 
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="Lawn">Lawn
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="Swimming Pool">Swimming Pool
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="Exercise Room">Exercise Room 
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="Barbecue">Barbecue
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="Microwave">Microwave
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="TV Cable">TV Cable
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="Washer">Washer
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="Outdoor Shower">Outdoor Shower
													</label>
												</div>
												<div class="form-check" style="margin-right:30px;">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input" value="Outdoor Shower">Gym
													</label>
												</div>
											</div>
											<div class="form-sec row mt-4">
												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													  <button type="submit" class="btn box-btn box-btn-submit">+
													  Submit property</button>
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
