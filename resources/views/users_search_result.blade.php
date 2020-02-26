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
		
<!--RESULT SECTION START-->
		<div class="container">
			<div class="form-group">
				<div class="sort">
					<div class="row">
						<div class="col-lg-10">
							<!--<label for="sort">sorted by :</label>-->
							<p>Sorted By :</p>
						</div>
						<div class="col-lg-2">
							<select class="form-control" id="">
								<option>default</option>
								<option>Price (Low to High)</option>
								<option>Price (High to Low)</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<section class="result">
			<div class="container">
				<div class="row">
					@foreach($data as $row)
					<div class="col-lg-6 col-sm-12">
						<div class="single-result">
							<img src="{{ asset('assets/img/'.$row->featureimg) }}" alt="house" />
							<div class="house-info">
								<div class="row">
									<div class="col-lg-8 col-sm-6">
										<div class="house-info-left">
											<h3>{{$row->title}}</h3>
											<p><i>{{$row->location}}</i>, {{$row->city}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-6">
										<div class="house-info-right">
											<h3><span>&#2547; {{$row->price}}</span></h3>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="info-btm">
											<h1>{{$row->bedroom}}<sup>+</sup></h1>
											<p>beds</p>
										</div>
										<div class="info-btm">
											<h1>{{$row->bathroom}}</h1>
											<p>baths</p>
										</div>
										<div class="info-btm">
											<h1>{{$row->view_count}}</h1>
											<p><i class="fas fa-eye"></i></p>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="info-btm-right">
											<a class="border-btn" href="{{url('/view_post',$row->id) }}">details</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<!--<div class="col-lg-6 col-sm-12">
						<div class="single-result">
							<img src="assets/img/residia_nishi_azabu.jpg" alt="house" />
							<div class="house-info">
								<div class="row">
									<div class="col-lg-8 col-sm-6">
										<div class="house-info-left">
											<h3>house name</h3>
											<p><i></i> 157 West 57th St, 77 - Central Park South, NYC</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-6">
										<div class="house-info-right">
											<h3><span>&#2547; 6000</span></h3>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="info-btm">
											<h1>5<sup>+</sup></h1>
											<p>beds</p>
										</div>
										<div class="info-btm">
											<h1>3</h1>
											<p>baths</p>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="info-btm-right">
											<a class="border-btn" href="#">details</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</section>
		
		
@endsection
