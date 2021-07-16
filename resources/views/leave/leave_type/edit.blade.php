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
												Edit Leave Type
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

											@if($message = Session::get('failed'))
												<div class="alert alert-danger">
													<p>{{$message}}</p>
												</div>
											@endif

											<form method="POST" action="{{ route('leaveTypes.update', [$leave_type->id]) }}">
												@csrf
												@method('PUT')
												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Name <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('name', $leave_type->name) }}" autocomplete="off">
															{!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row" style="display: none;">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Is entitlement situational</label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="checkbox" name="entitlement" {{ $leave_type->exclude_if_no_entitlement == '1' ? 'checked' : '' }}>
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
																<a href="{{ route('leaveTypes.index') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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