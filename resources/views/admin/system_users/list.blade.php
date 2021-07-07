@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm border">
										<div class="card-header">
											<h4 class="card-title mb-0">System User</h4>
										</div>
										<div class="card-body">
											<form method="GET" action="{{ route('systemUsers.index') }}">
												<div class="row">
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Username</label>
															<input type="text" name="email" class="form-control" placeholder="Username" value="{{ Request::get('email') }}">
														</div>
													</div>
													<div class="col-sm-2">
														<div class="form-group">
															<label>
															User Role
															<span class="text-danger">*</span>
															</label>
															<select class="form-control select {{ $errors->has('role') ? 'is-invalid' : ''}}" name="role">
																	<option value="">All</option>
		                                                        @foreach ($roles as $role)
		                                                            <option value='{{ $role->name }}' {{ Request::get('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
		                                                        @endforeach
		                                                    </select>
		                                                    {!! $errors->first('role', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Employee Name</label>
															<input type="text" name="name" class="form-control" placeholder="Employee Name" value="{{ Request::get('name') }}">
														</div>
													</div>
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Status</label>
															<select class="form-control select" name="status">
															    <option value='1' {{ old('status') == "1" ? 'selected' : '' }}>Enabled</option>
															    <option value='0' {{ old('status') == "0" ? 'selected' : '' }}>Disabled</option>
															</select>
														</div>
													</div>
													<div class="col-sm-2">
														<div class="form-group">
															<label> .</label><br>															
															<button type="submit" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-search"></span> Search</button>
															<a href="{{ route('systemUsers.index') }}" class="btn btn-danger text-white ctm-border-radius"><span class="fa fa-refresh"></span> Cancel</a>
														</div>
													</div>											
												</div>													
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left">
										<a href="{{ route('systemUsers.create') }}" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
										<a href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius"><span class="fa fa-trash"></span> Delete</a>
									</div>
								</div>
								<div class="card-body">

									<div class="employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table mb-0 table-hover table-striped table-bordered">
												<thead>
													<tr class="bg-blue-header text-white">
														<th class="text-center">
															<input type="checkbox" name="">
														</th>
														<th>Username</th>
														<th>User Role</th>
														<th>Employee Name</th>
														<th>Status</th>
														<!-- <th class="text-right">Action</th> -->
													</tr>
												</thead>
												<tbody>
													@if(count($users) > 0)
														@foreach ($users as $user)
														<tr>
															<td class="text-center">
																<input type="checkbox" name="user_id" value="{{ $user->id }}">
															</td>
															<td>
																<h2><u><a href="{{ route('systemUsers.edit', $user->id) }}">{{ $user->email }}</a></u></h2>
															</td>
															<td>{{ $user->role_name }}</td>
															<td>{{ $user->name }}</td>
															<td>{{ $user->status }}</td>
														</tr>
														@endforeach
													@else
														<tr>
															<td colspan="5"><p class="text-center">No Data Found</p></td>
														</tr>
													@endif
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
			<!--/Content-->
			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection