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
										<h4 class="card-title mb-0">Add Project</h4>
									</div>
								</div>
								<div class="card-body">
									<form method="POST" action="{{ route('projects.store') }}">
										@csrf
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Customer Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
	                                    			<input type="hidden" name="customer" id="customer" value="">
													<input type="text" class="form-control {{ $errors->has('customer') ? 'is-invalid' : ''}}" placeholder="Type for hints.." name="customer_name" value="{{ old('customer_name') }}" id="customer_name" autocomplete="off">
													{!! $errors->first('customer', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													<div id="customers_list" class="autocomplete"></div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<u><a href="" data-toggle="modal" data-target="#add_customer">Add customer</a></u>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Project Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('project_name') ? 'is-invalid' : ''}}" placeholder="" name="project_name" value="{{ old('project_name') }}">
													{!! $errors->first('project_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Project Admin </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<select class="admin_id form-control {{ $errors->has('admin_id') ? 'is-invalid' : ''}}" name="admin_id" id="admin_id" style="width: 100%">
														
													</select>
													{!! $errors->first('admin_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}	
													
	                                    			{{-- <input type="hidden" name="admin_id" id="admin_id" value="">
													<input type="text" class="form-control {{ $errors->has('project_admin') ? 'is-invalid' : ''}}" placeholder="Type for hints.." name="project_admin" value="{{ old('project_admin') }}" autocomplete="off" id="project_admin">
													<div id="project_admins_list" class="autocomplete"></div> --}}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Project Managers </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
	                                    			<select class="managers form-control {{ $errors->has('managers') ? 'is-invalid' : ''}}" name="managers[]" id="manager_ids" multiple="multiple" style="width: 100%">
														@foreach ($managers as $item)
															<option value="{{ $item['id'] }}" selected> {{ $item['name'] }}</option>
														@endforeach
													</select>
													{!! $errors->first('managers', '<span class="invalid-feedback" role="alert">:message</span>') !!}														
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Project Employees </label>
												</div>
											</div>
											<div class="col-sm-3">
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

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Description </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<textarea class="form-control {{ $errors->has('project_description') ? 'is-invalid' : ''}}" rows="3" name="project_description">{{ old('project_description') }}</textarea>{!! $errors->first('project_description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
										<hr>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-3 text-center">
												<div class="row">
													<div class="col-sm-6">
														<div class="submit-section text-center btn-add">
															<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
														</div>
													</div>
													<div class="col-sm-6">
														<a href="{{ route('projects.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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

		<!--Customer The Modal -->
		<div class="modal fade" id="add_customer">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-1">Add customer</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
						<!-- Modal body -->
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Name <span class="text-danger">*</span></label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control {{ $errors->has('modal_customer_name') ? 'is-invalid' : ''}}" placeholder="" name="modal_customer_name" value="{{ old('modal_customer_name') }}">
	                                    {!! $errors->first('modal_customer_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Description</label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<textarea class="form-control {{ $errors->has('modal_customer_description') ? 'is-invalid' : ''}}" rows="3" name="modal_customer_description">{{ old('modal_customer_description') }}</textarea>
										{!! $errors->first('modal_customer_description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-success text-white ctm-border-radius" onclick="save_customer()">Save</button>
					        <button type="button" class="btn btn-danger text-white ctm-border-radius" data-dismiss="modal" id="customer_model_cancel">Cancel</button>						
					    </div>	
				</div>
			</div>
		</div>
		
@endsection

@push('scripts')
<script type="text/javascript">
	function save_customer(){
		var modal_customer_name = $('input[name="modal_customer_name"]').val();
		var modal_customer_description = $('input[name="modal_customer_description"]').val();
		$.ajax({
		   url:"{{ route('project-save-customer') }}",
		   method:"POST",
		   data:JSON.stringify({modal_customer_name:modal_customer_name, modal_customer_description:modal_customer_description,  "_token": "{{ csrf_token() }}"}),
		   dataType: "json",
		   contentType: 'application/json',
		   success:function(data){
		   	console.log(data.customer_name, data.customer_id);
		    $('#customer_model_cancel').click();
		    $('#customer_name').val(data.customer_name);
		    $('#customer').val(data.customer_id);
		  }
		});
	}	

	$('#customer_name').keyup(function(){ 
        var customer_name = $(this).val();
        $('#customer').val('');
        if(customer_name != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('customers-search') }}",
          method:"POST",
          data:{customer_name:customer_name, _token:_token},
          success:function(data){
           $('#customers_list').fadeIn();
           $('#customers_list').html(data);
          }
         });
        } else{
        	$('#customers_list').html('');	        	
        }
    });

    $(document).on('click', '.customer', function(){  
        $('#customer_name').val($(this).text());  
        $('#customers_list').fadeOut();  
    });

    $('#project_admin').keyup(function(){ 
        var project_admin = $(this).val();
        $('#admin_id').val('');
        if(project_admin != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('project-admin-search') }}",
          method:"POST",
          data:{project_admin:project_admin, _token:_token},
          success:function(data){
           $('#project_admins_list').fadeIn();
           $('#project_admins_list').html(data);
          }
         });
        } else{
        	$('#project_admins_list').html('');	        	
        }
    });

    $(document).on('click', '.admin', function(){
        $('#project_admin').val($(this).text());  
        $('#project_admins_list').fadeOut();  
    });

    function pass_customer_id(id){
    	document.getElementById('customer').value = id;
    }

    function pass_admin_id(id){
    	document.getElementById('admin_id').value = id;
    }

	$('.employee_name, .managers, #admin_id').select2({
		placeholder: 'Select',
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
@endpush