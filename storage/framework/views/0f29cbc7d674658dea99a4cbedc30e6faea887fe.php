<!-- jQuery -->
<script src="<?php echo e(assetUrl('js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(assetUrl('js/jquery-1.11.1.min.js')); ?>"></script>
		<!-- Bootstrap Core JS -->
		<script src="<?php echo e(assetUrl('js/popper.min.js')); ?>"></script>
		<script src="<?php echo e(assetUrl('js/bootstrap.min.js')); ?>"></script>
		<!-- <script src="<?php echo e(assetUrl('js/bootstrap-select.min.js')); ?>"></script> -->
		<!-- Sticky sidebar JS -->
		<script src="<?php echo e(assetUrl('plugins/theia-sticky-sidebar/ResizeSensor.js')); ?>"></script>		
		<script src="<?php echo e(assetUrl('plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')); ?>"></script>		
		<!-- Datetimepicker JS -->
		<script src="<?php echo e(assetUrl('plugins/select2/moment.min.js')); ?>"></script>
		<script src="<?php echo e(assetUrl('js/bootstrap-datetimepicker.min.js')); ?>"></script>
		<!-- Select2 JS -->
		<script src="<?php echo e(assetUrl('plugins/select2/select2.min.js')); ?>"></script>
		<!-- Tagsinput JS -->
		<script src="<?php echo e(assetUrl('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')); ?>"></script>
		<!-- Full Calendar JS -->
        <script src="<?php echo e(assetUrl('js/jquery-ui.min.js')); ?>"></script>
        <script src="<?php echo e(assetUrl('plugins/fullcalendar/fullcalendar.min.js')); ?>"></script>
        <script src="<?php echo e(assetUrl('plugins/fullcalendar/jquery.fullcalendar.js')); ?>"></script>	
		<?php if(!Route::is(['add-employee','admin','calendar','company','contact-reports','create-review','custom-timeoff-approver','details','documents','edit-review','email-reports','employees-dashboard','employees-list','employees-offices-list','employees-offices','employees-team','employees','employment','forgot-password','leave-reports','leave','line-manager','login','manage-leadership','manage','payroll-admin','payroll-reports','payroll','profile-reviews','profile-settings','register','reports','reviews','security-reports','settings-timeoff','settings','super-admin','team-lead','team-member','time-off','work-from-home-reports'])): ?>	
		<!-- Chart JS -->
		<script src="<?php echo e(assetUrl('js/Chart.min.js')); ?>"></script>
		<script src="<?php echo e(assetUrl('js/chart.js')); ?>"></script>
		<?php endif; ?>
		<!-- Custom Js -->
		<script src="<?php echo e(assetUrl('js/script.js')); ?>"></script>
		<script>
		$(function () {
    $('.selectpicker').selectpicker();
});
</script><?php /**PATH D:\xampp\htdocs\cithrm-new\resources\views/layout/partials/footer-scripts.blade.php ENDPATH**/ ?>