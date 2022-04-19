@extends('layout.mainlayout')
@section('content')
<!-- Content -->

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12 col-lg-8 col-md-12">
					<div class="card shadow-sm ctm-border-radius border">
						<div class="card-header">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-8 col-lg-7 col-xl-10">  
									<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
										<h4 class="card-title mb-0 ml-2 mt-2">Pay Grades</h4>
									</div>
								</div>
								@hasrole('Admin')
									<div class="col-sm-6 col-md-2 col-lg-2 col-xl-1">
										<a href="{{ route('payGrades.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
									</div>
									<div class="col-sm-6 col-md-2 col-lg-3 col-xl-1">
										<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_pay_grade_table','payGrades','{{ route('payGrades.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
									</div>
								@endrole
							</div>
						</div>
						<div class="card-body align-center">
							<div class="table-responsive">
								@if($message = Session::get('success'))
									<div class="alert alert-success">
										<p>{{$message}}</p>
									</div>
								@endif

								<form method="GET" id="filter_form">
									<input type="hidden" name="sort_field" id="sort_field" value="{{ Request::get('sort_field') }}">
									<input type="hidden" name="sort_by" id="sort_by" value="{{ Request::get('sort_by') }}">
								</form>

								<table class="table custom-table table-hover">
									<thead>
										<tr class="bg-light sort_row">
											<th class="text-center">
												<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_pay_grade_table')">
											</th>
											<th>Pay Grade <a href="#" class="{{ (Request::get('sort_field') == 'm_pay_grades.name') ? 'active' : '' }}" onclick="sorting('m_pay_grades.name', 'filter_form')"><i class="fa fa-fw fa-sort"></i></a></th>
											<th>Currency <a href="#" class="{{ (Request::get('sort_field') == 'currencies_name') ? 'active' : '' }}" onclick="sorting('currencies_name', 'filter_form')"><i class="fa fa-fw fa-sort"></i></a></th>
										</tr>
									</thead>
									<tbody id="list_pay_grade_table">
										@if(count($payGrade) > 0)
											@foreach ($payGrade as $grade)
											<tr>
												<td class="text-center" style="width: 5%">
													<input type="checkbox" name="pay_grades_id" value="{{ $grade->id }}">
												</td>
												<td>
													<h2><u><a href="{{ route('payGrades.edit', $grade->id) }}">{{ $grade->name }}</a></u></h2>
												</td>
												<td>
													{{ $grade->currencies_name }}
												</td>
											</tr>
											@endforeach
											<tr>
												<td colspan="100%">															
													<div class="pull-left mt-3">Showing {{ ($payGrade->currentPage() > 1) ? (($payGrade->currentPage() * $payGrade->perPage()) - $payGrade->perPage()) + 1 : $payGrade->currentPage() }} to {{ (($payGrade->currentPage() * $payGrade->perPage()) > $total) ? $total : ($payGrade->currentPage() * $payGrade->perPage()) }} of {{ $total }} entries</div>
													<div class="pull-right mt-3">
														{{ $payGrade->appends($_GET)->links() }}
													</div>
												</td>
											</tr>
										@else
											<tr>
												<td colspan="5"><p class="text-center">No Pay Grades Found !</p></td>
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
	<!--/Content-->
	
</div>		
<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection