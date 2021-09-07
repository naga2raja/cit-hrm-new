@extends('layout.mainlayout')
@section('mytitle', 'System User')
@section('content')
<!-- Content -->

<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<!-- left side -->
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Admin</a></li>
															<li class="breadcrumb-item d-inline-block active">User Management</li>
														</ol>
														<h4 class="text-dark">System Users</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchSystemUsers" method="GET" action="{{ route('systemUsers.index') }}">

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Employee Name</label>
														<select class="employee_name form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" id="employee_name" style="width: 100%" >
															@if(Request::get('emp_name'))
																<option selected="selected" id="{{ Request::get('employee_id') }}">{{ Request::get('emp_name'), old('name') }}</option>
															@endif
														</select>
														{!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}														
														<input type="hidden" name="emp_name" id="emp_name" class="form-control">
														<input type="hidden" name="employee_id" id="employee_id" value="{{ (Request::get('employee_id')) ? Request::get('employee_id') : '' }}">
													</div>
												</div>
											</div>

											<!-- <div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Username</label>
														<input type="text" name="email" class="form-control" placeholder="Username" value="{{ Request::get('email') }}" autocomplete="off">
		                                                {!! $errors->first('email', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													</div>
												</div>
											</div> -->

											<div class="row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Role</label>
														<select class="form-control select {{ $errors->has('role') ? 'is-invalid' : ''}} select2-hidden-accessible" name="role" tabindex="-1" aria-hidden="true">
																<option value="" selected="">Select User Role</option>
																<option value="all" {{ Request::get('role') == 'all' ? 'selected' : '' }}>All</option>
		                                                    @foreach ($roles as $role)
		                                                        <option value='{{ $role->name }}' {{ Request::get('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
		                                                    @endforeach
		                                                </select>
		                                                {!! $errors->first('role', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Status</label>
														<select class="form-control select" name="status">
															<option value="">Select Status</option>
														    <option value='Active' {{ Request::get('status') == "Active" ? 'selected' : '' }}>Active</option>
														    <option value='In active' {{ Request::get('status') == "In active" ? 'selected' : '' }}>In-active</option>
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-search"></i> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('searchSystemUsers')"><i class="fa fa-refresh"></i> Reset </button>
												</div>
											</div>												
										</form>
									</div>
								</div>
							</aside>
						</div>
						<!-- left side end -->

						<!-- right side -->
						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-8 col-lg-7 col-xl-8">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">System Users</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
												<a href="{{ route('systemUsers.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_user_table','systemUsers','{{ route('systemUsers.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
								</div>
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light">
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_user_table')">
													</th>
													<th>Username</th>
													<th>User Role</th>
													<th>Employee Name</th>
													<th>Status</th>
													<!-- <th class="text-right">Action</th> -->
												</tr>
											</thead>
											<tbody id="list_user_table">
												@if(count($users) > 0)
													@foreach ($users as $user)
													<tr>
														<td class="text-center">
															<input type="checkbox" name="user_id" value="{{ $user->user_id }}" {{ ($user->user_id == auth()->user()->id) ? 'disabled' : '' }}>
														</td>
														<td>
															@if($user->user_id != auth()->user()->id)
																<h2><u><a href="{{ route('systemUsers.edit', @$user->user_id) }}">{{ $user->email }}</a></u></h2>
															@else																
																<h2>{{ $user->email }}</h2>
															@endif
														</td>
														<td>{{ $user->role_name }}</td>
														<td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
														<td>
															@if($user->emp_status == 'In active')
																<a class="btn btn-outline-danger btn-sm" style="width: 60%"> Inactive </a>
															@elseif($user->emp_status == 'Active')
																<a class="btn  btn-outline-success btn-sm" style="width: 60%"> Active </a>
															@endif
														</td>
													</tr>
													@endforeach
												@else
													<tr>
														<td colspan="5"><p class="text-center alert alert-danger">No Data Found</p></td>
													</tr>
												@endif
													<tr>
														<td colspan="5">
															<div class="d-flex justify-content-center">
																{{ $users->links() }}
															</div>
														</td>
													</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>

		<!--  Validation Modal -->
		<div class="modal fade" id="validation_message">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">		
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title mb-3"></h5><hr>
						<p class="modal-message"></p>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3 mt-4" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
@endsection

@push('scripts')
<script type="text/javascript">

	// Autocomplete ajax call
	$('.employee_name').select2({
		placeholder: 'Select a employee',
		allowClear: true,
		ajax: {
			url: '{{ route("ajax.employee_search") }}',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results:  $.map(data, function (item) {
						return {
							text: item.name,
							id: item.id
						}
					})
				};
			},
			cache: true
		}		
	});

	$(document.body).on("change","#employee_name",function(){
	 	$('#employee_id').val(this.value);
	 	var emp_name = $("#employee_name option:selected").html();
	 	$('#emp_name').val(emp_name);
	});


	function validation_popup_msg(){
		@if (Session::get('success'))
			 title = 'Success'; msg = '{{ Session::get("success") }}';
		@elseif (Session::get('error'))
			 title = 'Failed'; msg = '{{ Session::get("error") }}';
		@endif

		@if ((Session::get('success'))||(Session::get('error')))
			$('#validation_message').modal('toggle');
			$('.modal-title').html(title);
			$('.modal-message').html(msg);
		@endif
	}

	window.onload = function() {
		// calling validation_popup_msg
		validation_popup_msg();
	}
</script>    
    <!-- <script src="{{ asset('js/system_users.js')}}"></script> -->
@endpush