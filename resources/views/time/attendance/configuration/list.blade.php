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
										<h4 class="card-title mb-0">Attendance Configuration</h4>
									</div>
								</div>
								<div class="card-body">
								@if($message = Session::get('success'))
								<div class="alert alert-success">
									<p>{{$message}}</p>
								</div>
								@endif									
									<form method="POST" action="{{ route('configurations.store') }}">
										@csrf


										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label>{{ $employeeConfig->action }} </label>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<div class="custom-control custom-switch float-left">
														<input type="checkbox" class="custom-control-input" name="enable_employee_checkbox" value="{{$employeeConfig->id}}" id="{{ 'customeSwitch'.$employeeConfig->id }}" @if($employeeConfig->action_flag != 0 && !$errors->has('employees') ){{'checked'}} @endif>
														<label class="custom-control-label" for="{{ 'customeSwitch'.$employeeConfig->id }}"></label>
													</div>
												</div>
											</div>
										</div>

										<div id="employee_div" style="{{ ($employeeConfig->action_flag == 0 || $errors->has('employees')) ? 'display:block' : 'display:none' }}">
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<!-- <label>Choose Employees</label> -->
													</div>
												</div>
												<div class="col-sm-8">
													<div class="form-group">										
														<select class="employee_name form-control {{ $errors->has('employees') ? 'is-invalid' : ''}}" name="employees[]" id="employee_ids" multiple="multiple" style="width: 100%">
															@foreach ($employees as $item)
																<option value="{{ $item['id'] }}" selected> {{ $item['name'] }}</option>
															@endforeach
														</select>
														{!! $errors->first('employees', '<span class="invalid-feedback" role="alert">:message</span>') !!}														
													</div>
												</div>
											</div>
										</div>

										@foreach($configurations as $configure)
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ $configure->action }} </label>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group">
														<div class="custom-control custom-switch float-left">
															<input type="checkbox" class="custom-control-input" name="checkbox[]" value="{{$configure->id}}" id="{{ 'customeSwitch'.$configure->id }}" @if($configure->action_flag != 0){{'checked'}}@endif>
															<label class="custom-control-label" for="{{ 'customeSwitch'.$configure->id }}"></label>
														</div>
													</div>
												</div>
											</div>
										@endforeach
										<hr>

										<div class="row">
											<div class="col-sm-4"></div>
											<div class="col-sm-3 text-center">
												<div class="row">
													<div class="col-sm-6">
														<div class="submit-section text-center btn-add">
															<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
														</div>
													</div>
													<div class="col-sm-6">
														<a href="{{ route('index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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
			<!--/Content-->
			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection

@section('my-scripts')

<script type="text/javascript">

$('#customeSwitch4').change(function() {
        if(this.checked) {
			$('#employee_div').hide();
            console.log('hello');
        } else {
			$('#employee_div').show();
		}
              
    });

$('.employee_name').select2({
		placeholder: 'Select a employee',
		ajax: {
			url: '/employee-autocomplete-ajax',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results:  $.map(data, function (item) {
						return {
							text: item.name,
							id: item.id
						}
					})
				};
			},
			cache: true
		}		
	});

</script>
	
@endsection