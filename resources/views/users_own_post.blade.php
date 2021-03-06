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
									<li><a href="/user/search">search home</a></li>
									<li><a href="/user/add_property">advertise home</a></li>
									<li><a class="hover_active" href="/user/own_post">my posts</a></li>
									<li><a href="/user/bookmark">bookmark listing</a></li>
									@if(Auth::user()->admin_ship==1)
									<li><a href="/Admin/pending_post">admin mode</a></li>
									@endif
								</ul>
							</div>
						</div>
						<div class="col-lg-10">
							<!-- USERS OWN POST -->
							<div class="users-own-post-table">
								<table class="table table-bordered table-hover">
									<thead class="bg-danger text-white">
										<tr>
											<th colspan="2"><i class="fa fa-home" aria-hidden="true"></i>My property</th>
											<th scope="col"><i class="fa fa-calendar-o" aria-hidden="true"></i>Status</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
									@foreach($data as $row)
										<tr>
											<td>
												<img src="{{ asset('assets/img/'.$row->featureimg) }}" alt="" />
											</td>
											<td>
												<div class="user-house-info">
													<h2>{{$row->title}}</h2>
													<p><i class="fa fa-location-arrow" aria-hidden="true"></i>{{$row->location}}</p>
													<h3><span>&#2547; {{$row->price}}</span></h3>
												</div>
											</td>
											<td>
												<div class="ex-date">
												@if($row->aprove == 1)
													<p class="text-success text-center">Aproved</p>
												@else
													<p class="text-danger text-center">Pending</p>
												@endif
												</div>
											</td>
											<td>
												<div class="user-post-table-link">
													<a class="text-warning" href="{{url('/view_post',$row->id) }}"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
													@if($row->visibility == 1)
													<a class="text-success" href="{{url('/user_invisible_post',$row->id) }}"><i class="fa fa-eye" aria-hidden="true"></i>Invisible</a>
													@else
													<a class="text-success" href="{{url('/user_visible_post',$row->id) }}"><i class="fa fa-eye" aria-hidden="true"></i>Visible</a>
													@endif
													<a class="text-danger" href="{{url('/user_del_post',$row->id) }}"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
												</div>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
@endsection
