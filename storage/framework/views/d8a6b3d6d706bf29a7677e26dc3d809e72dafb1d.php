<!-- jQuery -->
<script src="js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<!-- Datatables JS -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/datatables.min.js"></script>
		<!-- Form Validation JS -->
        <script src="js/form-validation.js"></script>
		<!-- Mask JS -->
		<script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/mask.js"></script>
		<!-- Select2 JS -->
		<script src="js/select2.min.js"></script>
		<?php if(Route::is(['maps-vector'])): ?>
		<script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-ru-mill.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-uk_countries-mill.js"></script>        
        <script src="plugins/jvectormap/jquery-jvectormap-in-mill.js"></script>
        <script src="js/jvectormap.js"></script>
        <?php endif; ?>
		<!-- Datetimepicker JS -->
		<script src="js/moment.min.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Full Calendar JS -->
        <script src="js/jquery-ui.min.js"></script>
        <script src="plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="plugins/fullcalendar/jquery.fullcalendar.js"></script>
		<!-- Light Gallery JS -->
		<script src="plugins/light-gallery/js/lightgallery-all.min.js"></script>
		<?php if(!Route::is(['blank-page','calendar','chat','components','data-tables','error-404','error-500','forgot-password','form-basic-inputs','form-horizontal','form-input-groups','form-mask','form-validation','form-vertical','inbox','invoice','lock-screen','login','mail-view','maps-vector','orders','product-details','products','profile','register','tables-basic','users'])): ?>
		<script src="plugins/raphael/raphael.min.js"></script>    
		<script src="plugins/morris/morris.min.js"></script>  
		<script src="js/chart.morris.js"></script>
		<?php endif; ?>
		<!-- Custom JS -->
		<script  src="js/script.js"></script>
		<!-- Chat JS -->
		<script>
			const chatAppTarget = $('.chat-window');
			(function() {
				if ($(window).width() > 991)
					chatAppTarget.removeClass('chat-slide');
				
				$(document).on("click",".chat-window .chat-users-list a.media",function () {
					if ($(window).width() <= 991) {
						chatAppTarget.addClass('chat-slide');
					}
					return false;
				});
				$(document).on("click","#back_user_list",function () {
					if ($(window).width() <= 991) {
						chatAppTarget.removeClass('chat-slide');
					}	
					return false;
				});

			})();
		</script><?php /**PATH C:\xampp\htdocs\ventura_landing\template\resources\views/layout/partials/footer-scripts.blade.php ENDPATH**/ ?>