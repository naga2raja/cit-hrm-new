@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="accordion add-employee" id="accordion-details">
								<div class="card shadow-sm ctm-border-radius border">
									<div class="card-header" id="basic1">
										<h4 class="cursor-pointer mb-0">
											<a class="ml-2 coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
												Edit Pay Grade
											</a>
										</h4>
									</div>
									<div class="card-body p-0">
										<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
											@if($message = Session::get('success'))
												<div class="alert alert-success">
													<p>{{$message}}</p>
												</div>
											@endif

											<form method="POST" action="{{ route('payGrades.update', $grades->id) }}">
												@csrf
												@method('PUT')
												<div class="row">
													<div class="col-sm-1">
														<div class="form-group">
															<label>Name <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-2">
														<div class="form-group">
															<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('name', $grades->name) }}">
															{!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
													</div>
												</div>
												<hr>

												<div class="row">
													<div class="col-sm-3 text-center">
														<div class="row">
															<div class="col-sm-6">
																<div class="submit-section text-center btn-add">
																	<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Update</button>
																</div>
															</div>
															<div class="col-sm-6">
																<a href="{{ route('payGrades.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
															</div>
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
				</div>

				<!-- Currency Add -->
				<div class="container-fluid" id="currency_div" style="{{ $errors->has('currency') ? 'display: block' : 'display: none'}}">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="accordion add-employee" id="accordion-details">
								<div class="card shadow-sm ctm-border-radius border">
									<div class="card-header" id="basic1">
										<h4 class="cursor-pointer mb-0">
											<a class="ml-2 coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
												Add Currency
											</a>
										</h4>
									</div>
									<div class="card-body p-0">
										<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
											<form method="post" action="{{ route('payGradeCurrency.store') }}">
												@csrf
												<div class="row">
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Currency <span class="text-danger">*</span></label>
															<select class="currency form-control {{ $errors->has('currency') ? 'is-invalid' : ''}}" name="currency" id="currency" style="width: 100%">
															</select>
															{!! $errors->first('currency', '<span class="invalid-feedback" role="alert">:message</span>') !!}
															<input type="hidden" name="currency_id" id="currency_id" class="form-control" placeholder="">
															<input type="hidden" name="pay_grade_id" id="pay_grade_id" class="form-control" value="{{ $grades->id }}">
														</div>
													</div>

													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Minimum Salary</label>
															<input type="text" name="min_salary" class="form-control" placeholder="">
														</div>
													</div>

													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Maximum Salary</label>
															<input type="text" name="max_salary" class="form-control" placeholder="">
														</div>
													</div>

													<div class="col-sm-1 leave-col">
														<div class="form-group">
															<br>
															<button type="submit" class="mt-2 btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-save"></i> Save</button>
														</div>
													</div>
													<div class="col-sm-1 leave-col">
														<div class="form-group">
															<br>
															<a id="currency_hide" href="javascript:void(0)" class="mt-2 btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
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
				</div>
				<!-- /Currency Add -->

				<!-- Currency List -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 col-lg-8 col-md-12">
							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-8 col-lg-7 col-xl-10">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">Assigned Currencies</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-1">
												<a id="currency_show" href="javascript:void(0)" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-1">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_pay_grade_currency_table','payGradeCurrency')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
								</div>
								<div class="card-body align-center">
									<div class="table-responsive">
										@if($message = Session::get('currency_success'))
											<div class="alert alert-success">
												<p>{{$message}}</p>
											</div>
										@endif
										@if($message = Session::get('currency_warning'))
											<div class="alert alert-warning">
												<p>{{$message}}</p>
											</div>
										@endif
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light">
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_pay_grade_currency_table')">
													</th>
													<th>Currency</th>
													<th>Minimum Salary</th>
													<th>Maximum Salary</th>
												</tr>
											</thead>
											<tbody id="list_pay_grade_currency_table">
												@if(count($grade_currency) > 0)
													@foreach ($grade_currency as $row)
														<tr>
															<td class="text-center">
																<input type="checkbox" name="pay_grade_currency" value="{{ $row->id }}">
															</td>
															<td>
																<h2>
																	<u><a href="javascript:void(0);" >
																		{{ @$row->currencyName->currency_name }}
																	</a></u>
																</h2>
															</td>
															<td>{{ $row->min_salary }}</td>
															<td>{{ $row->max_salary }}</td>
														</tr>
													@endforeach
												@else
													<tr>
														<td colspan="5"><p class="text-center">No Currency for this Grade !</p></td>
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
				<!-- /Currency List -->
			</div>
			<!--/Content-->
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection

@push('scripts')
<script type="text/javascript">
	$('#currency_show').on('click', function () {
		if ($("#currency_div").css("display") == 'none') {
		 	$('#currency_div').css("display", "block");
		}
	});

	$('#currency_hide').on('click', function () {
		if ($("#currency_div").css("display") == 'block') {
		 	$('#currency_div').css("display", "none");
		}
	});

	// Autocomplete ajax call
	$('.currency').select2({
		placeholder: 'Select a Currency',
		allowClear: true,
		ajax: {
			url: '/currency-autocomplete-ajax',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results:  $.map(data, function (item) {
						return {
							text: item.currency_name,
							id: item.currency_id
						}
					})
				};
			},
			cache: true
		}		
	});

	$(document.body).on("change","#currency",function(){
	 	$('#currency_id').val(this.value);
	});


</script>
<!-- <script type="text/javascript" src="{{ URL::asset('js/currency.js') }}"></script> -->
@endpush