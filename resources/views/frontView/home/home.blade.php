@extends('frontView.master')

@section('title_area')
	Bariwala
@endsection

@section('content')
	
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="submit">
								<a class="box-btn" href="/user/add_property"><i class="fa fa-plus" aria-hidden="true" style="margin-right:5px;margin-left:0px;"></i>advertise home</a>
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
							<div class="log-reg-link mx-auto">
							@guest
								@if (Route::has('register'))
								<a class="border-reg-btn" href="/register">register</a>
								<a class="box-btn" href="/login">log in</a>
								@endif
								@else							
								<!--<a class="box-btn" href="/login">log in</a> -->
							@endguest
							</div>
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
												<div class="col-lg-2 clo-md-2 col-sm-12">
													<div class="form-group">
														<label for="max_price">MIN PRICE</label>
														<input type="int" class="form-control" id="min_price" name="min_price">
													</div>
												</div>
												<div class="col-lg-2 clo-md-2 col-sm-12">
													<div class="form-group">
														<label for="max_price">MAX PRICE</label>
														<input type="int" class="form-control" id="max_price" name="max_price">
													</div>
												</div>
												<div class="col-lg-2 clo-md-2 col-sm-12">
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
								<div class="sorted-nav">
									@if($by??'' == 'ltoh')
									<ul>
										<li id="sorted-nav-up"><a href="{{url('/sorted','ltoh') }}">Price (Low to High)</a><i class="float-right pt-1 fa fa-caret-down" aria-hidden="true"></i></li>
										<div id="sorted-nav-collaps">
											<li><a href="{{url('/sorted','d') }}">Default</a></li>
											<li><a href="{{url('/sorted','htol') }}">Price (High to Low)</a></li>
										</div>
									</ul>
									@elseif($by??'' == 'htol')
									<ul>
										<li id="sorted-nav-up"><a href="{{url('/sorted','htol') }}">Price (High to Low)</a><i class="float-right pt-1 fa fa-caret-down" aria-hidden="true"></i></li>
										<div id="sorted-nav-collaps">
											<li><a href="{{url('/sorted','d') }}">Default</a></li>
											<li><a href="{{url('/sorted','ltoh') }}">Price (Low to High)</a></li>
										</div>
									</ul>
									@else
									<ul>
										<li id="sorted-nav-up"><a href="{{url('/sorted','d') }}">Default</a><i class="float-right pt-1 fa fa-caret-down" aria-hidden="true"></i></li>
										<div id="sorted-nav-collaps">
											<li><a href="{{url('/sorted','ltoh') }}">Price (Low to High)</a></li>
											<li><a href="{{url('/sorted','htol') }}">Price (High to Low)</a></li>
										</div>
									</ul>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<!--RESULT SECTION START-->
		<section class="result">
			<div class="container">
				<h3>Recent Posts</h3>
				<div class="row">
					@foreach($data as $row)
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="single-result">
							<div class="single-result-img">
								<img src="{{ asset('assets/img/'.$row->featureimg) }}" alt="" />
								<!--<div class="view-count">
									<p>{{$row->view_count}}<i class="fas fa-eye"></i></p>
								</div>-->
							</div>
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
									<div class="col-lg-9">
										<div class="info-btm">
											<h1>{{$row->bedroom}}</h1>
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
									<div class="col-lg-3">
										<div class="info-btm-right">
											<a class="border-btn" href="{{url('/view_post',$row->id) }}">details</a>
										</div>
									</div>
									<div class="col-lg-12 col-sm-6">
										<div class="create_at">
											<p>Post created at : {{date('F d, Y',strtotime($row->created_at))}} at {{date('g:ia ',strtotime($row->created_at))}}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<!-- Pagination link is there-->
				<div class="pagination d-flex justify-content-center">
					<div class="row">
						<div class="col-6">
							<p class="" style="color:blue;text-align:center;">	{{ $data->links() }} </p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="result">
			<div class="container">
				<h3>Most Viewed Posts</h3>
				<div class="row">
					@foreach($mostview as $row)
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="single-result">
							<div class="single-result-img">
								<img src="{{ asset('assets/img/'.$row->featureimg) }}" alt="" />
								<!--<div class="view-count">
									<p>{{$row->view_count}}<i class="fas fa-eye"></i></p>
								</div>-->
							</div>
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
									<div class="col-lg-9">
										<div class="info-btm">
											<h1>{{$row->bedroom}}</h1>
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
									<div class="col-lg-3">
										<div class="info-btm-right">
											<a class="border-btn" href="{{url('/view_post',$row->id) }}">details</a>
										</div>
									</div>
									<div class="col-lg-12 col-sm-6">
										<div class="create_at">
											<p>Post created at : {{date('F d, Y',strtotime($row->created_at))}} at {{date('g:ia ',strtotime($row->created_at))}}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<!-- Pagination link is there-->
				<div class="pagination d-flex justify-content-center">
					<div class="row">
						<div class="col-6">
							<p class="" style="color:blue;text-align:center;">	{{ $data->links() }} </p>
						</div>
					</div>
				</div>
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
						<p>Bariwala is made for give rent and find rental houses faster, easier and customized for you.</p>
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
			//nav
			$(document).ready(function(){
			  $("#sorted-nav-up").click(function(){
				$("#sorted-nav-collaps").slideToggle("slow");
			  });
			});
		</script>
@endsection