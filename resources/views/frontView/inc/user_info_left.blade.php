						<div class="col-lg-2">
							<div class="user-pannel-left">
								<img src="{{ asset('assets/img/upload/profile/'.Auth::user()->avatar)}}" alt="" />
								<p> {{ Auth::user()->name }}</p>
								<a href="/user/info" class="btn box-btn box-btn-submit">my profile</a>
								@if(Auth::user()->admin_ship ==1)
								<a href="/Admin/pending_post" class="btn box-btn box-btn-submit mt-3">admin mode</a>
								@endif
							</div>
						</div>