@extends('layouts.app')

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
									<li><a href="/Admin/pending_post">Pending Post <sup class="text-danger font-weight-bold">({{ $pending_count }})</sup></a></li>
									<li class="hover_active"><a href="/Admin/allpost">All Post <sup class="text-danger font-weight-bold"> ({{ $all_post_count }})</sup></a></li>
									<li><a href="/Admin/alluser">Users <sup class="text-danger font-weight-bold">({{ $user_count }})</sup></a></li>
									<li><a href="/admin/see_alladmin/">Admins <sup class="text-danger font-weight-bold">({{ $admin_count }})</sup></a></li>
									<li><a href="/home">User Mode</a></li>
								</ul>
							</div>
						</div>
						<!--@include('frontView.inc.admin_view_left')-->
						<div class="col-lg-10">
							<!-- ALL POST -->
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
											<td  class="d-flex flex-column bd-highlight">
												<a href="{{url('/view_post',$row->id) }}" class="btn btn-sm btn-info mb-1">view</a>
												<a href="{{url('/user_del_post',$row->id) }}" class="btn btn-sm btn-danger">delete</a>
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
