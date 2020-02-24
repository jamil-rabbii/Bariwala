						<div class="col-lg-2">
							<div class="admin-pannel-left">
								<ul>
									<li><a href="/user/info">my profile</a></li>
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
						<!-- <div class="col-lg-2">
							<div class="user-pannel-left">
								<img src="{{ asset('assets/img/upload/profile/'.Auth::user()->avatar)}}" alt="" />
								<p> {{ Auth::user()->name }}</p>
								<a href="/user/info" class="btn box-btn box-btn-submit">my profile</a>
								@if(Auth::user()->admin_ship ==1)
								<a href="/Admin/pending_post" class="btn box-btn box-btn-submit mt-3">admin mode</a>
								@endif
							</div>
						</div> -->