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
		@if(!Route::is(['add-employee','admin','calendar','company','contact-reports','create-review','custom-timeoff-approver','details','documents','edit-review','email-reports','employees-dashboard','employees-list','employees-offices-list','employees-offices','employees-team','employees','employment','forgot-password','leave-reports','leave','line-manager','login','manage-leadership','manage','payroll-admin','payroll-reports','payroll','profile-reviews','profile-settings','register','reports','reviews','security-reports','settings-timeoff','settings','super-admin','team-lead','team-member','time-off','work-from-home-reports']))	
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
</script>