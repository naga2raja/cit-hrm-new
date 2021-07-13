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
								<h4 class="card-title mb-0"><i class="fa fa-list"></i> Pay Grades</h4>								
							</div>
						</div>
						<div class="card-body">
							<div class="mb-3">
								<a href="{{ route('payGrades.create') }}" class="btn btn-success text-white ctm-border-radius"><i class="fa fa-plus"></i> Add</a>
								<button class="btn btn-danger text-white ctm-border-radius" onclick="deleteAll('list_pay_grade_table','payGrades')"><i class="fa fa-trash"></i> Delete</button>
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
													<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_pay_grade_table')">
												</th>
												<th>Pay Grade</th>
												<th>Currency</th>
											</tr>
										</thead>
										<tbody id="list_pay_grade_table">
											@if(count($pay_grades) > 0)
												@foreach ($pay_grades as $grade)
												<tr>
													<td class="text-center" style="width: 5%">
														<input type="checkbox" name="pay_grades_id" value="{{ $grade->id }}">
													</td>
													<td>
														<h2><u><a href="{{ route('payGrades.edit', $grade->id) }}">{{ $grade->name }}</a></u></h2>
													</td>
													<td>
														@foreach ($pay_grade_currency as $row)
															@if($row->pay_grade_id == $grade->id)
																{{ $row->currencyName->currency_name }}@if (!$loop->last),@endif
															@endif
														@endforeach
													</td>
												</tr>
												@endforeach
											@else
												<tr>
													<td colspan="5"><div class="alert alert-danger text-center">No Pay Grades Found !</div></td>
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