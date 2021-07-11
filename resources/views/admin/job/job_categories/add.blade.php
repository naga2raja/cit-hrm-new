@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header shadow-sm">
									<div class="text-left">
										<h4 class="card-title mb-0 ml-2">Add Job Category</h4>
									</div>
								</div>
								<div class="card-body">
									<form method="POST" action="{{ route('jobCategory.store') }}">
										@csrf
										<div class="row">
											<div class="col-sm-1">
												<div class="form-group">
													<label>Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<input type="text" name="job_category" class="form-control {{ $errors->has('job_category') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('job_category') }}" autocomplete="off">
													{!! $errors->first('job_category', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
											<div class="col-sm-1"></div>
											<div class="col-sm-2 text-center">
												<button type="submit" class="btn btn-success text-white ctm-border-radius"><i class="fa fa-save"></i> Save</button>
												<a href="{{ route('jobCategory.index') }}" class="btn btn-danger text-white ctm-border-radius"><i class="fa fa-arrow-left"></i> Cancel</a>
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