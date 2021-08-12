<div class="modal fade" id="showLeaveInfo">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
		
			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Leave Information</h4>
				<form method="POST" id="editForm">
					@csrf                            
					<input type="hidden" id="punch_id" name="punch_id">							
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Employee Name</label>
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<div id="employee_name"></div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Leave Type</label>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="form-group">
											<div id="leave_type"></div>
										</div>
									</div>
								</div>
							
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Date</label>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="input-group mb-3">
											<div id="from_to_date"></div>
										</div>
									</div>									
								</div>										

								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Notes</label>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="form-group">
											<div id="notes"></div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Status</label>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="form-group">
											<div id="leave_status">-</div>													
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Created at</label>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="form-group">
											<div id="leave_created_at">-</div>													
										</div>
									</div>
								</div>

								<div class="row">									
									<div class="col-sm-12">
										<label>Logs: </label>
										<div id="leave_action_log"></div>
									</div>
								</div>
								<hr>	
								<div class="row" id="action_buttons">				
									<div class="col-md-12 text-center">	
										<button type="button" class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Close</button>										
									</div>
								</div>						
				</form>
			</div>
		</div>
	</div>
</div>


<!-- jQuery -->
<script src="{{ assetUrl('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ assetUrl('js/jquery-1.11.1.min.js') }}"></script>
		<!-- Bootstrap Core JS -->
		<script src="{{ assetUrl('js/popper.min.js') }}"></script>
		<script src="{{ assetUrl('js/bootstrap.min.js') }}"></script>
		<!-- <script src="{{ assetUrl('js/bootstrap-select.min.js') }}"></script> -->
		<!-- Sticky sidebar JS -->
		<script src="{{ assetUrl('plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>		
		<script src="{{ assetUrl('plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>		
		<!-- Datetimepicker JS -->
		<script src="{{ assetUrl('plugins/select2/moment.min.js') }}"></script>
		<script src="{{ assetUrl('js/bootstrap-datetimepicker.min.js') }}"></script>
		<!-- Select2 JS -->
		<script src="{{ assetUrl('plugins/select2/select2.min.js') }}"></script>
		<!-- Tagsinput JS -->
		<script src="{{ assetUrl('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
		<!-- Full Calendar JS -->
        <script src="{{ assetUrl('js/jquery-ui.min.js') }}"></script>
        <script src="{{ assetUrl('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
        <script src="{{ assetUrl('plugins/fullcalendar/jquery.fullcalendar.js') }}"></script>	
		@if((Route::is(['adminDashboard']))||Route::is(['home'])||Route::is(['index']))	
		<!-- Chart JS -->
		<script src="{{ assetUrl('js/Chart.min.js') }}"></script>
		<script src="{{ assetUrl('js/chart.js') }}"></script>
		@endif
		<!-- Custom Js -->
		<script src="{{ assetUrl('js/script.js') }}"></script>
		<script>
		$(function () {
    $('.selectpicker').selectpicker();
});

function showLeaveInfo(id) {

	$.ajax({
			method: 'GET',
			url: '/leave/'+ id,			
			dataType: "json",
			contentType: 'application/json',
			success: function(response){				
				var info = response.info;
				var logs = response.comments;
				console.log('response : ', response, info.emp_name);
				$('#employee_name').html(info.emp_name);
				$('#leave_type').html(info.name);
				$('#from_to_date').html(info.from_date +' - '+ info.to_date + ' ('+info.length_days+' Day)');
				$('#notes').html(info.comments);
				$('#leave_status').html(info.my_status);
				$('#leave_created_at').html(moment(info.created_at).utcOffset("+05:30").format('YYYY-MM-DD hh:MM a'));
				var logHtml = '';
				if(logs && logs.length) {
					logHtml = '<table class="table"><tr class="bg-light"><th>Name</th><th>Comments</th><th>Updated at</th></tr>';
					logs.forEach(element => {
						logHtml += '<tr><td>'+element.manager_name+'</td> <td>'+ element.comments+'</td><td>'+ element.action_date + '</td></tr>';
						console.log(element, 'element')
					});
					logHtml += '</table>';
				}
				$('#leave_action_log').html(logHtml);
				
				$('#showLeaveInfo').modal({
					backdrop: 'static',
					keyboard: false
				}); 			
			}					
		});		 
}

</script>