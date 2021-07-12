@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Reviews</li>
														</ol>
														<h4 class="text-dark">Import Employee</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</aside>
						</div>

						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Import Employees Data</h4>
									</div>
									<div class="card-body">
										
											<form method="POST" enctype="multipart/form-data" action="{{ route('employees-import') }}">
												@csrf
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label>Upload Excel</label>
															<input type="file" class="form-control {{ $errors->has('upload_file') ? 'is-invalid' : ''}}" name="upload_file" required>
															{!! $errors->first('upload_file', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<button type="button" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" data-dismiss="modal">Cancel</button>
															<button type="submit" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Upload</button>
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
	<script>
		function showPassword() {
            var temp = document.getElementById("password");
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
	</script>
@endpush