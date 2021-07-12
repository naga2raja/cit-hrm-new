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
										<h4 class="card-title mb-0">Edit Pay Grade</h4>
									</div>
								</div>
								<div class="card-body">
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
											<div class="col-sm-2 text-center">
												<button type="submit" class="btn btn-success text-white ctm-border-radius"><i class="fa fa-refresh"></i> Update</button>
												<a href="{{ route('payGrades.index') }}" class="btn btn-danger text-white ctm-border-radius"><i class="fa fa-arrow-left"></i> Cancel</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Currency Add -->
				<div class="container-fluid" id="currency_div" style="display: none">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header shadow-sm">
									<div class="text-left ml-2">
										<h4 class="card-title mb-0">Add Currency</h4> 
									</div>
								</div>
								<div class="card-body">
									<form method="post" action="{{ route('payGradeCurrency.store') }}">
										@csrf
										<div class="row">
											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>Currency <span class="text-danger">*</span></label>
													<input type="text" name="currency" id="currency" class="form-control" placeholder="" required="" autocomplete="off">
													<input type="hidden" name="currency_id" id="currency_id" class="form-control" placeholder="">
													<input type="hidden" name="pay_grade_id" id="pay_grade_id" class="form-control" value="{{ $grades->id }}">
													<div id="currency_list" class="autocomplete"></div>
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

											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>.</label><br>
													<button href="javascript:void(0);" class="btn btn-success text-white ctm-border-radius"><i class="fa fa-save"></i> Save</button>
													<a id="currency_hide" class="btn btn-danger text-white ctm-border-radius"><i class="fa fa-arrow-left"></i> Cancel</a>
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
				<!-- /Currency Add -->

				<!-- Currency List -->
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header shadow-sm">
									<div class="text-left ml-3">
										<h4 class="card-title mb-0">Assigned Currencies</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="mb-3">
										<a id="currency_show" class="btn btn-success text-white ctm-border-radius"><i class="fa fa-plus"></i> Add</a>
										<a href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius"><i class="fa fa-trash"></i> Delete</a>
									</div>
									<div class="employee-office-table">
										<div class="table-responsive">
											@if($message = Session::get('currency_success'))
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
														<th>Currency</th>
														<th>Minimum Salary</th>
														<th>Maximum Salary</th>
													</tr>
												</thead>
												<tbody>
													@if(count($grade_currency) > 0)
														@foreach ($grade_currency as $row)
															<tr>
																<td class="text-center">
																	<input type="checkbox" name="currency_id" value="{{ $row->currency_id }}">
																</td>
																<td>
																	<h2>
																		<u><a href="javascript:void(0);" >
																			{{ $row->currencyName->currency_name }}
																		</a></u>
																	</h2>
																</td>
																<td>{{ $row->min_salary }}</td>
																<td>{{ $row->max_salary }}</td>
															</tr>
														@endforeach
													@else
														<tr>
															<td colspan="5"><div class="alert alert-danger text-center">No Currency for this Grade !</div></td>
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
	$('#currency').keyup(function(){ 
		var currency = $(this).val();
		if(currency != '')
		{
			var _token = $('input[name="_token"]').val();
			$.ajax({
				method:"POST",
				url: '/currencyNameSearch',
				data:{ currency:currency, _token:_token },
				success:function(data){
					$('#currency').removeClass('is-invalid');
					$("#not_exist").remove();

					if(data != ""){					
						$('#currency_list').fadeIn();
						$('#currency_list').html(data);
					}else{
						var exists = ($("#not_exist").length == 0);
					    if (exists) {
					        $('#currency').addClass('is-invalid');
							$('#currency_list').fadeOut();
							$('<span id="not_exist" class="invalid-feedback" role="alert">Currency does not exist</span>').insertAfter('#currency');
					    }
					}
				}
			});
		} else{
			$('#currency_list').html('');	        	
		}
	});

	$(document).on('click', '.currencies', function(){
		$('#currency').val($(this).text());
		$('#currency_id').val($(this).attr('id'));
		$('#currency').removeClass('is-invalid');
		$('#currency_list').fadeOut();
		$("#not_exist").remove();
	});


</script>
<!-- <script type="text/javascript" src="{{ URL::asset('js/currency.js') }}"></script> -->
@endpush