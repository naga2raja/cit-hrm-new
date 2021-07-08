@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left ml-3">
										<h4 class="card-title mb-0">Skills</h4>
										<hr>
										<a href="{{ route('skills.create') }}" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
										<button class="btn btn-danger text-white ctm-border-radius" onclick="deleteAll('list_skills_table','skills')"><span class="fa fa-trash"></span> Delete</button>
									</div>
								</div>
								<div class="card-body">
									@if($message = Session::get('success'))
									<div class="alert alert-success">
										<p>{{$message}}</p>
									</div>
									@endif
									<div class="employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table mb-0 table-hover table-striped table-bordered">
												<thead>
													<tr class="bg-blue-header text-white">
														<th class="text-center">
															<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_skills_table')">
														</th>
														<th>Skill</th>
														<th>Skill Description</th>
													</tr>
												</thead>
												<tbody id="list_skills_table">
													@if(count($skills) > 0)
														@foreach ($skills as $skill)
														<tr>
															<td class="text-center">
																<input type="checkbox" name="delete_ids" id="delete_ids" value="{{$skill->id}}">
															</td>
															<td>
																<h2><u><a href="{{ route('skills.edit', [$skill->id]) }}">{{$skill->skill}}</a></u></h2>
															</td>
															<td>{{$skill->skill_description}}</td>
														</tr>
														@endforeach
													@else
														<tr>
															<td colspan="5"><div class="alert alert-danger text-center">No Skills Found!</div></td>
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