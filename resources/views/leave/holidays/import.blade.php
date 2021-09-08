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
															<li class="breadcrumb-item d-inline-block"><a href="/" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Data Import</li>
														</ol>
														<h4 class="text-dark">Import Holidays</h4>
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
										<h4 class="card-title mb-0 d-inline-block">Import Holidays</h4>
									</div>
									<div class="card-body">

										@if($message = Session::get('success'))
											@if(@$output = Session::get('output')) 
												@if(count(@$output['success']))
													<div class="alert alert-success">
														<p>({{ count($output['success']) }}) {{ $message }}</p>
													</div>
												@endif
											@endif
										@endif
										
											<form method="POST" enctype="multipart/form-data" action="{{ route('holidays-import') }}">
												@csrf
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label>Upload Excel</label>
															<input type="file" class="form-control {{ $errors->has('upload_file') ? 'is-invalid' : ''}}" name="upload_file" required accept=".xls,.xlsx,.csv">
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
																<a href="{{ route('home') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<ul class="list-group">
															<li  class="list-group-item">File format should be .xls  </li>
                                                            <li  class="list-group-item">Column order should not be changed</li>
                                                            <li  class="list-group-item">All columns are compulsory</li>
                                                            <li  class="list-group-item">Holiday duration will be 1 or 0.5 (Full day - 1, Half a day - 0.5)</li>
															<li  class="list-group-item">Sample Excel file:                         
																<a title="Download" class="download" href="{{ assetUrl('sample/holidays-import.xls') }}">Download</a>
															</li>
														 </ul>
													</div>
												</div>
											</form>

											@if(@$output = Session::get('output'))
											<div class="card shadow-sm ctm-border-radius">
												<div class="card-body align-center">
													<div class="employee-office-table">
														<div class="table-responsive">
															<h4>Results</h4>

															<!-- After Import, Success/error Message will be displayed Here -->
															<div class="row">
																<?php                                                                
																	if(count($output['errors'])) {
																		echo '<div class="col-md-12"><div class="alert alert-danger mt-3"> <p>Below Records are Failed to Import</p></div></div> ';
																	}

																	if(count($output['errors'])) {
																		echo '<div class="col-md-12">';																		
																		echo '<table class="table  table-hover">
																<thead>
																	<tr class="bg-light">
																		<th>Holiday Name</th>
																		<th>Date</th>
																		<th>Status</th>
																	</tr>
																</thead>
																<tbody>';                    
																		foreach ($output['errors'] as $value) {
																			echo '<tr><td>'.$value[0].'</td><td>'.date('Y-m-d', strtotime($value[1])).'</td><td><span class="btn btn-outline-danger text-dark btn-sm">Failed</span></td> </tr>';
																		}
																		echo '</table> </div> <hr>';
																	}

																	if(count($output['success'])) {
																		echo '<div class="col-md-12">
                                                                            <div class="alert alert-success mt-3"> <p>Below Records inserted Successfully </p> </div>';
																		echo '<table class="table  table-hover"> <thead>
																	<tr class="bg-light">
																		<th>Holiday Name</th>
																		<th>Date Name</th>
																		<th>Status</th>
																	</tr>
																</thead>
																<tbody>'; 
																		foreach ($output['success'] as $value) {
																			echo '<tr><td>'.$value[0].'</td><td>'.date('Y-m-d', strtotime($value[1])).'</td><td><span class="btn btn-outline-success text-dark btn-sm">Success</span></td> </tr>';
																		}
																		echo '</table> </div> <hr>';
																	}
																?>																	
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
		
	</script>
@endpush