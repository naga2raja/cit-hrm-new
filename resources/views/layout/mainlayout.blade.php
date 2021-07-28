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
				$('#'+$table_tbody_id+' input[type="checkbox"]').prop("checked", true);
			}else {
				$('#'+$table_tbody_id+' input[type="checkbox"]').prop("checked", false);
			}                
		}

		function deleteAll($table_tbody_id, $module) {
			var selectedIds = [];
			$('#'+$table_tbody_id+' input[type="checkbox"]:checked').each(function(){
				var selected_user_ids = $(this).val();
				selectedIds.push(selected_user_ids);
			});                

			if(selectedIds.length == 0) {
				alert('Please select atleast one record to delete');
				return false;
			}

			if (!confirm("Do you want to delete?")){
				return false;
			}
			console.log('delete', selectedIds);
		    $.ajax({
	            method: 'POST',
	            url: '/'+$module+'/multiple-delete',
	            data: JSON.stringify({'delete_ids': selectedIds, "_token": "{{ csrf_token() }}" }),
	            dataType: "json",
	            contentType: 'application/json',
	            success: function(response){
	                console.log('response : ', response);
					alert('Deleted successfully!');
					window.location.reload();
	            }					
	        });
		}

		function resetAllValues(formId) {
			$('#'+formId).find('input:text').val('');
			$('#'+formId).find('textarea').val('');
			$('#'+formId).find('select').val('');
		}
	</script>
	<!-- Common multiple delete end-->

  @stack('scripts')
  @stack('custom-scripts')
  @yield('my-scripts')

  </body>
</html>