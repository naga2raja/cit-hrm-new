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
										<h4 class="card-title mb-0">Company Information</h4>
									</div>
								</div>
								<div class="card-body">
									<form method="" action="">
										@csrf
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Organization Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="company_name" value="<?php if(count($company) > 0) echo $company[0]->company_name; ?>" id="company_name" autocomplete="off" disabled="disabled">
												</div>
											</div>

											<div class="col-sm-2">
												<div class="form-group">
													<label>Tax ID </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="tax_id" value="" id="tax_id" autocomplete="off" disabled="disabled">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Number of employees </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="number_of_employees" value="" id="number_of_employees" autocomplete="off" disabled="disabled">
												</div>
											</div>

											<div class="col-sm-2">
												<div class="form-group">
													<label>Registration Number </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="registration_number" value="" id="registration_number" autocomplete="off" disabled="disabled">
												</div>
											</div>
										</div>
										<hr>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Phone </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="phone_number" value="<?php if(count($company) > 0) echo $company[0]->phone_number; ?>" id="phone_number" autocomplete="off" disabled="disabled">
												</div>
											</div>

											<div class="col-sm-2">
												<div class="form-group">
													<label>Fax </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="fax" value="<?php if(count($company) > 0) echo $company[0]->fax; ?>" id="fax" autocomplete="off" disabled="disabled">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Email </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="email" value="" id="email" autocomplete="off" disabled="disabled">
												</div>
											</div>
										</div>
										<hr>


										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Address Street 1 </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="address_street_1" value="" id="address_street_1" autocomplete="off" disabled="disabled">
												</div>
											</div>

											<div class="col-sm-2">
												<div class="form-group">
													<label>Address Street 2 </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="address_street_2" value="" id="address_street_2" autocomplete="off" disabled="disabled">
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
													<input type="text" class="form-control" name="city" value="<?php if(count($company) > 0) echo $company[0]->city; ?>" id="city" autocomplete="off" disabled="disabled">
												</div>
											</div>

											<div class="col-sm-2">
												<div class="form-group">
													<label>State/Province </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="state_province" value="" id="state_province" autocomplete="off" disabled="disabled">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Zip/Postal Code </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" name="zip_code" value="" id="zip_code" autocomplete="off" disabled="disabled">
												</div>
											</div>

											<div class="col-sm-2">
												<div class="form-group">
													<label>Country </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<select class="form-control select {{ $errors->has('country') ? 'is-invalid' : ''}}" name="country" id="country" disabled="disabled">
														<option value="">-Select-</option>
													</select>	
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Note </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<textarea class="form-control" rows="3" id="note" name="note" disabled="disabled"></textarea>
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

										<div class="row">
											<div class="col-sm-4">
												<a class="btn btn-success text-white ctm-border-radius" id="button" data-action="">Edit</a>
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
	$('#button').on('click', function(){
		$('#button').attr('data-action', 1);
		$('#company_name').prop('disabled', false);
		$('#tax_id').prop('disabled', false);
		$('#number_of_employees').prop('disabled', false);
		$('#registration_number').prop('disabled', false);
		$('#phone_number').prop('disabled', false);
		$('#fax').prop('disabled', false);
		$('#email').prop('disabled', false);
		$('#address_street_1').prop('disabled', false);
		$('#address_street_2').prop('disabled', false);
		$('#city').prop('disabled', false);
		$('#state_province').prop('disabled', false);
		$('#zip_code').prop('disabled', false);
		$('#country').prop('disabled', false);
		$('#note').prop('disabled', false);
	});
</script>
@endpush
