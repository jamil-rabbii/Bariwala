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
									<li><a class="hover_active" href="/user/info">my profile</a></li>
									<li><a href="/user/search">search home</a></li>
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
							<div class="user-own-info-area">
								<div class="row">
									<div class=" col-sm-12 col-md-4">
										<div class="user-own-info">
											@if(count($errors) >0)
														<div class="alert alert-danger alert-dismissable fade show" role="alert">
															Validation error <br><br>
															 <button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true">&times;</span>
                                   								 </button>
															<ul>
																@foreach($errors->all() as $errors)
																<li>{{ $errors }}</li> <br>
																@endforeach
															</ul>
														</div>
													@endif

											<img src="{{ asset('assets/img/upload/profile/'.Auth::user()->avatar)}}" class="rounded mx-auto d-block" alt="" />
											<p><b>name :</b>{{ Auth::user()->name }}</p>
											<p><b>email :</b>{{ Auth::user()->email }}</p>
											<p><b>phone :</b>{{ Auth::user()->phone }}</p>
											<p><b>age :</b>{{ Auth::user()->age }}</p>
											<p><b>gender :</b>{{ Auth::user()->gender }}</p>
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-center update-btn" data-toggle="modal" data-target="#exampleModalCenter">
											  Update
											</button>
										</div>
									</div>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Add More Information</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span class="text-dark" aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										<div class="container">
											<div class="row">
												<div class="col-12">
													<div class="update-form">
														<form class="form-horizontal" action="/user/info_add" method="post" enctype="multipart/form-data">
															{{csrf_field()}}
															<img src="{{ asset('assets/img/upload/profile/'.Auth::user()->avatar)}}" class="rounded mx-auto d-block" alt="" />
														  <div class="form-group row">
															<label class="control-label col-md-2" for="email">Name:</label>
															<div class="col-md-10">
															  <input type="text" class="form-control-sm" id="name" name="username" value="{{Auth::user()->name }}">
															</div>
														  </div>
														  <div class="form-group row">
															<label class="control-label col-md-2" for="email">Phone:</label>
															<div class="col-md-10">
															  <input type="number" class="form-control-sm" id="name" name="phone" value="{{Auth::user()->phone }}">
															</div>
														  </div>
														  <div class="form-group row">
															<label class="control-label col-sm-2" for="pwd">age:</label>
															<div class="col-sm-10">
															  <input type="int" class="form-control-sm" id="age" name="age" placeholder="Your age" value="{{ Auth::user()->age }}">
															</div>
														  </div>
														  <div class="form-group row">
														  <div class="col-2"></div>
															<div class="radio col-10">
																<div class="row">
																	<label class="col-2"><input type="radio" name="gender" value="male"><p>male</p></label>
																	<label class="col-2"><input type="radio" name="gender" value="female"><p>female</p></label>
																	<label class="col-2"><input type="radio" name="gender" value="other"><p>other</p></label>
																</div>
															</div>
														  </div>
														  <div class="form-group row">
															<label class="control-label col-sm-2" for="">profile:</label>
															<div class="col-sm-10">
															  <input type="file" class="form-control-sm" name="avatar" id="" value="{{Auth::user()->avatar }}">
															</div>
														  </div>
														  <div class="form-group mx-auto">
															<div class="col-sm-offset-4 col-sm-8 mx-auto">
															  <button type="submit" class="btn btn-success">Update Info</button>
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
@endsection
