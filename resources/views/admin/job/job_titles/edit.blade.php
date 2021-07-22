@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header shadow-sm">
									<div class="text-left ml-2">
										<h4 class="card-title mb-0">Edit Job Titles</h4>
									</div>
								</div>
								<div class="card-body">
									@if($message = Session::get('success'))
										<div class="alert alert-success">
											<p>{{$message}}</p>
										</div>
									@endif
									<form method="POST" action="{{ route('jobTitles.update', $jobs->id) }}" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Job Title <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="job_title" class="form-control {{ $errors->has('job_title') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('job_title', $jobs->job_title) }}">
													{!! $errors->first('job_title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Job Description</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<textarea name="job_description" class="form-control" rows="3">{{ old('job_description', $jobs->job_description) }}</textarea>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Job Specification</label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													@if($jobs->job_specification)
													<div id="preview_profile_image" style="max-width:200px;position: relative;">
														<a href="{{ $jobs->job_specification }}" target="_blank">View Document</a>
														<a class="btn-sm btn-primary fa fa-pencil" style="cursor:pointer;color:#FFF;position: absolute;right: 0px;" onclick="editSpecDoc()"></a>
														{!! $errors->first('job_specification', '<span class="error" style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #dc3545;" role="alert"><br> :message</span>') !!}
													</div>	
													@endif
													<div id="upload_job_specification" style="{{ ($jobs->job_specification) ? 'display:none' : '' }}">
														<input type="file" id="job_specification" name="job_specification" class="form-control {{ $errors->has('job_specification') ? 'is-invalid' : ''}}" placeholder="">
														<label class="ctm-text-sm">Accepts up to 1MB</label>
														{!! $errors->first('job_specification', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Note</label>
												</div>
											</div>
											<div class="col-sm-4">
												<textarea name="note" class="form-control" rows="3">{{ old('note', $jobs->note) }}</textarea>
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
												<button type="submit" class="btn btn-theme text-white ctm-border-radius"></i> Update</button>
												<a href="{{ route('jobTitles.index') }}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
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

@section('my-scripts')
<script type="text/javascript">
function editSpecDoc() {	
	$('#preview_profile_image').hide();
	$('#upload_job_specification').show();
}
</script>
@endsection