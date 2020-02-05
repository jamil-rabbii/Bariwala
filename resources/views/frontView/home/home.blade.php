@extends('frontView.master')

@section('title_area')
	Bariwala
@endsection

@section('content')
	
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="submit">
								<a class="box-btn" href="/login"><i class="fa fa-plus" aria-hidden="true" style="margin-right:5px;margin-left:0px;"></i>advertise home</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
<!--BANNER SECTION START-->
		<section id="slider-banner" class="slider-banners">
			<div id="#" class="banner-area">
				<div class="banner">
					<div class="container-fluid">
						<div class="single-banner">
							<h2>the best real estate deals</h2>
							<h1>descover your perfect home</h1>
							<h3><!--save our date--><span class="element"></span></h3>
							<i></i>
						</div>
					</div>
				</div>
			</div>
		</section>
<!--SEARCHING SECTION START-->
		<section class="search">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 clo-md-12 col-sm-12">
						<form action="#">
							<div class="row">
								<div class="col-lg-10 clo-md-10 col-sm-12">
									<div class="row">
										<div class="col-lg-3 clo-md-3 col-sm-12">
											<div class="form-group">
												<label for="city">SELECT YOUR CITY</label>
												<input type="text" class="form-control" id="">
											</div>
										</div>
										<div class="col-lg-3 clo-md-3 col-sm-12">
											<div class="form-group">
												<label for="max_price">MAX PRICE</label>
												<input type="int" class="form-control" id="">
											</div>
										</div>
										<div class="col-lg-3 clo-md-3 col-sm-12">
											<div class="form-group">
												<label for="bedrooms">BEDROOMS</label>
												<input type="int" class="form-control" id="">
											</div>
										</div>
										<div class="col-lg-3 clo-md-3 col-sm-12">
											<div class="form-group">
												<label for="bathrooms">BATHROOMS</label>
												<input type="int" class="form-control" id="">
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
			<div class="container">
				<div class="form-group">
					<div class="sort">
						<div class="row">
							<div class="col-lg-10">
								<!--<label for="sort">sorted by :</label>-->
								<p>sorted by :</p>
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
		</section>
<!--RESULT SECTION START-->
		<section class="result">
			<div class="container">
				<div class="row">
					@foreach($data as $row)
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="single-result">
							<div class="single-result-img">
								<img src="{{ asset('assets/img/'.$row->featureimg) }}" alt="" />
							</div>
							<div class="house-info">
								<div class="row">
									<div class="col-lg-8 col-sm-6">
										<div class="house-info-left">
											<h3>{{$row->title}}</h3>
											<p><i></i> {{$row->location}}</p>
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
											<h1>{{$row->bedroom}}</h1>
											<p>beds</p>
										</div>
										<div class="info-btm">
											<h1>{{$row->bathroom}}</h1>
											<p>baths</p>
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
				</div>
			<p style="color:blue;text-align:center;">	{{ $data->links() }} </p>
			</div>
		</section>
<!--OUR INFO SECTION START-->

		<section class="our-info">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="single-our-info">
							<img src="assets/img/icon_map.png" alt="" />
							<h4>Freshest Market Info</h4>
							<p>Our extensive database of listings and market info provide the most accurate.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="single-our-info">
							<img src="assets/img/icon_search.png" alt="" />
							<h4>Top Local Agents</h4>
							<p>Our extensive database of listings and market info provide the most accurate.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="single-our-info">
							<img src="assets/img/icon_negotiation.png" alt="" />
							<h4>Peace of Mind</h4>
							<p>Our extensive database of listings and market info provide the most accurate.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
<!--CONTACT SECTION START-->
		<section class="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="address">
							
						</div>
					</div>
					<div class="col-lg-6">
						<div class="contact-form">
							
						</div>
					</div>
				</div>
			</div>
		</section>
<!--FOOTER SECTION START-->
		<footer class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<img class="rounded mx-auto d-block" src="assets/img/Screenshot_2020-01-25 Landload(6).png" alt="logo" />
						<p>ReaLand is made for buying and selling houses faster, easier and customized for you.</p>
						<div class="social-link">
							
						</div>
					</div>
				</div>
			</div>
		</footer>
@endsection

@section('js_script')
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/main.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.slicknav.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<script type="text/javascript" src="assets/js/typed.js"></script>
		
		<script type="text/javascript">
			//type	  
			  var typed = new Typed(".element", {
				strings: [
					"the best deal",
					"for you..."
					],
			typeSpeed:50,
			backSpeed:50,
			loop:true
		});
		</script>
@endsection