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
			var selectedIds = [];
			$('#'+$table_tbody_id+' input[type="checkbox"]:checked').each(function(){
				var selected_user_ids = $(this).val();
				selectedIds.push(selected_user_ids);
			});

			if(selectedIds[0] == "on") {
				alert('Please select valid records to delete');
				return false;
			}

			if(selectedIds.length == 0) {
				alert('Please select atleast one record to delete');
				return false;
			}

			if (!confirm("Do you want to delete?")){
				return false;
			}
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
						alert('Can\'t delete the '+ $module);
					} else {
						alert('Deleted successfully!');
					}					
					window.location.reload();
	            },
				error: function(response, status){
	                console.log('error', response, 'status:', status);					
					alert('Can\'t delete the '+ $module);
					
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