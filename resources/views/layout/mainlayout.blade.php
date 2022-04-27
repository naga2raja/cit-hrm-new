<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.head')
  </head>
  <body>
	@if(!Route::is(['forgot-password','login','register', 'password.request']) && !(\Request::is('password/reset/*')) )
	 	@include('layout.partials.header')
	@endif
	@yield('content')
	@include('layout.partials.footer-scripts')

	<!--  Validation Modal -->
	<div class="modal fade" id="confirm_delete_modal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">		
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title mb-3"></h5><hr>
					<p class="modal-message"></p>	
					<input type="hidden" id="del_selectedIds">
					<input type="hidden" id="del_module">
					<input type="hidden" id="del_url">
					<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3 mt-4" data-dismiss="modal">Close</button>
					<button type="button" style="display: none;" onclick="deleteAjaxApiCall()" id="confirm_delete_btn" class="btn btn-theme ctm-border-radius text-white float-right ml-3 mt-4 pl-4 pr-4">Ok</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Common multiple delete -->
	<script type="text/javascript">
		function SelectAll($table_tbody_id) {
			var isCheckedAll = $('#select_checkAll').val();
			if ($('#select_checkAll').is(':checked')) {
				$('#'+$table_tbody_id+' input[type="checkbox"]').not(":disabled").prop("checked", true);
			}else {
				$('#'+$table_tbody_id+' input[type="checkbox"]').not(":disabled").prop("checked", false);
			}                
		}

		function deleteAll($table_tbody_id, $module, url = false) {
			$('#confirm_delete_btn').hide();
			var selectedIds = [];
			$('#'+$table_tbody_id+' input[type="checkbox"]:checked').each(function(){
				var selected_user_ids = $(this).val();
				selectedIds.push(selected_user_ids);
			});
			console.log('selectedIds', selectedIds);
			$('#confirm_delete_modal .modal-title').html('Error');

			if(selectedIds[0] == "on") {
				//alert('Please select valid records to delete');
				let msg = 'Please select valid records to delete!!';
				$('#confirm_delete_modal').modal('show');				
				$('#confirm_delete_modal .modal-message').html(msg); 
				return false;
			}

			if(selectedIds.length == 0) {
				let msg = 'Please select atleast one record to delete!';
				$('#confirm_delete_modal').modal('show');				
				$('#confirm_delete_modal .modal-message').html(msg); 

				// alert('Please select atleast one record to delete');
				return false;
			}
			if(!url) {
				url = '/'+$module+'.deleteMultiple';								
			}

			$('#confirm_delete_modal .modal-title').html('Do you want to delete?');
			$('#confirm_delete_modal .modal-message').html('Click on OK button to proceed!'); 
			$('#confirm_delete_btn').show();
			$('#confirm_delete_modal').modal('show');
			$('#del_selectedIds').val(selectedIds);
			$('#del_module').val($module);
			$('#del_url').val(url);
			return false;

			if (!confirm("Do you want to delete?")){
				return false;
			}		

			console.log(url, 'delete', selectedIds);
		    $.ajax({
	            method: 'POST',
	            url: url,
	            data: JSON.stringify({'delete_ids': selectedIds, "_token": "{{ csrf_token() }}" }),
	            dataType: "json",
	            contentType: 'application/json',
	            success: function(response){
	                console.log('response : Dele', response);
					if(response == 'error') {
						alert('Can\'t delete the '+ $module);
					} else {
						alert('Deleted successfully!');
					}						
					location.href=location.href.replace(/&?page=([^&]$|[^&]*)/i, "");
					// let url = window.location.href;
					// window.location.href = url; //url.split('?')[0];				
					//window.location.reload();
	            },
				error: function(response, status){
	                console.log('error', response, 'status:', status);					
					alert('Can\'t delete the '+ $module);
					
	            }
	        });
		}

		function deleteAjaxApiCall() {
			let selectedIds = $('#del_selectedIds').val();
			selectedIds = selectedIds.split(',');
			let $module = $('#del_module').val();
			let url = $('#del_url').val();
			console.log(selectedIds, $module, url);

			if(!url) {
				url = '/'+$module+'.deleteMultiple';								
			}

			console.log(url, 'delete', selectedIds);
		    $.ajax({
	            method: 'POST',
	            url: url,
	            data: JSON.stringify({'delete_ids': selectedIds, "_token": "{{ csrf_token() }}" }),
	            dataType: "json",
	            contentType: 'application/json',
	            success: function(response){
	                console.log('response : Dele', response);
					if(response == 'error') {
						let msg = 'Can\'t delete the '+ $module;										
						$('#confirm_delete_modal .modal-message').html(msg);
						$('#confirm_delete_modal .modal-title').html('Error');
						$('#confirm_delete_modal').modal('show');
						return false;
						// alert('Can\'t delete the '+ $module);
					} else {
						alert('Deleted successfully!');
						location.href=location.href.replace(/&?page=([^&]$|[^&]*)/i, "");
					}					

					//location.href=location.href.replace(/&?page=([^&]$|[^&]*)/i, "");

					// let url = window.location.href;
					// window.location.href = url; //url.split('?')[0];				
					//window.location.reload();
	            },
				error: function(response, status){
	                console.log('error', response, 'status:', status);					
					//alert('Can\'t delete the '+ $module);	
					let msg = 'Can\'t delete the '+ $module;										
					$('#confirm_delete_modal .modal-message').html(msg);
					$('#confirm_delete_modal .modal-title').html('Error');
					$('#confirm_delete_modal').modal('show');				
	            }
	        });

		}

		function resetAllValues(formId) {
			$('#'+formId).find('input:text').val('');
			$('#'+formId).find('textarea').val('');
			$('#'+formId).find('select').val('');
			$('#' + formId + ' select').val('').trigger('change');
			$('#'+formId).find('input:file').val('');
			$('#'+formId).find('input:hidden').val('');
			$('.alert.alert-success').hide();

			var uri = window.location.toString();
		    if (uri.indexOf("?") > 0) {
		        var clean_uri = uri.substring(0, uri.indexOf("?"));
		        window.history.replaceState({}, document.title, clean_uri);
				location.reload();
		    }
		}
	</script>
	<!-- Common multiple delete end-->

  @stack('scripts')
  @stack('custom-scripts')
  @yield('my-scripts')

  </body>
</html>