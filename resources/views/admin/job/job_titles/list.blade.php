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
										<h4 class="card-title mb-0">Job Titles</h4>
										<hr>
										<a href="{{ route('jobTitles.create') }}" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
										<a href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius"><span class="fa fa-trash"></span> Delete</a>
									</div>
								</div>
								<div class="card-body">
									<div class="employee-office-table">
										<div class="table-responsive">
											@if($message = Session::get('success'))
												<div class="alert alert-success">
													<p>{{$message}}</p>
												</div>
											@endif
											<table class="table custom-table mb-0 table-hover table-striped table-bordered">
												<thead>
													<tr class="bg-blue-header text-white">
														<th class="text-center">
															<input type="checkbox" name="">
														</th>
														<th>Job Title</th>
														<th>Job Description</th>
													</tr>
												</thead>
												<tbody>
													@if(count($jobs) > 0)
														@foreach ($jobs as $job)
														<tr>
															<td class="text-center">
																<input type="checkbox" name="job_title_id" value="{{ $job->id }}">
															</td>
															<td>
																<h2><u><a href="{{ route('jobTitles.edit', $job->id) }}">{{ $job->job_title }}</a></u></h2>
															</td>
															<td>{{ $job->job_description }}</td>
														</tr>
														@endforeach
													@else
														<tr>
															<td colspan="5"><p class="text-center">No Job Titles Found</p></td>
														</tr>
													@endif
												</tbody>
											</table>
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