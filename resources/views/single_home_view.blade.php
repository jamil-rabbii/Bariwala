@extends('frontView.master')

@section('title_area')
	Bariwala
@endsection

@section('css')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
									<p><i class="fas fa-city"></i>{{$row->city}}</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="rooms-info">
									<div class="row">
										<div class="col-4">
											<h2>{{$row->bedroom}}</h2>
											<p>beds</p>
										</div>
										<div class="col-4">
											<h2>{{$row->bathroom}}</h2>
											<p>baths</p>
										</div>
										<div class="col-4">
											<h2>{{$row->view_count}}</h2>
											<p><i class="fas fa-eye"></i></p>
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
							@if($book==-1)
							@elseif($book==0)
								<div id="bookmark" class="add-cart">
									<a id="bookmark_link" href="{{url('/user_bookmark_post',$row->id) }}">bookmark</a>
								</div>
							@else
								<div id="remove_bookmark" class="remove-cart">
									<a id="remove_bookmark_link" href="{{url('/user_remove_bookmark',$book) }}">remove</a>
								</div>
							@endif
							</div>
						</div>
					</div>
					
					<div class="home-view-banner-area">
						<div class="number-plate">
							<img src="{{ asset('assets/img/upload/'.$row->num_plate) }}" alt="" />
						</div>
						<div class="home-view-banner">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators
							<ol class="carousel-indicators">
							  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							  <li data-target="#myCarousel" data-slide-to="1"></li>
							  <li data-target="#myCarousel" data-slide-to="2"></li>
							  <li data-target="#myCarousel" data-slide-to="3"></li>
							  <li data-target="#myCarousel" data-slide-to="4"></li>
							</ol>
						 -->
						<!-- Wrapper for slides -->
							<div class="carousel-inner">
							  <div class="item active">
								<img src="{{ asset('assets/img/'.$row->featureimg) }}" alt="" />
							  </div>
							@foreach (explode('|', $row->other_img) as $image)
							  <div class="item">
								<img src="{{ asset('assets/img/upload/other_img/'.$image) }}" alt="" />
							  </div>
							@endforeach
							</div>
						<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							  <span style="color:white;" class="glyphicon glyphicon-chevron-left"></span>
							  <span style="color:white;" class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next">
							  <span style="color:white;" class="glyphicon glyphicon-chevron-right"></span>
							  <span style="color:white;" class="sr-only">Next</span>
							</a>
						</div>
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
						@if($user_id != NUll)
							@foreach($user_id as $user_info)
							<img src="{{ asset('assets/img/upload/profile/'.$user_info->avatar)}}" alt="" />
							<h3>{{$user_info->name}}</h3>
							<a href="#"><i></i>{{$user_info->email}}</a>
							@endforeach
						@endif
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
										@foreach (explode(',', $row->otherfeatures) as $otherfeatures)
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
		<!-- Comment sec start -->
