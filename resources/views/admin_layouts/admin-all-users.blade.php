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
						@include('frontView.inc.admin_view_left')
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
													<a href="{{url('/admin/del_user',$row->id) }}" class="btn btn-danger">Delete</a>
													@if($row->admin_ship==1)
													<a href="{{url('/admin/make_admin',$row->id) }}" class="btn btn-info">Make Admin</a>
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
