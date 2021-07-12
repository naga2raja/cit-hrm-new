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
									Leave Period
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

								@if(count($leave_period) > 0)
									<form method="POST" action="{{ route('leavePeriod.update', [$leave_period[0]->id]) }}">
									@method('put')
								@else
									<form method="POST" action="{{ route('leavePeriod.store') }}">
								@endif

									@csrf
									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Start Month<span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<select class="form-control select {{ $errors->has('start_month') ? 'is-invalid' : ''}}" id="start_month" name="start_month" required="">
													<option value="">-- Select Month --</option>
													<option value="1" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '1' ? 'selected' : '' }} @endif >January</option>
													<option value="2" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '2' ? 'selected' : '' }} @endif >February</option>
													<option value="3" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '3' ? 'selected' : '' }} @endif >March</option>
													<option value="4" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '4' ? 'selected' : '' }} @endif >April</option>
													<option value="5" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '5' ? 'selected' : '' }} @endif >May</option>
													<option value="6" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '6' ? 'selected' : '' }} @endif >June</option>
													<option value="7" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '7' ? 'selected' : '' }} @endif >July</option>
													<option value="8" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '8' ? 'selected' : '' }} @endif >August</option>
													<option value="9" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '9' ? 'selected' : '' }} @endif >September</option>
													<option value="10" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '10' ? 'selected' : '' }} @endif >October</option>
													<option value="11" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '11' ? 'selected' : '' }} @endif >November</option>
													<option value="12" @if(count($leave_period) > 0) {{ $leave_period[0]->start_month == '12' ? 'selected' : '' }} @endif >December</option>
												</select>
												{!! $errors->first('start_month', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Start Date <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<select class="form-control select {{ $errors->has('start_date') ? 'is-invalid' : ''}}" id="start_date" name="start_date" required="">
													<option value="">-- Select Date --</option>
												</select>
												{!! $errors->first('start_date', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>End Date </label>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label id="end_date">
													@if(count($leave_period) > 0)
														@php 
															$start_month = DateTime::createFromFormat('!m', $leave_period[0]->start_month);
															$monthName = $start_month->format('F');
														@endphp

														{{ $monthName }} {{ $leave_period[0]->start_date  }} (Following Year)
													@endif 
												</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Current Leave Period </label>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label id="leave_period">
													@if(count($leave_period) > 0)
															@php 
																$start_month = DateTime::createFromFormat('!m', $leave_period[0]->start_month);
																$from = $start_month->format('F');
																$ym = date('Y-m', strtotime($from));
																$d = $leave_period[0]->start_date;
															@endphp

															{{ $ym }}-{{ $d }} to 
														@endif 
												</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
										</div>
									</div>
									<hr>

									<div class="row">
										<div class="col-sm-2"></div>
										<div class="col-sm-4 text-center">
											<div class="row">
												<div class="col-sm-6">
													<div class="submit-section text-center btn-add">

														@if(count($leave_period) > 0)
															<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Update</button>
														@else
															<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
														@endif

														
													</div>
												</div>
												<div class="col-sm-6">
													<a href="{{ route('systemUsers.index') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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
	function daysInMonth(selectedMonth) {
		var currentYear = new Date().getFullYear();
		return new Date(currentYear, selectedMonth, 0).getDate();
	}

	function dayOfMonth(selectedMonth) {
	     var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	     return months[selectedMonth - 1];
	}

	function setContent(end_date, leave_period) {
	    var month = dayOfMonth(start_month);
			
		if(start_date != 'null'){
			var date = start_date;				
		}else{
			var date = '1';
		}
		$('#end_date').html(""+month+" "+date+" (Following Year)");
		$('#leave_period').html("");
	}

	function setMonthDate(start_month, start_date) {
		if (start_month.length > 0) {
			$('#start_date').prop('disabled', false);
			$('#start_date').find('option').remove();

			var daysInSelectedMonth = daysInMonth($('#start_month').val());
			for (var i = 1; i <= daysInSelectedMonth; i++) {
				var selected = "";
				if(i == start_date){
					selected = "selected='selected'";
				}else{
					selected = "";
				}
	  
	            $('#start_date').append('<option value="'+i+'" '+selected+'>'+i+'</option>');
			}
			var month = dayOfMonth(start_month);
			
			if(start_date != 'null'){
				var date = start_date;				
			}else{
				var date = '1';
			}
			$('#end_date').html(""+month+" "+date+" (Following Year)");
			$('#leave_period').html("");
		} else {
			$('#start_date').prop('disabled', true);
			$('#start_date').find('option').remove();
		}
	}

	window.onload = function() {
	    var start_month = $('#start_month').val();
		var start_date = '@if(count($leave_period) > 0) {{ $leave_period[0]->start_date }} @endif';
		setMonthDate(start_month, start_date);
	}

	$('#start_month').change(function() {
		var start_month = $('#start_month').val();
		var start_date = $('#start_date').val();
		setMonthDate(start_month, start_date);
	});

	$('#start_date').change(function() {		
		var month = dayOfMonth($('#start_month').val());
		$('#end_date').html(""+month+" "+$('#start_date').val()+" (Following Year)");
		$('#leave_period').html("");
	});
	
</script>  
@endpush

