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
															<li class="breadcrumb-item d-inline-block active">Data Import</li>
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

										@if($message = Session::get('success'))
										<div class="alert alert-success">
											<p>{{$message}}</p>
										</div>
										@endif
										
											<form method="POST" enctype="multipart/form-data" action="{{ route('employees-import') }}" id="pim_data_import">
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
														<div class="row">
															<div class="col-sm-3">
																<div class="submit-section text-center btn-add">
																	<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Upload</button>
																</div>
															</div>
															<div class="col-sm-3">
																<button type="button" onclick="resetAllValues('pim_data_import')" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Reset</button>
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<ul class="list-group">
															<li  class="list-group-item">
																Column order should not be changed </li>
															<li  class="list-group-item">
																First Name, Last Name, Employee Id and Email are </li>
															<li  class="list-group-item">
																All date fields should be in YYYY-MM-DD format </li>
															<li  class="list-group-item">
																If Gender is specified, value should be either <b>Male</b> or <b>Female</b> </li>	
															<li  class="list-group-item">
																If Status is specified, value should be either <b>Active</b> or <b>In active</b> </li>
															<li  class="list-group-item">
																If Report To is specified, value should have Employee IDs in comma separated format. i.e EMP001,EMP002,...EMP004 </li>
															<li  class="list-group-item">
																If User Role is specified, value should be either <b>Admin</b> or <b>Manager</b> or <b>Employee</b> </li>
															<li  class="list-group-item">Sample CSV file:                         
																<a class="download" href="{{ route('sample.download') }}?file=pim">Download</a>
															</li>
														 </ul>
													</div>
												</div>
											</form>

											@if($results = Session::get('results'))
											<div class="card shadow-sm ctm-border-radius">
												<div class="card-body align-center">
													<div class="employee-office-table">
														<div class="table-responsive">
															<h4>Results</h4>
															<table class="table custom-table table-hover">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Email</th>
																		<th>Status</th>
																	</tr>
																</thead>
																<tbody>
																@if(@$results['success'])	
																	@foreach (@$results['success'] as $item)		
																			<tr>
																				<td>	
																					<a href="#" class="avatar"><img alt="avatar image" src="{{ assetUrl('img/profiles/img-5.jpg') }}" class="img-fluid"></a>																				
																					<h2><a href="#">{{ $item['name'] }} </a></h2>
																				</td>
																				<td> {{ $item['email'] }}</td>
																				<td> <span class="btn btn-outline-success text-dark btn-sm">Success</span></td>
																			</tr>
																	@endforeach
																@endif

																@if(@$results['failed'])	
																	@foreach (@$results['failed'] as $item)		
																			<tr>
																				<td>
																					<a href="#" class="avatar"><img alt="avatar image" src="{{ assetUrl('img/profiles/img-5.jpg') }}" class="img-fluid"></a>
																					<h2><a href="#">{{ $item['name'] }} </a></h2>
																				</td>
																				<td> {{ $item['email'] }}</td>
																				<td> <span class="btn btn-outline-danger text-dark btn-sm">Failed</span></td>
																			</tr>
																	@endforeach
																@endif
																</tbody>
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