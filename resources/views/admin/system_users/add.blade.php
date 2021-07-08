@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left">
										<h4 class="card-title mb-0 text-left ml-2">Add System User</h4>
									</div>
								</div>
								<div class="card-body">
									<form method="POST" action="{{ route('systemUsers.store') }}">
										@csrf
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>User Role <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<select class="form-control select {{ $errors->has('role') ? 'is-invalid' : ''}}" name="role">
                                                        @foreach ($roles as $role)
                                                            <option value='{{ $role->name }}' {{ old('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('role', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Employee Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('name') }}">
													{!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Username <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('email') }}">
													{!! $errors->first('email', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Status <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<select class="form-control select {{ $errors->has('status') ? 'is-invalid' : ''}}" name="status">
													    <option value='1' {{ old('status') == "1" ? 'selected' : '' }}>Enabled</option>
													    <option value='0' {{ old('status') == "0" ? 'selected' : '' }}>Disabled</option>
													</select>
													{!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Password <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('password') }}">
													{!! $errors->first('password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Confirm Password <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="password" name="confirm_password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('confirm_password') }}">
													{!! $errors->first('confirm_password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
												</div>
											</div>
										</div>
										<hr>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-4 text-center">
												<button type="submit" class="btn btn-success text-white ctm-border-radius">Save</button>
												<a href="{{ route('systemUsers.index') }}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
											</div>
										</div>
									</form>
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