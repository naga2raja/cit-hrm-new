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
											<div id="notes" style="word-break: break-all;"></div>
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
		@endif
		<!-- Custom Js -->
		<script src="{{ assetUrl('js/script.js') }}"></script>
		<script>
		$(function () {
    $('.selectpicker').selectpicker();
});

function showLeaveInfo(id, url = false) {
	var ajaxUrl;
	if(url) {
		ajaxUrl = url;
	} else {
		ajaxUrl = '/leave/'+ id;
	}

	$.ajax({
			method: 'GET',
			url: ajaxUrl,			
			dataType: "json",
			contentType: 'application/json',
			success: function(response){				
				var info = response.info;
				var logs = response.comments;
				console.log('response : ', response, info.emp_name);
				$('#employee_name').html(": "+info.emp_name);
				$('#leave_type').html(": "+info.name);
				$('#from_to_date').html(": "+info.from_date +' - '+ info.to_date + ' ('+info.length_days+' Day)');
				$('#notes').html(": "+info.comments);
				$('#leave_status').html(": "+info.my_status);
				$('#leave_created_at').html(": "+moment(info.created_at).utcOffset("+05:30").format('YYYY-MM-DD hh:MM a'));
				var logHtml = '';
				if(logs && logs.length) {
					logHtml = '<table class="table"><tr class="bg-light"><th>Name</th><th>Comments</th><th>Updated at</th></tr>';
					logs.forEach(element => {
						logHtml += '<tr><td>'+element.manager_name+'</td> <td>'+ element.comments+'</td><td>'+ element.action_date + '</td></tr>';
						// console.log(element, 'element')
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

(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));
//https://jsfiddle.net/emkey08/tvx5e7q3
function allowOnlyNumbers(id) {
	$("#"+id).inputFilter(function(value) {
 	return /^-?\d*$/.test(value); });
}

$('.numberonly').keypress(function (e) {    
    
	var charCode = (e.which) ? e.which : event.keyCode    

	if (String.fromCharCode(charCode).match(/[^0-9]/g))    

		return false;                        

}); 

function allowOnlyCharacters(id) {
	$("#"+id).inputFilter(function(value) {
  	return /^[a-z]*$/i.test(value); });
}

function allowCharactersWithSpace(id) {
	$("#"+id).inputFilter(function(value) {
		return /^[a-z ]*$/i.test(value);
	});
}

function allowCharacterNumbersWithSpace(id) {
	$("#"+id).inputFilter(function(value) {
		return /^[0-9a-z ]*$/i.test(value);
	});
}

function allowCharactersAndNumbers(id) {
	$("#"+id).inputFilter(function(value) {
		return /^[0-9a-z]*$/i.test(value);
	});
}

function allowPriceFormat(id) {
	$("#"+id).inputFilter(function(value) {
  	return /^\d*[.]?\d{0,2}$/.test(value); });
}

$('#cithrm_mobile_menu a.nav-link.dropdown-toggle').click(function() {	
	$(this).addClass('cit_active');
	$(this).next().addClass('cithrm_dropdown-menu');
	$(this).next().removeClass('dropdown-menu');
})
$('#cithrm_mobile_menu a.dropdown-item.dropdown-toggle').click(function() {	
	// $('.dropdown-menu.cit_active, .cit_active .dropdown-menu').hide();
	console.log('submenu');
	$(this).addClass('cit_submenu_active');
	$(this).next().addClass('cithrm_submenu_dropdown-menu');
	$(this).next().removeClass('dropdown-toggle');
})
function getCookie(name) {
    function escape(s) { return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1'); }
    var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
    return match ? match[1] : null;
}

 if (navigator.cookieEnabled) {
   document.cookie = "tz_client="+ Intl.DateTimeFormat().resolvedOptions().timeZone + "; path=/"; //(- new Date().getTimezoneOffset());
   var offset = new Date().getTimezoneOffset();   
   document.cookie = "tz_offset_client="+ (-offset) + "; path=/";
   document.cookie = "tz_offset_formatted="+ -(offset / 60) + "; path=/";   
 }

 function sorting(col, form_id = false) {
	$('#sort_field').val(col);
	//var sort_field =  
	var sort_by = $('#sort_by').val();
	if(sort_by=='' || sort_by=='desc') {
		sort_by = 'asc';
	} else {
		sort_by = 'desc';
	}
	$('#sort_by').val(sort_by);
	if(form_id) {
		$('#'+form_id).submit();
	} else {
		$('#filter_form').submit();
	}
	
}

function openProfileImageModal() {
	$('#upload_user_profile_image').hide();
	$('#profile_image').modal('show');
}

function editProfileImage() {
	//$('#preview_user_profile_image').hide();
	$('#upload_user_profile_image').show();
}
setTimeout(function() {
    $('.profile_img_success').remove();
}, 4000); 
</script>