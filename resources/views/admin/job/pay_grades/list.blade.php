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
								<h4 class="card-title mb-0">Pay Grades</h4>
								<hr>
								<a href="{{ route('payGrades.create') }}" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
								<button class="btn btn-danger text-white ctm-border-radius" onclick="deleteAll('list_pay_grade_table','payGrades')"><span class="fa fa-trash"></span> Delete</button>
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
													<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_pay_grade_table')">
												</th>
												<th>Pay Grade</th>
												<th>Currency</th>
											</tr>
										</thead>
										<tbody id="list_pay_grade_table">
											@if(count($grades) > 0)
												@foreach ($grades as $grade)
												<tr>
													<td class="text-center">
														<input type="checkbox" name="pay_grades_id" value="{{ $grade->id }}">
													</td>
													<td>
														<h2><u><a href="{{ route('payGrades.edit', $grade->id) }}">{{ $grade->name }}</a></u></h2>
													</td>
													<td>{{ $grade->currency_id }}</td>
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