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
								
								<form method="POST" action="{{ route('leaveEntitlement.store') }}" >
									@csrf
									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label for="multiple_employee">Add to Multiple Employees</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<input type="hidden" name="multiple_employee" value="off">
												<input type="checkbox" name="multiple_employee" id="multiple_employee" {{ old('multiple_employee') == 'on' ? 'checked' : '' }}>
											</div>
										</div>
									</div>

									<div id="location_div" style="display: none;">
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Location<span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<select class="form-control select" name="location_id" id="location_id">
	                                                    <option value='0' {{ old('location_id') == '0' ? 'selected' : '' }}>All</option>
	                                                    @foreach ($country as $row)
		                                                    <option value='{{ $row->id }}' {{ old('location_id') == $row->id ? 'selected' : '' }}>{{ $row->country }}</option>
		                                                @endforeach
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
													<select class="form-control select" name="sub_unit_id" id="sub_unit_id">
	                                                    <option value='0' {{ old('sub_unit_id') == '0' ? 'selected' : '' }}>All</option>
	                                                    @foreach ($company_location as $company)
		                                                    <option value='{{ $company->id }}' {{ old('sub_unit_id') == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
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
												<div class="form-group">										
													<select class="employee_name form-control {{ $errors->has('employee') ? 'is-invalid' : ''}}" name="employee" id="employee_name" style="width: 100%">
														@if(Request::get('employee_id'))
															<option selected="selected" id="{{ @$employees->id }}">{{ @$employees->employee_name }}</option>
														@elseif(old('emp_name'))
															<option selected="selected" id="{{ old('emp_number') }}">{{ old('emp_name') }}</option>
														@endif
													</select>
													{!! $errors->first('employee', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													<input type="hidden" name="emp_number" id="emp_number" class="form-control" value="{{ (Request::get('employee_id')) ? @$employees->id : '' }}">
													<input type="hidden" name="emp_name" id="emp_name" class="form-control" value="{{ old('emp_name') }}">
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
												<select class="form-control select {{ $errors->has('leave_type') ? 'is-invalid' : ''}}" name="leave_type">
													<option value="">Select Leave Type</option>
                                                    @foreach ($leave_types as $type)
	                                                    <option value='{{ $type->id }}' {{ old('leave_type_id') == $type->name ? 'selected' : '' }}>{{ $type->name }}</option>
	                                                @endforeach
                                                </select>
                                                {!! $errors->first('leave_type', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
													<a href="{{ url()->previous() }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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

	// enable/disable location_div
	function display() {
		if($('#multiple_employee').is(':checked')) {
	        $('#location_div').css("display", "block");
	        $('#employee_div').css("display", "none");
	    }else{
	    	$('#location_div').css("display", "none");
	    	$('#employee_div').css("display", "block");
	    }
	}
	
	window.onload = function() {
		// on load calling enable or disable function
		display();
		// calling validation_popup_msg
		validation_popup_msg();

		var emp_number = $("#employee_name option:selected").prop('id');
		$('#emp_number').val(emp_number);
	 	var emp_name = $("#employee_name option:selected").html();
	 	$('#emp_name').val(emp_name);
	}

	$("#multiple_employee").change(function() {
		// onchange calling enable or disable function
	    display();
	});

	// Autocomplete ajax call
	$('.employee_name').select2({
		placeholder: 'Select a employee',
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
	 	$('#emp_number').val(this.value);
	 	var emp_name = $("#employee_name option:selected").html();
	 	$('#emp_name').val(emp_name);
	});

	// on change of Location
	$(document.body).on("change","#location_id",function(){
		getSubUnits(this.value);
	});

	function getSubUnits(location_id){
		$.ajax({
			method: 'POST',
			url: "{{ route('getSubUnits-ajax') }}",
			data: JSON.stringify({'location_id': location_id, '_token': '{{ csrf_token() }}' }),
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				// console.log('subunit : ', data);
				var option = "";
				if(data.length > 0){
					$("#sub_unit_id").empty();
					option = $('<option></option>').attr("value", 0).text("All");
					$("#sub_unit_id").append(option);
					data.forEach(function (row,index) {
						option = $('<option></option>').attr("value", row.country_id).text(row.company_name);
						$("#sub_unit_id").append(option);
					});					
				}else{
					$("#sub_unit_id").empty();
					option = $('<option></option>').attr("value", '').text("No data");
					$("#sub_unit_id").append(option);
				}
			}
		});
	}

</script>  
@endpush