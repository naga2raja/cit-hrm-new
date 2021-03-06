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
										<h4 class="card-title mb-0">Edit Location</h4>
									</div>
								</div>
								<div class="card-body">
									@if($message = Session::get('success'))
									<div class="alert alert-success">
										<p>{{$message}}</p>
									</div>
									@endif
									<form method="POST" action="{{ route('locations.update', $locations[0]->id) }}">
										@csrf
										@method('PUT')
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Company Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('company_name') ? 'is-invalid' : ''}}" placeholder="" name="company_name" id="company_name" value="{{ old('company_name', $locations[0]->company_name) }}" onfocus="allowOnlyCharacters('company_name')" autocomplete="off" maxlength="100">
													{!! $errors->first('company_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Country <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<select class="form-control select {{ $errors->has('country') ? 'is-invalid' : ''}}" name="country">
														<option value="">-Select-</option>
														@foreach ($countries as $country)
														<option value="{{ $country->id }}" {{ $country->id == $locations[0]->country_id ? 'selected' : '' }}>{{ $country->country }}</option>
														@endforeach
													</select>													
														{!! $errors->first('country', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>State/Province </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('state_province') ? 'is-invalid' : ''}}" placeholder="" name="state_province" id="state_province" value="{{ old('state_province', $locations[0]->state_province) }}" maxlength="64" onfocus="allowOnlyCharacters('state_province')" autocomplete="off">
													{!! $errors->first('state_province', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>City </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('city') ? 'is-invalid' : ''}}" placeholder="" name="city" value="{{ old('city', $locations[0]->city) }}" onfocus="allowOnlyCharacters('city')" autocomplete="off">
													{!! $errors->first('city', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Address</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" rows="3" name="address">{{ old('address', $locations[0]->address) }}</textarea>{!! $errors->first('address', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Zip/Postal code </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : ''}}" placeholder="" name="zip_code" value="{{ old('zip_code', $locations[0]->zip_code) }}" id="zip_code" onfocus="allowOnlyNumbers('zip_code')" autocomplete="off" maxlength="7">
													{!! $errors->first('zip_code', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Phone number </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : ''}}" placeholder="" name="phone_number" value="{{ old('phone_number', $locations[0]->phone_number) }}" id="phone_number" onfocus="allowOnlyNumbers('phone_number')" maxlength="11">
													{!! $errors->first('phone_number', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Fax </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('fax') ? 'is-invalid' : ''}}" placeholder="" name="fax" id="fax" value="{{ old('fax', $locations[0]->fax) }}" onfocus="allowOnlyNumbers('fax')">
													{!! $errors->first('fax', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Notes</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : ''}}" rows="3" name="notes">{{ old('notes', $locations[0]->notes) }}</textarea>{!! $errors->first('notes', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
											<div class="col-sm-3 text-center">
												<div class="row">
													<div class="col-sm-6">
														<div class="submit-section text-center btn-add">
															<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Update</button>
														</div>
													</div>
													<div class="col-sm-6">
														<a href="{{ route('locations.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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
			<!--/Content-->
			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection
@push('scripts')
<script type="text/javascript">
	// Autocomplete ajax call
	$('.country').select2({
		placeholder: 'Select a Country',
		allowClear: true,
		ajax: {
			url: "{{ route('country-autocomplete-ajax') }}",
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results:  $.map(data, function (item) {
						return {
							text: item.country,
							id: item.id
						}
					})
				};
			},
			cache: true
		}		
	});

	$(document.body).on("change","#country",function(){
	 	$('#country_id').val(this.value);
	 	var country = $("#country option:selected").html();
	 	$('#country_name').val(country);
	});
</script>
@endpush