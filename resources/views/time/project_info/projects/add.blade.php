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
											<div class="col-sm-4">
												<div class="form-group">
	                                    			<input type="hidden" name="customer" id="customer" value="">
													<input type="text" class="form-control {{ $errors->has('customer') ? 'is-invalid' : ''}}" placeholder="Type for hints.." name="customer_name" value="{{ old('customer_name') }}" id="customer_name" autocomplete="off">
													{!! $errors->first('customer', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													<div id="customers_list" class="autocomplete"></div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<u><a href="" data-toggle="modal" data-target="#add_customer">Add customer</a></u>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
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
											<div class="col-sm-4">
												<div class="form-group">
	                                    			<input type="hidden" name="admin_id" id="admin_id" value="">
													<input type="text" class="form-control {{ $errors->has('project_admin') ? 'is-invalid' : ''}}" placeholder="Type for hints.." name="project_admin" value="{{ old('project_admin') }}" autocomplete="off" id="project_admin">
													{!! $errors->first('project_admin', '<span class="invalid-feedback" role="alert">:message</span>') !!}	
													<div id="project_admins_list" class="autocomplete"></div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<u><a style="color: #007bff;" onclick="add_another()">Add another</a></u>
												</div>
											</div>
										</div>

										<div id="admin_div">
											
										</div>										

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Description </label>
												</div>
											</div>
											<div class="col-sm-4">
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
											<div class="col-sm-4 text-center">
												<button class="btn btn-success text-white ctm-border-radius" type="submit">Save</button>
												<a href="{{ route('projects.index') }}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
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

	function add_another(){
		var admin_div = document.getElementById('admin_div');
		var admin = document.getElementsByClassName('admin');

		var id = admin.length + 1;
   		admin_div.innerHTML += "<div class='row admin'id='admin_name_"+id+""+"'"+"><div class='col-sm-2'></div><div class='col-sm-4'><div class='form-group'><input type='text' class='form-control' placeholder='Type for hints...'></div></div><div class='col-sm-4'><div class='form-group'><u><a class='remove' id='admin_remove_"+id+""+"'"+" style='color: #007bff;' onClick='remove_admin(this.id)'>Remove</a></u><br></div></div></div>";
	}

	function remove_admin(id){
		var id = id.slice(13, );
		document.getElementById('admin_remove_'+id).remove();
		document.getElementById('admin_name_'+id).remove();

		//rearrange the id after removing
		var admin = document.getElementsByClassName('admin');
		var remove = document.getElementsByClassName('remove');

		for(var i = 0; i < admin.length; i++){
			var j = i + 1;
			admin[i].id = "admin_name_"+j;
			remove[i].id = "admin_remove_"+j;
		}
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
</script>
@endpush