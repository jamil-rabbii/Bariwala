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
												<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModel-{{$row->id}}">
										Delete
									</a>
									<div class="modal fade" id="delModel-{{$row->id}}"  role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="">This Post can't be recoverd if you delete this...</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<form action="{{url('/user_del_post',$row->id) }}" id="delForm" method="get" enctype="multipart/form-data">
													{{csrf_field()}}
													<input type="hidden" name="id">
													<div class="modal-body">
														<div class="">
															<p>Are you sure you want to delete this post? </p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-sm btn-danger">Delete</button>
														</div>
													</form>
												</div>
											</div>
										</div>
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
		</div>
@endsection
