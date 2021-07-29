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
														<input type="text" name="date" id="timesheet_date" class="form-control" value="{{ date('d-m-Y', strtotime(Request::get('date'))) }}">
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
          												<th>Duration <span class="text-danger">*</span> (HH:MM)</th>
          												<th>Comments</th>
          												<th></th>
          											</tr>
												</thead>
												<tbody>
													@if(count($timesheet_item) == 0)
														<?php $timesheet_item['name'] = '0'; ?>
													@endif
													@if(count($timesheet_item) > 0)
														@foreach ($timesheet_item as $row)
															<tr id="row_{{ $loop->index }}">
	              												<td>
	              													<input type="hidden" id="count" value="{{ count($timesheet_item) }}">
	              													<select class="project_name form-control select2 has-error{{ $errors->has('project_name') ? 'is-invalid' : ''}}" name="timeItem[{{ $loop->index }}][project_name]" id="project_name{{ $loop->index }}" required="" style="width: 100%">
	              														@if($row)
																			<option selected="selected" id="{{ @$row->projectName->id }}">{{ @$row->projectName->project_name }}</option>
																		@endif
																	</select>
																	{!! $errors->first('project_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
																	<input type="hidden" name="timeItem[{{ $loop->index }}][project_id]" id="project_id{{ $loop->index }}" class="form-control project_id" value="{{ @$row->projectName->id }}">
																</td>
	              												<td>
	              													<select class="form-control activity_name select {{ $errors->has('activity_name') ? 'is-invalid' : ''}}" name="timeItem[{{ $loop->index }}][activity_name]" id="activity_name{{ $loop->index }}" required="" style="width: 100%">
	              														<option value="">Select Activity Name</option>
	              														@if($row)
		              														@foreach (@$row->projectName->allActivities as $activity)
		              															<option id="{{ @$activity->id }}" value="{{ @$activity->activity_name }}" {{ $activity->id == @$row->activityName->id ? 'selected' : '' }}>{{ @$activity->activity_name }}</option>
									                                        @endforeach
									                                    @endif
																		
																	</select>
																	{!! $errors->first('activity_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
																	<input type="hidden" name="timeItem[{{ $loop->index }}][activity_id]" id="activity_id{{ $loop->index }}" class="form-control activity_id" value="{{ @$row->activityName->id }}">
																</td>
	              												<td>				
	              													<input type="time" class="form-control {{ $errors->has('duration') ? 'is-invalid' : ''}}" name="timeItem[{{ $loop->index }}][duration]" id="duration{{ $loop->index }}" value="{{ date('H:i', mktime(0, @$row->duration)) }}" placeholder="HH:MM" required="">
				                                                    {!! $errors->first('duration', '<span class="invalid-feedback" role="alert">:message</span>') !!}
				                                                </td>
	              												<td>
	              													<textarea name="timeItem[{{ $loop->index }}][comments]" class="form-control" rows="1" width="200px">{{ @$row->comments }}</textarea>
	              												</td>
	              												<td>
	              													@if($loop->index == 0)
	              														<button type="button" name="add" id="add" class="btn btn-primary text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Add Row</button>
	              													@else
	              														<button type="button" name="timeItem[{{ $loop->index }}][remove]" id="{{ $loop->index }}" class="btn_remove btn btn-danger text-white ctm-border-radius">X</button>
	              													@endif
	              												</td>
	              											</tr>
	              										@endforeach
              										@else
														<tr>
															<td colspan="5"><p class="text-center">No Data Found</p></td>
														</tr>
													@endif															
												</tbody>
											</table>
										</div>
										<hr>

										<div class="col-sm-12 text-center">
											<div class="row">														
												<div class="col-sm-4"></div>
												<div class="col-sm-8">
													<div class="row">
														<div class="col-sm-2">
															<div class="submit-section text-center btn-add">
																<button type="button" id="save" class="btn btn-theme ctm-border-radius text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
															</div>
														</div>
														<!-- <div class="col-sm-2">
															<button type="reset" class="btn btn-secondary text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Reset</button>
														</div> -->
														<div class="col-sm-2">
															<a href="{{ url()->previous() }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Cancel</a>
														</div>
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
	</div>
	<!--/Content-->
	
</div>

<div class="sidebar-overlay" id="sidebar_overlay"></div>

<!--  Validation Modal -->
<div class="modal fade" id="validation_message">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">		
			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title mb-3"></h5><hr>
				<p class="modal-message"></p>
				<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3 mt-4" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
		
@endsection

@push('scripts')
<script type="text/javascript">

	function getUniqueActivityName(row_id, project_id, activity_id){
	//check if row id already exists
	 	if(arrayData.length != 0){
		 	arrayData.forEach(function(value,index){
		 		alert(value.project_id+" = "+project_id);
		 	// 	if(value.row_id == row_id) {
				//    arrayData.splice(index,3);
				//    arrayData.push({'row_id':row_id, 'project_id':project_id, 'activity_id': activity_id});
				// }

				if(value.project_id == project_id && value.activity_id == activity_id ) {
					// console.log('exists', arrayData);
					// alert("Already exist");
			   }else{
					// alert("add");
					arrayData.push({'row_id':row_id, 'project_id':project_id, 'activity_id': activity_id});
				}
			});
		}else{
			arrayData.push({'row_id':row_id, 'project_id':project_id, 'activity_id': activity_id});
		}
			console.log("array = ", arrayData);
	}

	function validation_popup_msg(title, msg){
		$('#validation_message').modal('toggle');
		$('.modal-title').html(title);
		$('.modal-message').html(msg);
	}

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
		date: "{{ date('Y-m-d', strtotime(Request::get('date'))) }}",
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

	$(document.body).on("change","#employee_name",function(){
	 	$('#employee_id').val(this.value);
	});

	// asign total count 
	var existingTimesheetCount = '{{ count($timesheet_item) }}';
	existingTimesheetCount = (existingTimesheetCount) ? '{{ count($timesheet_item) }}' :  loadProjects() ;
	// console.log(existingTimesheetCount, 'existingTimesheetCount');
	for(var k=0; k<existingTimesheetCount; k++) {
		loadProjects(k);	
	}
	
	// Autocomplete ajax call
	function loadProjects(i=0) {
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
		        $(row_id+' .activity_name').empty(); // cache it
				if(data.length > 0){
		            // console.log(data);
		            $(row_id+" .activity_name").append('<option value="">Select Activity Name</option>');
		            data.forEach(function (row,index) {
		            	$(row_id+" .activity_name").append('<option value=' + row.id + '>' + row.activity_name + '</option>');
		            });
		        }else{
		        	$(row_id+" .activity_name").append('<option value="">Activity Not Found</option>');
		        }
			}
		});
	});

	var arrayData = [];
	$(document.body).on("change",".activity_name",function(){
		var row_id = '#'+ $(this).closest("tr").prop("id");
	 	$(row_id+' .activity_id').val(this.value);
	 	var project_id = $(row_id+' .project_id').val();
	 	var activity_id = this.value;

	 	getUniqueActivityName(row_id, project_id, activity_id);

	 	
	});

	function validation (j) {
		if(!$('#timesheet_date').val()){
    		$('#timesheet_date').focus();
    		alert("date");
    		return false;
    	}
    	else if(!$('#employee_name').val()){
    		$('#employee_name').select2('open');
    		alert("Select Employee Name");
    		return false;
    	}
    	else if(!$('#project_name'+j).val()){
			$('#project_name'+j).select2('open');
			alert("Select Project Name");
			return false;
    	}
    	else if(!$('#activity_name'+j).val()){
    		$('#activity_name'+j).first().focus();
    		alert("Select Activity Name");
    		return false;
    	}
    	else if ((!$('#duration'+j).val()) || ($('#duration'+j).val() == '00:00')){
    		$('#duration'+j).focus();
    		alert("Enter Duration");
    		$('#duration'+j).addClass("is-invalid");
    		return false;
    	}else{
    		$('.form-control').removeClass("is-invalid");
    		return true;
    	}
	}

	window.onload = function() {
		// make readonly only if employee_id exist
		@if(Request::get('employee_id'))
			$("#employee_name").select2({disabled:'readonly'});
		@endif

	    $('#add').click(function(){
	    	var i = 0; var j = 0;
			var lastTr = $('#timesheets tr:last').attr("id");
			i = lastTr.replace("row_", "");
			j = lastTr.replace("row_", "");
			// alert(j);
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
	        			$rows += '<input type="time" class="form-control {{ $errors->has("duration") ? "is-invalid" : ''}}" name="timeItem['+i+'][duration]" id="duration'+i+'" value="{{ old("duration") ? old("duration") : "00:00" }}" placeholder="HH:MM" required="">';
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
    	if($('.project_name').length != 1){
	        var button_id = $(this).attr("id");
	        $("#row_"+button_id+"").remove();
	    }else{
	    	alert("Can't delete");
	    }
    });    

    $('#save').click(function(){
    	var i = 0; var j = 0;
		var lastTr = $('#timesheets tr:last').attr("id");
		i = lastTr.replace("row_", "");
		j = lastTr.replace("row_", "");
		var valid = validation(j);

		if(valid){
	    	var _token = $('input[name="_token"]').val();
	    	$.ajax({
	           method: 'POST',
	           url: "{{ route('timesheets.store') }}",
			   data: { 'data': $('#timesheets_form').serialize(), '_token': '{{ csrf_token() }}' } ,
			   success:function(data){
			   	console.log(data);
			   	// $('.success').text("Timesheets Updated successfully");
			   	window.location.href = "{{ url()->previous() }}";
			  }
			});
	    }
    });

</script>
@endpush