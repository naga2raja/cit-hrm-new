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
												Add PaySlip
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

											<form method="POST" action="{{ route('payslips.store') }}" enctype="multipart/form-data" >
												@csrf
												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Employee Name <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">                                                            
                                                            <select class="form-control employee_auto_search select {{ $errors->has('employee_id') ? 'is-invalid' : ''}}" required name="employee_id" id="employee_id" style="width: 100%">
                                                            </select>
                                                            {!! $errors->first('employee_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                        </div>
													</div>
												</div>

                                                <div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Month <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">                                                            
                                                            <input autocomplete="off" class="form-control datetimepicker1 cal-icon-input {{ $errors->has('pay_month') ? 'is-invalid' : ''}}" type="text" placeholder="" name="pay_month" id="datetimepicker1" required>
                                                            {!! $errors->first('pay_month', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                        </div>
													</div>
												</div>

                                                <div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Upload Payslip <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">                                                            
                                                            <input type="file" name="payslip_doc" id="payslip_doc" class="form-control {{ $errors->has('payslip_doc') ? 'is-invalid' : ''}}" required>
															
                                                            {!! $errors->first('payslip_doc', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                        </div>
													</div>
													<div class="col-sm-7">
														<p>File type should be in .pdf Format, Size should be less than 1MB</p>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Comments</label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<textarea class="form-control {{ $errors->has('comments') ? 'is-invalid' : ''}}" name="comments" rows="3" placeholder="Comments"> {{ old('comments') }} </textarea>
															{!! $errors->first('comments', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
																	<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
																</div>
															</div>
															<div class="col-sm-6">
																<a href="{{ route('payslips.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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
    $('#datetimepicker1').datetimepicker({
        date: "{{ old('pay_month') }}",
		format: "YYYY-MM",
		icons: {
			up: "fa fa-angle-up",
			down: "fa fa-angle-down",
			next: 'fa fa-angle-right',
			previous: 'fa fa-angle-left'
		}
	});

    $('.employee_auto_search').select2({
			placeholder: 'Select a employee',
			allowClear: true,
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

</script>    
@endpush