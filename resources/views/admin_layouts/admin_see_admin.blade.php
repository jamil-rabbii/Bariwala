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
									<li><a href="/Admin/alluser">Users <sup class="text-danger font-weight-bold">({{ $user_count }})</sup></a></li>
									<li class="hover_active"><a href="/admin/see_alladmin/">Admins <sup class="text-danger font-weight-bold">({{ $admin_count }})</sup></a></li>
									<li><a href="/home">User Mode</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-10">
							<!-- All Adimn -->
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
												  <th scope="col">age</th>
												  <th scope="col">Action</th>
												</tr>
											  </thead>
											  <tbody>
											  @foreach($admins as $row)
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
													<a href="{{url('/admin/remove_admin',$row->id) }}" class="btn btn-danger">remove</a>
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
