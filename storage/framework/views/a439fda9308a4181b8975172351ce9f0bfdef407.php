<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <body>
	<?php if(!Route::is(['forgot-password','login','register', 'password.request']) && !(\Request::is('password/reset/*')) ): ?>
	 	<?php echo $__env->make('layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
	<?php echo $__env->yieldContent('content'); ?>
	<?php echo $__env->make('layout.partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
	            data: JSON.stringify({'delete_ids': selectedIds, "_token": "<?php echo e(csrf_token()); ?>" }),
	            dataType: "json",
	            contentType: 'application/json',
	            success: function(response){
	                console.log('response : ', response);
					alert('Deleted successfully!');
					window.location.reload();
	            }					
	        });
		}
	</script>
	<!-- Common multiple delete end-->

  <?php echo $__env->yieldPushContent('scripts'); ?>
  <?php echo $__env->yieldPushContent('custom-scripts'); ?>
  <?php echo $__env->yieldContent('my-scripts'); ?>

  </body>
</html><?php /**PATH D:\xampp\htdocs\cit-hrm-new\resources\views/layout/mainlayout.blade.php ENDPATH**/ ?>