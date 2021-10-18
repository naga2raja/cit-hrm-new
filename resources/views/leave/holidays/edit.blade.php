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
									Edit Holiday
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

								@if($message = Session::get('failed'))
									<div class="alert alert-danger">
										<p>{{$message}}</p>
									</div>
								@endif

								<form method="POST" action="{{ route('holidays.update', [$holidays->id]) }}">
									@csrf
									@method('PUT')
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
	                                                    <option value='{{ $row->id }}' {{ old('location_id') == $row->id ? 'selected' : '' }} {{ $row->id == $holidays->operational_country_id ? 'selected' : '' }}>{{ $row->country }}</option>
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
	                                                    <option value='{{ $company->id }}' {{ old('sub_unit_id') == $company->id ? 'selected' : '' }} {{ $company->id == $holidays->operational_sub_unit_id ? 'selected' : '' }}>{{ $company->company_name }}</option>
	                                                @endforeach
                                                </select>
												{!! $errors->first('sub_unit_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Name <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<input type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('description', $holidays->description) }}" required="" autocomplete="off" maxlength="30" minlength="3" id="description" onfocus="allowCharacterNumbersWithSpace('description')">
												{!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Date <span class="text-danger">*</span></label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<input type="text" name="date" class="form-control datetimepicker {{ $errors->has('date') ? 'is-invalid' : ''}}" value="{{ old('date', $holidays->holiday_date) }}" required="">
												{!! $errors->first('date', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Repeats Annually</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<input type="checkbox" name="recurring" {{ $holidays->recurring == '1' ? 'checked' : '' }}>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Full Day/Half Day </label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<select class="form-control select" name="length">
                                                    <option value='0' {{ $holidays->length == '0' ? 'selected' : '' }} {{ old('length') == '0' ? 'selected' : '' }}>Full Day</option>
                                                    <option value='1' {{ $holidays->length == '1' ? 'selected' : '' }} {{ old('length') == '1' ? 'selected' : '' }}>Half Day</option>
                                                </select>
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
										<div class="col-sm-3 text-center">
											<div class="row">
												<div class="col-sm-6">
													<div class="submit-section text-center btn-add">
														<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Update</button>
													</div>
												</div>
												<div class="col-sm-6">
													<a href="{{ route('holidays.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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