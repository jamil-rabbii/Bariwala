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
									<li class="hover_active"><a href="/Admin/pending_post">Pending Post</a></li>
									<li><a href="/Admin/allpost">All Post</a></li>
									<li><a href="/Admin/alluser">Users</a></li>
									<li><a href="/admin/see_alladmin/">Admins</a></li>
									<li><a href="/home">User Mode</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-10">
							<!-- PENDING POST -->
							<div class="users-own-post-table">
							<div class="pannel-body">
								<table class="table table-bordered table-hover">
									<thead class="bg-secondary text-white">
										<tr>
											<th colspan="2"><i class="fa fa-home" aria-hidden="true"></i>Property Descriptions</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($pending as $row)
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
											<td  class="d-flex flex-column bd-highlight">
												<a href="{{url('/view_post',$row->id) }}" class="btn btn-sm btn-info">View</a>
												<a href="{{url('/admin/accept_pending',$row->id) }}" class="btn btn-sm btn-success mt-1 mb-1">Accept</a>
												<a href="{{url('/user_del_post',$row->id) }}" class="btn btn-sm btn-danger">Ignore</a>
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
		</div>
		
@endsection
