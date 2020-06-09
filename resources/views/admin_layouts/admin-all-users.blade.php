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
													<a onclick="myFunction()" href="{{url('/admin/del_user',$row->id) }}" class="btn btn-danger">Delete</a>
													@endif
													@if($row->admin_ship==1)
													@elseif($row->admin_ship==2)
													@else
													<a onclick="myFunction()" href="{{url('/admin/make_admin',$row->id) }}" class="btn btn-info">Make Admin</a>
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
		<script type="text/javascript">
			function myFunction() {
				window.alert('Are you sure ?');
			}
		</script>
@endsection
