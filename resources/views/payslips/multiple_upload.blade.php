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
												<div class="col-md-6  alert alert-success">
													<p>{{$message}}</p>
												</div>
											@endif

											@if($message = Session::get('error'))
												<div class="col-md-6  alert alert-danger">
													<p>{{$message}}</p>
												</div>
											@endif
                                            @if (count($errors) > 0)
                                                <div class="col-md-6 alert alert-danger">
                                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif 

											<form method="POST" action="{{ route('payslip.uploadMultiple') }}" enctype="multipart/form-data" >
												@csrf
												                                               

                                                <div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Upload Payslips <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">                                                            
                                                            <input type="file" name="payslip_doc[]" id="payslip_doc" class="form-control {{ $errors->has('payslip_doc') ? 'is-invalid' : ''}}" required multiple accept=".pdf">
															
                                                            {!! $errors->first('payslip_doc', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                                        </div>
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
														<label class="ctm-text-sm"><!--<span class="text-danger">*</span>--> Note:</label>
													</div>
												</div>
                                                <div class="row">
													<div class="col-sm-10">
														<ul class="list-group">
															<li  class="list-group-item"> File type should be in .pdf Format </li>
                                                            <li  class="list-group-item"> File Size should be less than 1MB </li>
                                                            <li  class="list-group-item"> File name should be EMPID_MONTH-YEAR_EMPNAME.pdf (i.e I2021003_Jan-2021_Siva.pdf) </li>
                                                        </ul>
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

                                            {{-- Import Results --}}
                                            @if($results = Session::get('results'))
											<div class="card shadow-sm ctm-border-radius">
												<div class="card-body align-center">
													<div class="employee-office-table">
														<div class="table-responsive">
															<h4>Results</h4>
															<table class="table custom-table table-hover">
																
																@if(@$results['success'])	
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Employee ID</th>
                                                                            <th>Pay Month</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
																	@foreach (@$results['success'] as $item)		
																			<tr>
																				<td>	
																					<a href="#" class="avatar"><img alt="avatar image" src="{{ assetUrl('img/profiles/img-5.jpg') }}" class="img-fluid"></a>																				
																					<h2><a href="#">{{ $item['employee_id'] }} </a></h2>
																				</td>
																				<td> {{ date('Y M', strtotime($item['pay_month'])) }}</td>
																				<td> <span class="btn btn-outline-success text-dark btn-sm">Success</span></td>
																			</tr>
																	@endforeach
                                                                    </tbody>
																@endif

																@if(@$results['error'])	
                                                                    <thead>
                                                                        <tr>
                                                                            <th>File Name</th>
                                                                            <th>Reason</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
																	@foreach (@$results['error'] as $item)		
																			<tr>
																				<td>
																					<a href="#" class="avatar"><img alt="avatar image" src="{{ assetUrl('img/profiles/img-5.jpg') }}" class="img-fluid"></a>
																					<h2><a href="#">{{ $item['file'] }} </a></h2>
																				</td>
																				<td> {{ $item['msg'] }}</td>
																				<td> <span class="btn btn-outline-danger text-dark btn-sm">Failed</span></td>
																			</tr>
																	@endforeach
                                                                    </tbody>
																@endif
																
															</table>
														</div>
													</div>
												</div>
											</div>
											@endif


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