<!--		<div class="comment-area">
			<div class="container">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse1"><i class="fa fa-comment" aria-hidden="true"></i>{{ COUNT($comment)}} Coments<i class="fa fa-caret-down" aria-hidden="true"></i></a>
						  </h4>
						</div>
						<!-- comment reply -->
	<!--					<div id="collapse1" class="panel-collapse collapse">
							<ul class="list-group">
							@foreach($comment as $comments)
							@if($comments->ref_id == NULL)
								<li class="list-group-item">
									<div class="single-comment">
										<div class="row">
											<div class="col-md-1 col-sm-2">
												<img src="{{ asset('assets/img/upload/profile/'.$comments->avatar) }}" alt="" />
											</div>
											<div class="col-md-11 col-sm-10">
												<h2>{{ $comments->name }}</h2>
												<p>{{ $comments->comment }}</p>
												<a data-toggle="collapse" class="show-reply" href="#{{ $comments->id }}">reply<i class="fa fa-caret-down" aria-hidden="true"></i></a>
											@guest
												@if (Route::has('register'))
													
												@endif
												@else
												@if(Auth::user()->id == $comments->user_id || Auth::user()->id == $row->addid || Auth::user()->admin_ship == 1)
												@if(Auth::user()->id == $comments->user_id)
												<a class="show-reply ml-3" href="#" data-toggle="modal" data-target="#{{ 'id'.$comments->id }}">edit</a>
												@endif
												<a class="show-reply ml-3" href="{{url('/del_comment',$comments->id) }}">delete</a>
												@endif
											@endguest
												<p class="float-right">{{ $comments->updated_at }}</p>
												<a style="display:none;" class="hide-reply" data-toggle="collapse" href="#collapse2">hide replies<i class="fa fa-caret-up" aria-hidden="true"></i></a>
												
												<!-- Modal -->
	<!--											<div class="modal fade" id="{{ 'id'.$comments->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
													<div class="modal-content">
													  <div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle">Update your comment..</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span class="text-dark" aria-hidden="true">&times;</span>
														</button>
													  </div>
														<div class="modal-body">
															<div class="container">
																<div class="row">
																	<div class="col-12">
																		<div class="update-form">
																			<form class="form-horizontal" action="/edit_comment" method="post" enctype="multipart/form-data">
																				{{csrf_field()}}
																				<input type="text" class="form-control" id="" name="comment" value="{{ $comments->comment }}" aria-describedby="">
																				<input type="text" class="form-control" id="" name="comment_id" value="{{ $comments->id }}" aria-describedby="">
																				<div class="form-group mx-auto">
																					<div class="col-sm-offset-4 col-sm-8 mx-auto">
																					  <button type="submit" class="btn btn-info mt-3">Update Info</button>
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													  </div>
													</div>
												  </div>
												</div>
												<!-- modal end -->
												
												
	<!--										</div>
										</div>
									</div>
									<div id="{{ $comments->id }}" class="panel-collapse collapse">
										<ul class="list-group">
										@foreach($comment as $replies)
											@if($replies->ref_id == $comments->id)
											<li class="list-group-item">
												<div class="comment-reply">
													<div class="single-comment">
														<div class="row">
															<div class="col-md-1 col-sm-2">
																<img src="{{ asset('assets/img/upload/profile/'.$replies->avatar) }}" alt="" />
															</div>
															<div class="col-md-11 col-sm-10">
																<h2>{{ $replies->name }}</h2>
																<p>{{ $cc=$replies->comment }}</p>
															@guest
																@if (Route::has('register'))
																	
																@endif
																@else
																@if(Auth::user()->id == $comments->user_id || Auth::user()->id == $row->addid || Auth::user()->admin_ship == 1)
																@if(Auth::user()->id == $replies->user_id)
																<a class="show-reply ml-3" href="#" data-toggle="modal" data-target="#{{ 'colid'.$replies->id }}">edit</a>
																@endif
																<a class="show-reply ml-3" href="{{url('/del_comment',$replies->id) }}">delete</a>
																@endif
															@endguest
																<p class="float-right">{{ $comments->updated_at }}</p>
															<!-- Modal -->
	<!--															<div class="modal fade" id="{{ 'colid'.$replies->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
																  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
																	<div class="modal-content">
																	  <div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLongTitle">Update your comment..</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		  <span class="text-dark" aria-hidden="true">&times;</span>
																		</button>
																	  </div>
																		<div class="modal-body">
																			<div class="container">
																				<div class="row">
																					<div class="col-12">
																						<div class="update-form">
																							<form class="form-horizontal" action="/edit_comment" method="post" enctype="multipart/form-data">
																								{{csrf_field()}}
																								<input type="text" class="form-control" id="" name="comment" value="{{ $cc }}" aria-describedby="">
																								<input type="hidden" class="form-control" id="" name="comment_id" value="{{ $replies->id }}" aria-describedby="">
																								<div class="form-group mx-auto">
																									<div class="col-sm-offset-4 col-sm-8 mx-auto">
																									  <button type="submit" class="btn btn-info mt-3">Update Info</button>
																									</div>
																								</div>
																							</form>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	  <div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	  </div>
																	</div>
																  </div>
																</div>
																<!-- modal end -->
	<!--														</div>
														</div>
													</div>
												</div>
											</li>
											@endif
										@endforeach
										</ul>
										<div class="panel-footer">
											<form action="/comment" method="post" enctype="multipart/form-data">
											{{csrf_field()}}
												<div class="row">
													<div class="col-md-11 col-sm-11">
														<div class="form-group-sm">
														<input type="text" class="form-control" id="reply" name="comment" aria-describedby="" placeholder="add your reply...">
														<input type="hidden" class="form-control" id="post_id" name="post_id" value="{{$row->id}}" aria-describedby>
														<input type="hidden" class="form-control" id="ref_id" name="ref_id" value="{{$comments->id}}" aria-describedby>
														</div>
													</div>
													<div class="col-md-1 col-sm-1">
														<button type="submit" class="btn btn-reply btn-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</li>
							@endif
							@endforeach
							</ul>
						<div class="panel-footer">
							<form action="/comment" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
								<div class="row">
									<div class="col-md-11 col-sm-11">
										<div class="form-group">
											<input type="text" class="form-control" id="reply" name="comment" aria-describedby="" placeholder="add your comment...">
											<input type="hidden" class="form-control" id="post_id" name="post_id" value="{{$row->id}}" aria-describedby>
										</div>
									</div>
									<div class="col-md-1 col-sm-1">
										<button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
									</div>
								</div>
							</form>
						</div>
						</div>
						<!-- comment reply end -->
	<!--				  </div>
					</div>
			</div>
		</div>
		<!-- comment sec end -->
	@endforeach
@endsection

@section('js_script')
	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection