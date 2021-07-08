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
													<input type="text" class="form-control {{ $errors->has('company_name') ? 'is-invalid' : ''}}" placeholder="" name="company_name" value="{{ old('company_name', $locations[0]->company_name) }}">
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
													<input type="text" class="form-control {{ $errors->has('state_province') ? 'is-invalid' : ''}}" placeholder="" name="state_province" value="{{ old('state_province', $locations[0]->state_province) }}">
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
													<input type="text" class="form-control {{ $errors->has('city') ? 'is-invalid' : ''}}" placeholder="" name="city" value="{{ old('city', $locations[0]->city) }}">
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
													<input type="text" class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : ''}}" placeholder="" name="zip_code" value="{{ old('zip_code', $locations[0]->zip_code) }}">
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
													<input type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : ''}}" placeholder="" name="phone_number" value="{{ old('phone_number', $locations[0]->phone_number) }}">
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
													<input type="text" class="form-control {{ $errors->has('fax') ? 'is-invalid' : ''}}" placeholder="" name="fax" value="{{ old('fax', $locations[0]->fax) }}">
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
											<div class="col-sm-4 text-center">
												<button href="javascript:void(0);" class="btn btn-success text-white ctm-border-radius">Save</button>
												<a href="{{ route('locations.index') }}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
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