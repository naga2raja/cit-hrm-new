@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">

						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="accordion add-employee" id="accordion-details">
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header" id="basic1">
										<h4 class="cursor-pointer mb-0">
											<a class="ml-2 coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
												Add Timesheet
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

											@if($message = Session::get('error'))
												<div class="alert alert-danger">
													<p>{{$message}}</p>
												</div>
											@endif

											<form method="POST" action="" id="timesheets_form">												
												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Timesheet Date <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-2">
														<div class="form-group">
															<div class="input-group mb-3">
																<input type="text" name="date" id="timesheet_date" class="form-control" readonly="">
																<div class="input-group-append">
																	<button class="btn btn-white border" type="button" id="calendar_icon">
																		<i class="fa fa-calendar" aria-hidden="true"></i>
																	</button>
																</div>
															</div>
														</div>
													</div>

													<div class="col-sm-2">
														<div class="form-group">
															<label class="float-right">Employee Name <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<select class="employee_name form-control {{ $errors->has('employee_name') ? 'is-invalid' : ''}}" name="employee_name" id="employee_name" required="" style="width: 100%" >
																@if(Request::get('employee_id'))
																	<option selected="selected" id="{{ @$employees->id }}">{{ @$employees->employee_name }}</option>
																@endif
															</select>
															{!! $errors->first('employee_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
															<input type="hidden" name="employee_id" id="employee_id" class="form-control" value="{{ (Request::get('employee_id')) ? Request::get('employee_id') : '' }}">
														</div>
													</div>
												</div>
												<hr>

												<div class="table-responsive">
													<table id="timesheets" class="table custom-table table-hover">
														<thead>
															<tr class="bg-light">
	              												<th>Project Name <span class="text-danger">*</span></th>
	              												<th>Activity Name <span class="text-danger">*</span></th>
	              												<th>Duration <span class="text-danger">*</span></th>
	              												<th>Comments</th>
	              												<th></th>
	              											</tr>
														</thead>
														<tbody>
															@if(count($entitlement) > 0)
															@foreach ($entitlement as $row)
																<tr id="row_0">
		              												<td>
		              													<select class="project_name form-control select2 {{ $errors->has('project_name') ? 'is-invalid' : ''}}" name="timeItem[0][project_name]" id="project_name" required="" style="width: 100%">
																		</select>
																		{!! $errors->first('project_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
																		<input type="hidden" name="timeItem[0][project_id]" id="project_id" class="form-control project_id">
																	</td>
		              												<td>
		              													<select class="form-control activity_name select {{ $errors->has('activity_name') ? 'is-invalid' : ''}}" name="timeItem[0][activity_name]" id="activity_name" required="" style="width: 100%">
		              														<option value="">Select Activity Name</option>
																		</select>
																		{!! $errors->first('activity_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
																		<input type="hidden" name="timeItem[0][activity_id]" id="activity_id" class="form-control activity_id">
																	</td>
		              												<td>
		              													<input type="time" class="form-control {{ $errors->has('duration') ? 'is-invalid' : ''}}" name="timeItem[0][duration]" id="duration" value="{{ old('duration') ? old('duration') : '' }}" placeholder="HH:MM" required="">
					                                                    {!! $errors->first('duration', '<span class="invalid-feedback" role="alert">:message</span>') !!}
					                                                </td>
		              												<td>
		              													<textarea name="timeItem[0][comments]" class="form-control" rows="1" width="200px"></textarea>
		              												</td>
		              												<td><button type="button" name="timeItem[0][remove]" id="0" class="btn_remove btn btn-danger text-white ctm-border-radius">X</button></td>
		              											</tr>															
														</tbody>
													</table>
												</div>
												<hr>

												<div class="col-sm-12 text-center">
													<div class="row">
														<div class="col-sm-1">
															<div class="submit-section text-center btn-add">
																<button type="button" id="save" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
															</div>
														</div>
														<div class="col-sm-1">
															<button type="reset" class="btn btn-secondary text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Reset</button>
														</div>
														<div class="col-sm-1">
															<a href="{{ route('timesheets.index') }}" class="btn btn-secondary text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Cancel</a>
														</div>

														<div class="col-sm-1">
															<button type="button" name="add" id="add" class="btn btn-success text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Add Row</button>
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
			</div>
			<!--/Content-->
			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection

@push('scripts')
<script type="text/javascript">

	$('#calendar_icon').on('click', function(){
		$('#timesheet_date').datetimepicker("show");
	});

	//Date picker's format
	$("#timesheet_date").datetimepicker({
		format: 'DD-MM-YYYY',
		locale:  moment.locale('en', {
			week: { dow: 1 }
		}),		
		maxDate: moment(),
        icons: {
            up: "fa fa-angle-up",
            down: "fa fa-angle-down",
            next: 'fa fa-angle-right',
            previous: 'fa fa-angle-left'
        },
        daysOfWeekDisabled: [0,6],
	});

	// Autocomplete ajax call
	$('.employee_name').select2({
		placeholder: 'Select a employee',
		ajax: {
			url: '{{ route("ajax.employee_search") }}',
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

	$(document.body).on("change","#employee_name",function(){
	 	$('#employee_id').val(this.value);
	});

	loadProjects();
	// Autocomplete ajax call
	function loadProjects(i='') {
		$('#project_name'+i).select2({
			placeholder: 'Select a project',
			ajax: {
				url: '/project-autocomplete-ajax',
				dataType: 'json',
				delay: 250,
				processResults: function (data) {
					return {
						results:  $.map(data, function (item) {
							return {
								text: item.project_name,
								id: item.id
							}
						})
					};
				},
				cache: true
			}		
		});
	}

	$(document.body).on("change",".project_name",function(){
		var project_id = this.value;
		var row_id = '#'+ $(this).closest("tr").prop("id");
		console.log('project_id', project_id, 'row_id', row_id);
	 	$(row_id+' .project_id').val(project_id);
	 	$.ajax({
			method: 'POST',
			url: '/getActivityName-ajax',
			data: JSON.stringify({'project_id': project_id, '_token': '{{ csrf_token() }}' }),
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				// console.log('response : ', data);
				if(data.length > 0){
		            // console.log(data);
		            $(row_id+' .activity_name').empty();
		            $(row_id+" .activity_name").append('<option value="">Select Activity Name</option>');
		            data.forEach(function (row,index) {
		            	$(row_id+" .activity_name").append('<option value=' + row.id + '>' + row.activity_name + '</option>');
		            });
		        }else{
		        	$(row_id+' .activity_name').empty(); // cache it
		        }
			}
		});
	});

	$(document.body).on("change",".activity_name",function(){
		var row_id = '#'+ $(this).closest("tr").prop("id");
	 	$(row_id+' .activity_id').val(this.value);

	 	var myRow = $(this).parents("tr:last"),
        rowWithInput = myRow.prevAll(":has('.project_name')").last(),
        val = rowWithInput.find(".project_name").val();
        alert(val);
	});

	function validation (j) {
		if(j == 0){
			j = '';
		}
		if(!$('#timesheet_date').val()){
    		$('#timesheet_date').focus();
    		return false;
    	}
    	else if(!$('#employee_name').val()){
    		$('#employee_name').select2('open');
    		return false;
    	}
    	else if(!$('#project_name'+j).val()){
			$('#project_name'+j).select2('open');
			return false;
    	}
    	else if(!$('#activity_name'+j).val()){
    		$('#activity_name'+j).first().focus();
    		return false;
    	}
    	else if(!$('#duration'+j).val()){
    		$('#duration'+j).focus();
    		return false;
    	}else{
    		return true;
    	}
	}

	window.onload = function() {
		// make readonly only if employee_id exist
		@if(Request::get('employee_id'))
			$("#employee_name").select2({disabled:'readonly'});
		@endif readonly='true'
		
        var i = 0; var j = '';
        $('#add').click(function(){
        	var valid = validation(j);       	
        	if(valid){
	            i++; j++;
	        	$rows = '';
	        	$rows += '<tr id="row_'+i+'">';
	        		$rows += '<td>';
	        			$rows += '<select class="project_name form-control {{ $errors->has("project_name") ? "is-invalid" : ''}}" name="timeItem['+i+'][project_name]" id="project_name'+i+'" required="" style="width: 100%">';
	        			$rows += '</select>';
	        			$rows += '<input type="hidden" name="timeItem['+i+'][project_id]" id="project_id'+i+'" class="form-control project_id">';
	        		$rows += '</td>';
	            	$rows += '<td>';
	        			$rows += '<select class="form-control activity_name select" name=timeItem['+i+'][activity_name] id="activity_name'+i+'" required="" style="width: 100%">';
	        				$rows += '<option value="">Select Activity Name</option>';
	        			$rows += '</select>';
	        			$rows += '<input type="hidden" name="timeItem['+i+'][activity_id]" id="activity_id'+i+'" class="form-control activity_id">';
	            	$rows += '</td>';
	            	$rows += '<td>';
	        			$rows += '<input type="time" class="form-control {{ $errors->has("duration") ? "is-invalid" : ''}}" name="timeItem['+i+'][duration]" id="duration'+i+'" value="{{ old("duration") ? old("duration") : '' }}" placeholder="HH:MM" required="">';
	            	$rows += '</td>';
	            	$rows += '<td>';
	            			$rows += '<textarea name="timeItem['+i+'][comments]" class="form-control" rows="1" width="200px"></textarea>';
	            	$rows += '</td>';
	            	$rows += '<td>';
					    $rows += '<button type="button" name="timeItem['+i+'][remove]" id="'+i+'" class="btn_remove btn btn-danger text-white ctm-border-radius">X</button>';
					$rows += '</td>';
				$rows += '</tr>';

	            $('#timesheets').append($rows);
	            $('#activity_name'+i).select2();
	            loadProjects(i);
        	}
        });
    }        

    $(document).on('click','#timesheets .btn_remove', function(){
    	var valid = validation($(this).attr("id"));
    	if(valid){
	        var button_id = $(this).attr("id");
	        $("#row_"+button_id+"").remove();
	    }
    });    

    $('#save').click(function(){
    	var _token = $('input[name="_token"]').val();
    	$.ajax({
           method: 'POST',
           url: "{{ route('timesheets.store') }}",
		   data: { 'data': $('#timesheets_form').serialize(), '_token': '{{ csrf_token() }}' } ,
		   success:function(data){
		   	console.log(data);
		   	alert("success");
		   	// window.location.href = data.url;
		  }
		});
    });

</script>
@endpush