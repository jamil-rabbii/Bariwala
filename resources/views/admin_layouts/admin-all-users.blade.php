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
									<li><a href="/Admin/allpost">All Post <sup class="text-danger font-weight-bold"> ({{ $all_post_count }})</sup></a></li>
									<li class="hover_active"><a href="/Admin/alluser">Users <sup class="text-danger font-weight-bold">({{ $user_count }})</sup></a></li>
									<li><a href="/admin/see_alladmin/">Admins <sup class="text-danger font-weight-bold">({{ $admin_count }})</sup></a></li>
									<li><a href="/home">User Mode</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-10">
							<!-- All Users -->
							<div class="see-all-users-area">
								<div class="container panel">
									<div class="see-all-users">
										<div class="panel-body">
											<table class="table table-striped">
											  <thead class="bg-secondary text-white">
												<tr>
												  <th scope="col">Img</th>
												  <th scope="col">Name</th>
												  <th scope="col">Email</th>
												  <th scope="col">Age</th>
												  <th scope="col">Action</th>
												</tr>
											  </thead>
											  <tbody>
											  @foreach($users as $row)
												<tr class="">
												  <td scope="row">
													<div class="see-all-users-img">
														<img src="{{ asset('assets/img/upload/profile/'.$row->avatar)}}" alt="" />
													</div>
												  </td>
												  <td>{{$row->name}}</td>
												  <td>{{$row->email}}</td>
												  <td>{{$row->age}}</td>
												  <td>
													@if($row->admin_ship!=2)
													
													<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModel-{{$row->id}}">
										Delete
									</a>
									<div class="modal fade" id="delModel-{{$row->id}}"  role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="text-success">Delete Confirmation...</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<form action="{{url('/admin/del_user',$row->id) }}" id="delForm" method="get" enctype="multipart/form-data">
													{{csrf_field()}}
													<input type="hidden" name="id">
													<div class="modal-body">
														<div class="text-danger">
															<p>Are you sure you want to delete this user? </p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-sm btn-primary">Delete</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>


													<!--<a onclick="myFunction()" href="{{url('/admin/del_user',$row->id) }}" class="btn btn-danger">Delete</a>-->
													@endif
													@if($row->admin_ship==1)
													@elseif($row->admin_ship==2)
													@else
													
											<a type="button" class="btn btn-info" data-toggle="modal" data-target="#adminModel-{{$row->id}}">
										Make Admin
									</a>
									<div class="modal fade" id="adminModel-{{$row->id}}"  role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="text-success">Make Admin...</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<form action="{{url('/admin/make_admin',$row->id) }}" id="delForm" method="get" enctype="multipart/form-data">
													{{csrf_field()}}
													<input type="hidden" name="id">
													<div class="modal-body">
														<div class="text-danger">
															<p>Are you sure you want to change the user role? </p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-sm btn-primary">Yes</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
													@endif
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
			</div>
		</div>
		
@endsection
