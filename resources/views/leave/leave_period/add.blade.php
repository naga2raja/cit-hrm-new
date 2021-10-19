@extends('layout.mainlayout')
@section('content')
<!-- Content -->

<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">

			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="accordion add-employee" id="accordion-details">
					<div class="card shadow-sm ctm-border-radius border">
						<div class="card-header" id="basic1">
							<h4 class="cursor-pointer mb-0">
								<a class="ml-2 coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
									Add Leave Period
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

								@if($message = Session::get('warning'))
								<div class="alert alert-warning">
									<p>{{$message}}</p>
								</div>
								@endif

								<form method="POST" action="{{ route('leavePeriod.store') }}">
									@csrf
									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Location <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<select class="form-control select" name="location_id" id="location_id" required="">
                                                    <option value="">-- Select Location --</option>
                                                    @foreach ($country as $row)
	                                                    <option value='{{ $row->id }}'>{{ $row->country }}</option>
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
												<select class="form-control select" name="sub_unit_id" id="sub_unit_id" required="">
                                                    <option value="">-- Select Sub Unit --</option>
                                                    @foreach ($company_location as $company)
	                                                    <option value='{{ $company->id }}'>{{ $company->company_name }}</option>
	                                                @endforeach
                                                </select>
												{!! $errors->first('sub_unit_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Start Month <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<select class="form-control select {{ $errors->has('start_month') ? 'is-invalid' : ''}}" id="start_month" name="start_month" required="">
													<option value="">-- Select Month --</option>
													<option value="1" {{ old('start_month') == '1' ? 'selected' : '' }} >January</option>
													<option value="2" {{ old('start_month') == '2' ? 'selected' : '' }} >February</option>
													<option value="3" {{ old('start_month') == '3' ? 'selected' : '' }} >March</option>
													<option value="4" {{ old('start_month') == '4' ? 'selected' : '' }} >April</option>
													<option value="5" {{ old('start_month') == '5' ? 'selected' : '' }} >May</option>
													<option value="6" {{ old('start_month') == '6' ? 'selected' : '' }} >June</option>
													<option value="7" {{ old('start_month') == '7' ? 'selected' : '' }} >July</option>
													<option value="8" {{ old('start_month') == '8' ? 'selected' : '' }} >August</option>
													<option value="9" {{ old('start_month') == '9' ? 'selected' : '' }} >September</option>
													<option value="10" {{ old('start_month') == '10' ? 'selected' : '' }} >October</option>
													<option value="11" {{ old('start_month') == '11' ? 'selected' : '' }} >November</option>
													<option value="12" {{ old('start_month') == '12' ? 'selected' : '' }} >December</option>
												</select>
												{!! $errors->first('start_month', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
										<label class="ctm-text-sm mt-2">Year : <span id="current_year"></span></label>
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
												<label>End Period </label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label id="end_date"></label>
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
												<label id="leave_period"></label>
											</div>
											<input type="hidden" name="start_period" id="start_period" class="form-control" readonly="">
											<input type="hidden" name="end_period" id="end_period" class="form-control" readonly="">
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
										<div class="col-sm-3 text-center">
											<div class="row">
												<div class="col-sm-6">
													<div class="submit-section text-center btn-add">
														<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
													</div>
												</div>
												<div class="col-sm-6">
													<a href="{{ route('leavePeriod.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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

	function addMonths(date, months) {
		var d = date.getDate();
	    date.setMonth(date.getMonth() + +months);
	    if (date.getDate() != d) {
	      date.setDate(0);
	    }
	    return date;    
	}

	function setLeavePeriod() {
		var year = new Date().getFullYear();
		var month = $('#start_month').val();
		var day = $('#start_date').val();

		var from_date = moment(year+" "+month+" "+day).format('Y-MM-DD');

		// to add 11 months and 31 days from the selected date
		var calculated_date = addMonths(new Date(year,month-1,day), 11);

		var end_year = moment(calculated_date).format('Y');
		var end_month_name = moment(calculated_date).format('MMMM');
		var end_month_number = moment(calculated_date).format('MM');
		// to get no. of days in end month
		var end_day = daysInMonth(end_month_number);

		var to_date = moment(end_year+" "+end_month_number+" "+end_day).format('Y-MM-DD');
		
		if(end_month_name && day > 0) {
			$('#end_date').html(""+end_month_name+" "+end_day+" ("+end_year+")");
		} else {
			$('#end_date').html("");
		}
		$('#leave_period').html(from_date+' to '+to_date);

		$('#start_period').val(from_date);
		$('#end_period').val(to_date);
	}

	function setMonthDate() {		
		// get the day from month(number)
		var start_month = $('#start_month').val();

		if (start_month.length > 0) {
			$('#start_date').prop('disabled', false);
			$('#start_date').find('option').remove();

			var daysInSelectedMonth = daysInMonth(start_month);
			$('#start_date').append('<option value="">-- Select Date --</option>');
			for (var i = 1; i <= daysInSelectedMonth; i++) {
				var selected = "";
				if(i == start_date){
					selected = "selected='selected'";
				}else{
					selected = "";
				}
	  
	            $('#start_date').append('<option value="'+i+'" '+selected+'>'+i+'</option>');
			}

			setLeavePeriod();
		} else {
			$('#start_date').prop('disabled', true);
			$('#start_date').find('option').remove();
			$('#start_date').append('<option value="">-- Select Date --</option>');
		}
	}

	window.onload = function() {
		var year = new Date().getFullYear();
		$('#current_year').html(year);
		setMonthDate();
	}

	$('#start_month').change(function() {
		setMonthDate();
	});

	$('#start_date').change(function() {		
		setLeavePeriod();
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
					option = $('<option></option>').attr("value", "").text("-- Select Sub Unit --");
					$("#sub_unit_id").append(option);
					data.forEach(function (row,index) {
						option = $('<option></option>').attr("value", row.id).text(row.company_name);
						$("#sub_unit_id").append(option);
					});					
				}else{
					$("#sub_unit_id").empty();
					option = $('<option></option>').attr("value", "").text("-- Select Sub Unit --");
					$("#sub_unit_id").append(option);
				}
			}
		});
	}

	// for search in select option
	$('.select').select2();
	
</script>  
@endpush