@extends('frontView.master')

@section('title_area')
	Bariwala
@endsection

@section('content')
	
						<div class="col-lg-6 col-md-6 col-sm-12">
							<!--<div class="submit">
								<a class="box-btn" href="#"><i class="fa fa-plus" aria-hidden="true" style="margin-right:5px;margin-left:0px;"></i>
								{{$user_id}}
								</a>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</header>
<!--HOME VIEW  SECTION START-->
	@foreach($data as $row)
		<div class="home-view-area">
			<div class="container">
				<div class="single-home-view">
					<div class="first-intro">
						<div class="row">
							<div class="col-md-5 col-sm-12">
								<div class="intro-title">
									<h1>{{$row->title}}</h1>
									<p><i class="fa fa-location-arrow" aria-hidden="true"></i>{{$row->location}}</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="rooms-info">
									<div class="row">
										<div class="col-6">
											<h2>{{$row->bedroom}}</h2>
											<p>beds</p>
										</div>
										<div class="col-6">
											<h2>{{$row->bathroom}}</h2>
											<p>baths</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-6">
								<div class="amount">
									<h2><span>&#2547; {{$row->price}}</span></h2>
								</div>
							</div>
							<div class="col-md-2 col-sm-12">
								<div class="add-cart">
									<a href="#">bookmark</a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="home-view-banner-area">
						<div class="number-plate">
							<img src="{{ asset('assets/img/residia_nishi_azabu.jpg') }}" alt="" />
						</div>
						<div class="home-view-banner">
							<img src="{{ asset('assets/img/'.$row->featureimg) }}" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="home-description-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="owner-info">
							@foreach($user_id as $user_info)
							<img src="{{ asset('assets/img/pofile.jpg') }}" alt="" />
							<h3>{{$user_info->name}}</h3>
							<a href="#"><i></i>{{$user_info->email}}</a>
							@endforeach
						</div>
						<div class="similar-home">
							<h2>similar homes :</h2>
							<div class="row">
								<div class="col-12">
									@foreach($similar_home as $home_info)
									<div class="single-similar-home">
										<img src="{{ asset('assets/img/'.$home_info->featureimg) }}" alt="" />
										<div class="single-similar-home-info">
											<h3>{{$home_info->title}}</h3>
											<p><span>&#2547; {{$home_info->price}}</span></p>
										</div>
										<div class="single-similar-home-hover">
											<a href="{{url('/view_post',$home_info->id) }}">view</a>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="home-description">
							<div class="property-description">
								<h2>Property Description</h2>
								<p>{{$row->description}}</p>
							</div>
							<div class="property-description">
								<h2>Property Details</h2>
								<ul>
									<li><b>Property Type:</b> {{$row->propartytype}}</li>
									<li><b>Rent For:</b> {{$row->rentfor}}</li>
									<li><b>Rental Period:</b> {{$row->rentalperiod}}</li>
									<li><b>total Rooms:</b> {{$row->room}}</li>
									<li><b>Parking:</b> {{$row->parking}}</li>
								</ul>
							</div>
							<div class="property-description">
								<h2>Property Features</h2>
								<div class="row">
									<div class="col-md-3 col-sm-12">
										<ul>
										@foreach (explode('|', $row->otherfeatures) as $otherfeatures)
											<li><i class="fa fa-check-square" aria-hidden="true"></i> {{$otherfeatures}}</li>
										@endforeach
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
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