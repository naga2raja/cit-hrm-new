@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8 col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header shadow-sm">
									<div class="text-left ml-2">
										<h4 class="card-title mb-0"><i class="fa fa-list"></i> Job Titles</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="mb-3">
										<a href="{{ route('jobTitles.create') }}" class="btn btn-success text-white ctm-border-radius"><i class="fa fa-plus"></i> Add</a>
										<button class="btn btn-danger text-white ctm-border-radius" onclick="deleteAll('list_job_title_table','jobTitles')"><i class="fa fa-trash"></i> Delete</button>
									</div>
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
															<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_job_title_table')">
														</th>
														<th>Job Title</th>
														<th>Job Description</th>
													</tr>
												</thead>
												<tbody id="list_job_title_table">
													@if(count($jobs) > 0)
														@foreach ($jobs as $job)
														<tr>
															<td class="text-center" style="width: 5%">
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
															<td colspan="5">
																<div class="alert alert-danger text-center">No Job Titles Found !</div>
															</td>
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