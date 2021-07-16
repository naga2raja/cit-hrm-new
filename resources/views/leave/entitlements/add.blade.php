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
									Add Leave Entitlement
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

								@if($message = Session::get('error'))
								<div class="alert alert-danger">
									<p>{{$message}}</p>
								</div>
								@endif

								<form method="POST" action="{{ route('leaveEntitlement.store') }}">
									@csrf
									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label for="multiple_employee">Add to Multiple Employees</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<input type="checkbox" name="multiple_employee" id="multiple_employee">
											</div>
										</div>
									</div>

									<div id="location_div" style="display: none;">
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Location <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<select class="form-control select" name="location_id">
	                                                    <option value='0' {{ old('location_id') == '0' ? 'selected' : '' }}>All</option>
	                                                    <option value='103' {{ old('location_id') == '103' ? 'selected' : '' }}>India</option>
	                                                    <option value='112' {{ old('location_id') == '112' ? 'selected' : '' }}>Japan</option>
	                                                </select>
													{!! $errors->first('location_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>

											<div class="col-sm-2">
												<div class="form-group">
													<label class="float-right">Sub Unit <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<select class="form-control select" name="sub_unit_id">
	                                                    <option value='0' {{ old('sub_unit_id') == '0' ? 'selected' : '' }}>All</option>
	                                                    @foreach ($company_location as $company)
		                                                    <option value='{{ $company->id }}' {{ old('sub_unit_id') == $company->name ? 'selected' : '' }}>{{ $company->company_name }}</option>
		                                                @endforeach
	                                                </select>
													{!! $errors->first('sub_unit_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>										
									</div>

									<div id="employee_div">
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Employee <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<!-- <div class="form-group">
													<input type="text" name="employee" id="employee_name" class="form-control {{ $errors->has('employee') ? 'is-invalid' : ''}}" placeholder="Type for hints.." value="{{ old('employee') }}" autocomplete="off">
													{!! $errors->first('employee', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													<div id="employees_list" class="autocomplete"></div>
													<input type="hidden" name="emp_number" id="emp_number" class="form-control">
												</div> -->

												<div class="form-group">										
													<select class="employee_name form-control {{ $errors->has('employee') ? 'is-invalid' : ''}}" name="employee" id="employee_name" style="width: 100%">
													</select>
													{!! $errors->first('employee', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													<input type="hidden" name="emp_number" id="emp_number" class="form-control">
												</div>
											</div>
										</div>										
									</div>									

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Leave Type <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<select class="form-control select" name="leave_type">
                                                    @foreach ($leave_types as $type)
	                                                    <option value='{{ $type->id }}' {{ old('leave_type_id') == $type->name ? 'selected' : '' }}>{{ $type->name }}</option>
	                                                @endforeach
                                                </select>
                                                {!! $errors->first('leave_type_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
									</div>									

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Leave Period <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<select class="form-control select {{ $errors->has('leave_period') ? 'is-invalid' : ''}}" name="leave_period">
	                                                <option value='{{ $leave_period_value }}' {{ old('leave_period_value') == $leave_period_value ? 'selected' : '' }}>{{ $leave_period_name }}</option>
                                                </select>
                                                {!! $errors->first('leave_period', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                <input type="hidden" name="from_date" id="from_date" class="form-control" value="{{ $from_date }}">
                                                <input type="hidden" name="to_date" id="to_date" class="form-control" value="{{ $end_date }}">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Entitlement <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<input type="number" name="entitlement" class="form-control {{ $errors->has('entitlement') ? 'is-invalid' : ''}}" value="{{ old('entitlement') }}" placeholder="" autocomplete="off">
												{!! $errors->first('entitlement', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
										<label class="ctm-text-sm mt-2">Should be a number with upto 2 decimal places</label>
									</div>

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
														<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
													</div>
												</div>
												<div class="col-sm-6">
													<a href="{{ route('leaveEntitlement.index') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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

	// enable/disable location_div
	$("#multiple_employee").change(function() {
	    if(this.checked) {
	        $('#location_div').css("display", "block");
	        $('#employee_div').css("display", "none");
	    }else{
	    	$('#location_div').css("display", "none");
	    	$('#employee_div').css("display", "block");
	    }
	});

	// Autocomplete ajax call
	$('.employee_name').select2({
		placeholder: 'Select a employee',
		allowClear: true,
		ajax: {
			url: '/employee-autocomplete-ajax',
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
	 	$('#emp_number').val(this.value);
	});
</script>  
@endpush