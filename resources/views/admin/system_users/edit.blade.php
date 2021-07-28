@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">

						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="accordion add-employee" id="accordion-details">
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header" id="basic1">
										<h4 class="cursor-pointer mb-0">
											<a class="ml-2 coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
												Edit System User
											</a>
										</h4>
									</div>
									<div class="card-body p-0">
										<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
											@if($message = Session::get('success'))
												<div class="alert alert-success">
													<p>{{$message}}</p>
												</div>
											@endif

											<form method="POST" action="{{ route('systemUsers.update', [$users[0]->id]) }}">
												@csrf
												@method('PUT')

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Employee Name <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="name" id="employee_name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('name', $users[0]->name) }}" autocomplete="off" readonly="">
															{!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
															<div id="employees_list" class="autocomplete"></div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>User Role <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<select class="form-control select {{ $errors->has('role') ? 'is-invalid' : ''}}" name="role">
		                                                        @foreach ($roles as $role)
		                                                            <option value='{{ $role->name }}' {{ $role->name == $users[0]->role_name ? 'selected' : '' }}>{{ $role->name }}</option>
		                                                        @endforeach
		                                                    </select>
		                                                    {!! $errors->first('role', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Username <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('email', $users[0]->email) }}" readonly="">
															{!! $errors->first('email', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<!-- <div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Status <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<select class="form-control select {{ $errors->has('status') ? 'is-invalid' : ''}}" name="status">
															    <option value='Active' {{ old('status') == "Active" ? 'selected' : '' }}>Active</option>
													    		<option value='In-active' {{ old('status') == "In-active" ? 'selected' : '' }}>In-active</option>
															</select>
															{!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div> -->

												<div class="row">
													<div class="col-sm-2">
														<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
													</div>
												</div>
												<hr>

												<div class="row">
													<div class="col-sm-2"></div>
													<div class="col-sm-3 text-center">
														<div class="row">
															<div class="col-sm-6">
																<div class="submit-section text-center btn-add">
																	<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Update</button>
																</div>
															</div>
															<div class="col-sm-6">
																<a href="{{ route('systemUsers.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
															</div>
														</div>
													</div>
												</div>
											</form>
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

@push('scripts')
<script type="text/javascript">
	// Autocomplete ajax call
	$('#employee_name').keyup(function(){ 
		var employee_name = $(this).val();
		if(employee_name != '')
		{
			var _token = $('input[name="_token"]').val();
			$.ajax({
				method:"POST",
				url: '/employeeNameSearch',
				data:{
					employee_name:employee_name,
					_token:_token
				},
				success:function(data){
					$('#employee_name').removeClass('is-invalid');
					$("#not_exist").remove();

					if(data != ""){					
						$('#employees_list').fadeIn();
						$('#employees_list').html(data);
					}else{
						var exists = ($("#not_exist").length == 0);
					    if (exists) {
					        $('#employee_name').addClass('is-invalid');
							$('#employees_list').fadeOut();
							$('<span id="not_exist" class="invalid-feedback" role="alert">Employee does not exist</span>').insertAfter('#employee_name');
					    }
					}
				}
			});
		} else{
			$('#employees_list').html('');	        	
		}
	});

	$(document).on('click', '.employees', function(){
		$('#employee_name').val($(this).text());
		$('#employees_list').fadeOut();
		$('#employee_name').removeClass('is-invalid');
		$("#not_exist").remove();
	});
</script>    
@endpush