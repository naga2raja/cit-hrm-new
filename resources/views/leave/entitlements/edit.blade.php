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
									Edit Leave Entitlement
								</a>
							</h4>
						</div>
						<div class="card-body p-0">
							<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
								
								<form method="POST" action="{{ route('leaveEntitlement.update', $entitlement->entitlement_id) }}" >
									@csrf
									@method('PUT')
									<div id="employee_div">
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Employee <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">										
													<input type="text" name="employee" class="form-control" value="{{ $entitlement->employee_name }}" readonly="">
													<input type="hidden" name="emp_number" value="{{ $entitlement->emp_number }}">
													{!! $errors->first('employee', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
												<input type="text" name="leave_type" class="form-control" value="{{ $entitlement->leave_type_name }}" readonly="">
												<input type="hidden" name="leave_type_id" class="form-control" value="{{ $entitlement->leave_type_id }}">
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
                                                <input type="hidden" name="to_date" id="to_date" class="form-control" value="{{ $to_date }}">
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
												<input type="number" name="entitlement" class="form-control {{ $errors->has('entitlement') ? 'is-invalid' : ''}}" value="{{ number_format($entitlement->no_of_days) }}" placeholder="" autocomplete="off">
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
												@hasrole('Admin')
												<div class="col-sm-6">
													<div class="submit-section text-center btn-add">
														<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Update</button>
													</div>
												</div>
												@endrole
												<div class="col-sm-6">
													<a href="{{ route('leaveEntitlement.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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
	});


</script>  
@endpush