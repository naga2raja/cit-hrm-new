@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<!-- Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Dashboard</li>
														</ol>
														<h4 class="text-dark">{{ @Auth::user()->roles[0]->name }} Dashboard</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="user-card card shadow-sm bg-white text-center ctm-border-radius">
									<div class="user-info card-body">
										<div class="user-avatar mb-4">
											@if($data['my_data']->profile_photo)												
												<img src="{{ assetUrl($data['my_data']->profile_photo) }}" alt="{{ $data['my_data']->first_name }}" class="img-fluid rounded-circle" width="100">
											@else
												<img src="{{ assetUrl('img/profiles/img-1.jpg') }}" alt="User Avatar" class="img-fluid rounded-circle" width="100">
											@endif
										</div>
										<div class="user-details">
											<h4>Welcome</h4>
											<h4><b>@if (!Auth::guest()) {{ Auth::user()->name }} @endif</b></h4>
											<p>{{ date('D, d M Y') }}</p>
										</div>
									</div>
								</div>
								<!-- <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center active button-5"><a href="javascript:void(0)" class="text-white">{{ @Auth::user()->roles[0]->name }} Dashboard</a></li>
										</ul>
									</div>
								</div> -->
								<!-- <div class="card shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Attendance</h4>
										<a href="leave" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
									</div>
									<div class="card-body text-center">
										@if($leavesInfo = currentUserLeaveBalance())
											@foreach ($leavesInfo as $leave)
												<div class="time-list">
													<div class="dash-stats-list">
														<p class="mb-0">Taken</p>
														<span class="btn btn-outline-primary"> {{ $leave->days_used }} Days</span>
													</div>
													<div class="dash-stats-list">
														<p class="mb-0">Remaining</p>
														<span class="btn btn-outline-primary">{{ $leave->remaining_days }} Days</span>
													</div>
												</div>
												@if (!$loop->last) <hr> @endif
												
											@endforeach
										@endif
									</div>
								</div> -->

								<div class="card shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Leave</h4>
										<a href="leave" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
									</div>
									<div class="card-body text-center">
										@php 
											$leavesInfo = currentUserLeaveBalance();
										@endphp
										@if(count($leavesInfo) > 0)
											@foreach ($leavesInfo as $leave)
												<span class="mt-0 mb-0">{{ $leave->name }}</span>
												<div class="time-list">
													<div class="dash-stats-list">
														<p class="mb-0">Taken</p>
														<span class="btn btn-outline-primary"> {{ $leave->days_used }} Days</span>
													</div>
													<div class="dash-stats-list">
														<p class="mb-0">Remaining</p>
														<span class="btn btn-outline-primary">{{ $leave->remaining_days }} Days</span>
													</div>
												</div>
												@if (!$loop->last) <hr> @endif												
											@endforeach
										@else
											<div>No Leaves</div>
										@endif
									</div>
								</div>
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8 col-md-12">
						
							<!-- Widget -->
							<div class="row">
								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="card dash-widget ctm-border-radius shadow-sm">
										<div class="card-body">
											<div class="card-icon bg-primary">
												<i class="fa fa-users" aria-hidden="true"></i>
											</div>
											<div class="card-right">
												<a href="{{ route('employees.index') }}">
													<h4 class="card-title">Employees</h4>
													<p class="card-text">{{ $data['employees_count'] }}</p>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
									<div class="card dash-widget ctm-border-radius shadow-sm">
										<div class="card-body">
											<div class="card-icon bg-warning">
												<i class="fa fa-building-o"></i>
											</div>
											<div class="card-right">
												<a href="{{ route('company.index') }}">
													<h4 class="card-title">Companies</h4>
													<p class="card-text">{{ $data['company_count'] }}</p>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
									<div class="card dash-widget ctm-border-radius shadow-sm">
										<div class="card-body">
											<div class="card-icon bg-danger">
												<i class="fa fa-suitcase" aria-hidden="true"></i>
											</div>
											<div class="card-right">
												<a href="{{ route('leave.list') }}">
													<h4 class="card-title">Pending Leaves</h4>
													<p class="card-text">{{ $data['leave_count'] }}</p>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
									<div class="card dash-widget ctm-border-radius shadow-sm">
										<div class="card-body">
											<div class="card-icon bg-success">
												<i class="fa fa-money" aria-hidden="true"></i>
											</div>
											<div class="card-right">
												<h4 class="card-title">Salary</h4>
												<p class="card-text">$5.8M</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- / Widget -->
							
							<!-- Chart -->
							<div class="row">
								<div class="col-xl-6 col-lg-12 col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">Total Employees</h4>
											<a href="javascript:void(0)" id="refresh_total_employee" class="d-inline-block float-right text-primary" title="Refresh"><i class="lnr lnr-sync"></i></a>
										</div>
										<div class="card-body">
											<figure class="highcharts-figure">
											    <div id="employees_chart"></div>
											</figure>
											<!-- <canvas id="pieChart"></canvas> -->
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-12 col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">Pending Requests</h4>
											<a href="javascript:void(0)" id="refresh_pending_requests" class="d-inline-block float-right text-primary" title="Refresh"><i class="lnr lnr-sync"></i></a>
										</div>
										<div class="card-body">
											<figure class="highcharts-figure">
											    <div id="pending_request_chart"></div>
											</figure>
											<!-- <canvas id="lineChart"></canvas> -->
										</div>
									</div>
								</div>
							</div>
							<!-- / Chart -->
							
							<div class="row">
								<div class="col-xl-6 col-lg-12 d-flex">
									<div class="card shadow-sm flex-fill">
										<div class="card-header align-items-center">
											<h4 class="card-title mb-0 d-inline-block">News</h4>
											<a href="javascript:void(0)" id="refresh_today_news" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
										</div>
										<div class="card-body recent-activ">
											<div class="recent-comment" id="today_news">
											</div>
										</div>
									</div>
								</div>

								<div class="col-xl-6 col-lg-12 col-md-12 d-flex">
									<!-- Team Leads List -->
									<div class="card flex-fill team-lead shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">
											@hasrole('Admin')
												Team Leads
											@endrole
											@hasrole('Manager')
												Team Info
											@endrole
											</h4>
											<!-- <a href="{{ route('projects.index') }}" class="dash-card float-right mb-0 text-primary">Manage Team </a> -->
											<a href="javascript:void(0)" id="refresh_team_leads" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
										</div>
										<div class="card-body" id="team_leads">
										</div>
									</div>
								</div>
								
								<div class="col-lg-6 col-md-12 d-flex">								
									<!-- Recent Activities -->
									<div class="card recent-acti flex-fill shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">Recent Activities</h4>
											<a href="javascript:void(0)" id="refresh_recent_activities" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
										</div>
										<div class="card-body recent-activ">
											<div class="recent-comment" id="recent_activity">
											</div>
										</div>
									</div>
								</div>
								<!-- / Recent Activities -->
								
								<div class="col-lg-6 col-md-12 d-flex">
								
									<!-- Today -->
									<div class="card flex-fill today-list shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">My Upcoming Leave</h4>
											<a href="javascript:void(0)" id="refresh_upcoming_leave" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
										</div>
										<div class="card-body recent-activ">
											<div class="recent-comment" id="upcoming_leaves">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>

		<!--  Validation Modal -->
		<div class="modal fade" id="details_news">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">		
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title mb-3"></h5><hr>
						<p class="modal-message"></p>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3 mt-4" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
@endsection

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

@push('scripts')
<script type="text/javascript">

	function getImagePath(img) {
    	var profile_image = '{{ assetUrl(":id") }}';
    	return profile_image.replace(':id', img);
	}

	function news_popup(title, details){
		$('#details_news').modal('toggle');
		$('.modal-title').html(title);
		$('.modal-message').html(details);
	}

	function getHoursDiff(created_at){
		var currentdate = new Date(); 
		var rightNow = moment(currentdate).utcOffset(0).format('YYYY-MM-DD HH:mm:ss');
		var updatedDate = moment(created_at).utcOffset(0).format("YYYY-MM-DD HH:mm:ss");
		// console.log("created", created_at);
		console.log(rightNow+" - "+updatedDate);

		var diff = moment(rightNow).diff(updatedDate, 'minutes');
		var mins = diff%60; // to get minutes
		var hours = (diff - mins)/60; // to get hours
		var day = Math.floor(hours / 24);
		// console.log("days: ", day);

		var time = '';
		if(day != 0){
			time = day+' days ';
		}
		else if(hours != 0){
			time = hours+' hours ';
		}
		else if(mins != 0){
			time = mins +' mins';
		}
        return time;
	}

	// TodayNews data
	function LoadTodayNews(){
		$.ajax({
			method: 'GET',
			url: "{{ route('getTodayNews-ajax') }}",
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				// console.log('TodayNews : ', data);
				var news = '';
				if((data[0].birthday.length > 0)||(data[0].news.length > 0)){
					data[0].birthday.forEach(function (row,index) {
						news += '<div class="notice-board mb-3">';
						news += '<div class="table-img">';
						var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						news += '<div class="e-avatar mr-3"><img class="img-fluid" src='+getImagePath(profile)+' alt="Photo"></div>';
						news += '</div>';
						news += '<div class="notice-body">';
						news += '<h6 class="mb-0">Today '+row.employee_name+' Birthday</h6>';						
						news += '</div>';
						news += '<div class="dash-card-avatars">';
						news += '<div class="dash-card-icon text-warning"><i class="fa fa-birthday-cake" aria-hidden="true"></i></div>';
						news += '</div>';
						news += '</div><hr>';
					});
		            data[0].news.forEach(function (row,news_index) {
		            	news += '<a href="javascript:void(0)" id="'+row.title+'" title="'+row.news+'" onclick="news_popup(this.id, this.title)" class="text-dark">';
		            	news += '<div class="notice-board mb-3">';
						news += '<div class="table-img">';
						var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						news += '<div class="e-avatar mr-3"><img class="img-fluid" src='+getImagePath(profile)+' alt="Photo"></div>';
						news += '</div>';
						news += '<div class="notice-body">';
						news += '<h6 class="mb-0">'+row.title+'</h6>';
						var hours = getHoursDiff(row.created_at);
						var diff = (hours) ? hours+" ago" : "Just Now";
						news += '<span class="ctm-text-sm">' +row.employee_name+ ' | ' +diff+ '</span>';
						news += '</div>';
						news += '<div class="dash-card-avatars">';
						var category = ''; style = '';
						if(row.category == 'Information'){
							category = "fa fa-info-circle"; style = "text-primary";
						}
						if(row.category == 'Important'){
							category = 'fa fa-exclamation'; style = "text-danger";
						}
						news += '<div class="dash-card-icon '+style+'"><i class="'+category+'" aria-hidden="true"></i></div>';
						news += '</div>';
						news += '</div></a>';
						if (news_index != data[0].news.length - 1) {
							news += '<hr>';
						}
		        	});
		        }else{
		        	news += '<div class="notice-board">';
					news += '<h6 class="mb-0 ctm-text-sm">No News</h6>';
		        	news += '</div>';
		        }
		        $('#today_news').html(news);
			}
		});
	}

	// Team Leads data
	function LoadTeamLeads(){
		$.ajax({
			method: 'GET',
			url: "{{ route('getTeamLeads-ajax') }}",
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				console.log('LoadTeamLeads : ', data);
				var leads = '';
		  		if((data[0].reporting_manager.length > 0)||(data[0].reporting_employee.length > 0)||(data[0].project_admin.length > 0)||(data[0].project_manager.length > 0)||(data[0].team_member.length > 0)){
		        	// console.log('reporting_manager : ', data[0].reporting_manager.length);
		            data[0].reporting_manager.forEach(function (row,index) {
		            	var designation = row.designation; var project_name = '';
		            	data[0].project_admin.forEach(function (admin_row,admin_index) {
		            		if(admin_row.employee_id == row.manager_id){
		            			designation = designation.replace(' | '+ admin_row.designation, "");
		            			designation += ' | '+ admin_row.designation;
		            			if(project_name != ""){
		            				project_name += ', ';
		            			}
		            			project_name = project_name.replace(', '+ admin_row.project_name, "");
		            			project_name += admin_row.project_name;
		            		}
		            	});
		            	data[0].project_manager.forEach(function (project_row,project_index) {
		            		if(project_row.employee_id == row.manager_id){
		            			designation = designation.replace(' | '+ project_row.designation, "");
		            			designation += ' | '+ project_row.designation;
		            			if(project_name != ""){
		            				project_name += ', ';
		            			}
		            			project_name = project_name.replace(', '+ project_row.project_name, "");
		            			project_name += project_row.project_name;
		            		}
		            	});
		            	leads += '<div class="media mb-3">';
		            	var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						leads += '<div class="e-avatar avatar-online mr-3"><img src='+getImagePath(profile)+' alt="Profile" class="img-fluid"></div>';
						leads += '<div class="media-body">';
						leads += '<h6 class="m-0">' +row.employee_name+ '</h6>';
						var project = (project_name) ? '- <span class="mb-0 ctm-text-sm"> (' +project_name+ ' Project)</span>' : "";
						leads += '<p class="mb-0 ctm-text-sm">' +designation+ ' '+ project +'</p>';
						leads += '</div></div>';
						leads += '<hr>';
		        	});
		        	// project admin
		        	// console.log('project_admin : ', data[0].project_admin.length);
		        	var projectAdminArr = [];
		        	data[0].project_admin.forEach(function (row,index) {
		        		var reporting_remove_id = '';
		        		data[0].reporting_manager.forEach(function (reporting_row,reporting_index) {
		            		if(reporting_row.manager_id == row.employee_id){
		            			reporting_remove_id = row.employee_id;
		            		}
		            	});

		        		var designation = row.designation;  var project_name = row.project_name;
		            	data[0].project_manager.forEach(function (project_row,project_index) {
		            		if(project_row.employee_id == row.employee_id){
		            			designation = designation.replace(' | '+ project_row.designation, "");
		            			designation += ' | '+ project_row.designation;
		            			if(project_row.project_name != row.project_name){
			            			if(project_name != ""){
			            				project_name += ', ';
			            			}
			            			project_name = project_name.replace(', '+ project_row.project_name, "");
			            			project_name += project_row.project_name;
			            		}
		            		}
		            	});

		            	var project_name = row.project_name;
		            	data[0].project_admin.forEach(function (admin_row,admin_index) {
		            		if(admin_row.employee_id == row.employee_id){
		            			if(admin_row.project_name != row.project_name){
			            			if(project_name != ""){
			            				project_name += ', ';
			            			}
			            			project_name = project_name.replace(', '+ admin_row.project_name, "");
			            			project_name += admin_row.project_name;
			            		}
		            		}
		            	});

		            	var exist = 1;
		            	if ($.inArray(row.employee_id, projectAdminArr) != -1){
						   exist = 0;
						}

		            	if(exist && (reporting_remove_id != row.employee_id)){
		            		projectAdminArr.push(row.employee_id);
		            		leads += '<div class="media mb-3">';
			            	var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
							leads += '<div class="e-avatar avatar-online mr-3"><img src=' +getImagePath(profile)+ ' alt="Profile" class="img-fluid"></div>';
							leads += '<div class="media-body">';
							leads += '<h6 class="m-0">' +row.employee_name+ '</h6>';
							var project = (project_name) ? '- <span class="mb-0 ctm-text-sm"> (' +project_name+ ' Project)</span>' : "";
							leads += '<p class="mb-0 ctm-text-sm">' +designation+ ' '+ project +'</p>';
							leads += '</div></div><hr>';
		            	}		            	
		        	});
		        	// project manager
		        	// console.log('project_manager : ', data[0].project_manager.length);
		        	var projectManagerArr = [];
		        	data[0].project_manager.forEach(function (row,index) {
		        		var reporting_remove_id = 0;
		        		var project_remove_id = 0;
		        		data[0].reporting_manager.forEach(function (reporting_row,reporting_index) {
		            		if(reporting_row.manager_id == row.employee_id){
		            			reporting_remove_id = row.employee_id;
		            		}
		            	});
		            	data[0].project_admin.forEach(function (project_row,project_index) {
		            		if(project_row.employee_id == row.employee_id){
		            			project_remove_id = row.employee_id;
		            		}
		            	});

		            	// check for duplicate entry and concate project_name
		            	var project_name = row.project_name;
		            	data[0].project_manager.forEach(function (manager_row,admin_index) {
		            		if(manager_row.employee_id == row.employee_id){
		            			if(manager_row.project_name != row.project_name){
			            			if(project_name != ""){
			            				project_name += ', ';
			            			}
			            			project_name = project_name.replace(', '+ manager_row.project_name, "");
			            			project_name += manager_row.project_name;
			            		}
		            		}
		            	});

		        		var designation = row.designation;
		        		data[0].team_member.forEach(function (team_row,team_index) {
		            		if(team_row.employee_id == row.employee_id){
		            			designation = designation.replace(' | '+ team_row.designation, "");
		            			designation += ' | '+ team_row.designation;
		            			if(project_name != ""){
		            				project_name += ', ';
		            			}
		            			project_name = project_name.replace(', '+ team_row.project_name, "");
		            			project_name += team_row.project_name;
		            		}
		            	});

		            	var exist = 1;
		            	if ($.inArray(row.employee_id, projectManagerArr) != -1){
						   exist = 0;
						}
		            	if(exist && (reporting_remove_id != row.employee_id)&&(project_remove_id != row.employee_id)){
		            		projectManagerArr.push(row.employee_id);
			            	leads += '<div class="media mb-3">';
			            	var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
							leads += '<div class="e-avatar avatar-online mr-3"><img src=' +getImagePath(profile)+ ' alt="Profile" class="img-fluid"></div>';
							leads += '<div class="media-body">';
							leads += '<h6 class="m-0">' +row.employee_name+ '</h6>';
							var project = (project_name) ? '- <span class="mb-0 ctm-text-sm"> (' +project_name+ ' Project)</span>' : "";
							leads += '<p class="mb-0 ctm-text-sm"> ' +designation+ ' '+ project +'</p>';
							leads += '</div></div><hr>';
						}
		        	});
		        	// reporting employee
		        	// console.log('reporting_employee : ', data[0].reporting_employee.length);
		        	data[0].reporting_employee.forEach(function (row,index) {
		            	var designation = row.designation;
		            	data[0].team_member.forEach(function (team_row,team_index) {
		            		if(team_row.employee_id == row.employee_id){
		            			var project = (team_row.project_name) ? '- <span class="mb-0 ctm-text-sm"> (' +team_row.project_name+ ' Project)</span>' : "";
		            			designation = designation.replace(' | '+ team_row.designation, "");
		            			designation += ' | '+ team_row.designation+ ' '+ project;
		            		}
		            	});		            	

		            	leads += '<div class="media mb-3">';
		            	var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						leads += '<div class="e-avatar avatar-online mr-3"><img src=' +getImagePath(profile)+ ' alt="Profile" class="img-fluid"></div>';
						leads += '<div class="media-body">';
						leads += '<h6 class="m-0">' +row.employee_name+ '</h6>';
						leads += '<p class="mb-0 ctm-text-sm">' +designation+ '</p>';
						leads += '</div></div>';
						leads += '<hr>';
		        	});
		        	// Team Member
		        	// console.log('team_member : ', data[0].team_member.length);
		        	var teamMemberArr = [];
		        	data[0].team_member.forEach(function (row,index) {
		        		var manager_remove_id = 0;
		            	data[0].project_manager.forEach(function (manager_row,manager_index) {
		            		if(manager_row.employee_id == row.employee_id){
		            			manager_remove_id = row.employee_id;
		            		}
		            	});

		        		var employee_remove_id = 0;
		            	data[0].reporting_employee.forEach(function (employee_row,employee_index) {
		            		if(employee_row.employee_id == row.employee_id){
		            			employee_remove_id = row.employee_id;
		            		}
		            	});

		            	var project_name = row.project_name;
		            	data[0].team_member.forEach(function (member_row,member_index) {
		            		if(member_row.employee_id == row.employee_id){
		            			if(member_row.project_name != row.project_name){
			            			if(project_name != ""){
			            				project_name += ', ';
			            			}
			            			project_name = project_name.replace(', '+ member_row.project_name, "");
			            			project_name += member_row.project_name;
			            		}
		            		}
		            	});

		            	var exist = 1;
		            	if ($.inArray(row.employee_id, teamMemberArr) != -1){
						   exist = 0;
						}

		            	if(exist&&(manager_remove_id != row.employee_id)&&(employee_remove_id != row.employee_id)){
		            		teamMemberArr.push(row.employee_id);
			            	leads += '<div class="media mb-3 cit_employee_'+row.employee_id+'">';
			            	var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
							leads += '<div class="e-avatar avatar-online mr-3"><img src=' +getImagePath(profile)+ ' alt="Profile" class="img-fluid"></div>';
							leads += '<div class="media-body">';
							leads += '<h6 class="m-0">' +row.employee_name+ '</h6>';
							var project = (project_name) ? '- <span class="mb-0 ctm-text-sm"> (' +project_name+ ' Project)</span>' : "";
							leads += '<p class="mb-0 ctm-text-sm"> ' +row.designation+ ' '+ project +'</p>';
							leads += '</div></div>';
							if (index != data[0].team_member.length - 1) {
								leads += '<hr>';
							}
						}
		        	});
		        }
		        else{
		        	leads += '<div class="media mb-3">';
		        	leads += '<h6 class="m-0 ctm-text-sm">No Team Data</h6>';
		        	leads += '</div>';
		        }
		        $('#team_leads').html(leads);
			}
		});
	}

	// recent activities data
	function LoadRecentActivities(){
		$.ajax({
			method: 'GET',
			url: "{{ route('getRecentActivities-ajax') }}",
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				// console.log('LoadRecentActivities : ', data);
				var activity = '';
				if(data.length > 0){
					data.forEach(function (row,index) {
						activity += '<div class="notice-board">';
						activity += '<div class="table-img">';
						var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						activity += '<div class="e-avatar mr-3"><img class="img-fluid" src='+getImagePath(profile)+' alt="Photo"></div>';
						activity += '</div>';
						activity += '<div class="notice-body">';

						var dateArr = row.date.split(',');
						var date = '';
						if(dateArr && dateArr[0]){
							date += moment(dateArr[0]).format("DD/MM/YYYY");
						}
						if(dateArr && dateArr[1]){
							date += '-'+moment(dateArr[1]).format("DD/MM/YYYY");
						}

						if(row.type == "My Activities"){
							var emp_id = "{{ getEmployeeId(Auth::user()->id) }}";
							if(row.send_to == emp_id){
								activity += '<h6 class="mb-0">Your '+row.module+' '+row.action+' ('+date+')</h6>';
							}else{
								activity += '<h6 class="mb-0">You '+row.action+' '+row.reciever_name+ ' '+row.module+' ('+date+')</h6>';
							}
						}

						if(row.type == "Others Activities"){
							if(row.action == "Submitted"){
								activity += '<h6 class="mb-0">' +row.employee_name+ ' Sent '+row.module+' ('+date+') to Approval </h6>';
							}else{
								activity += '<h6 class="mb-0">' +row.employee_name+ ' '+row.action+' '+row.module+' ('+date+')</h6>';
							}
						}
						
						var hours = getHoursDiff(row.created_at);
						var diff = (hours) ? hours+" ago" : "Just Now";
						activity += '<span class="ctm-text-sm"> ' +row.role_name+ ' | '+diff+'</span>';
						activity += '</div>';
						activity += '</div>';
						if (index != data.length - 1) {
							activity += '<hr>';
						}
		        	});	
		        }else{
		        	activity += '<div class="notice-board">';
					activity += '<h6 class="mb-0 ctm-text-sm">No Activities</h6>';
		        	activity += '</div>';
		        }
		        $('#recent_activity').html(activity);
			}
		});
	}

	// upcoming leave data
	function LoadUpcomingLeave(){
		$.ajax({
			method: 'GET',
			url: "{{ route('getUpcomingLeaves-ajax') }}",
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				// console.log('LoadUpcomingLeave : ', data);
				var leaves = '';
				if(data.length > 0){
		            data.forEach(function (row,index) {
		            	if(row.status == '5'){
							var class_name = "danger"; var status = "Cancelled";
		            	}else if(row.status == '4'){
							var class_name = "danger"; var status = "Rejected";
						}else if(row.status == '2'){
							var class_name = "success"; var status = "Approved";
						}else if(row.status == '1'){
							var class_name = "warning"; var status = "Pending";
						}

		            	leaves += '<div class="notice-board">';
		            	leaves += '<div class="dash-card-icon text-'+class_name+'">';
						leaves += '<i class="fa fa-suitcase"></i></div>';
						leaves += '<div class="notice-body">';
						leaves += '<h6 class="mb-0">';
						leaves += row.date;
						leaves += '<span class="ctm-text-sm"> ('+ row.name+ ')</span>';
						leaves += '</h6>';
						leaves += '<span class="ctm-text-sm">';
						leaves += row.leave_duration.charAt(0).toUpperCase() + row.leave_duration.slice(1)+' | '+status+'</span>';
						leaves += '</div></div>';
						if (index != data.length - 1) {
							leaves += '<hr>';
						}
		        	});	            
		        }else{
		        	leaves += '<div class="notice-board">';
					leaves += '<h6 class="mb-0 ctm-text-sm">No Upcoming Leave</h6>';
		        	leaves += '</div>';
		        }
		        $('#upcoming_leaves').html(leaves);
			}
		});
	}

	// onclick of refresh_total_employee
	$('#refresh_total_employee').click(function() {
	   	LoadEmployeeChart();
	});
	// onclick of refresh_pending_requests
	$('#refresh_pending_requests').click(function() {
	   	LoadRequestChart();
	});
	
	// onclick of refresh_today_news
	$('#refresh_today_news').click(function() {
	   	LoadTodayNews();
	});
	// onclick of refresh_team_leads
	$('#refresh_team_leads').click(function() {
	   	LoadTeamLeads();
	});
	// onclick of refresh_recent_activities
	$('#refresh_recent_activities').click(function() {
	   	LoadRecentActivities();
	});
	// onclick of refresh_upcoming_leave
	$('#refresh_upcoming_leave').click(function() {
	   	LoadUpcomingLeave();
	});

	window.onload = function() {
		// to load Today News data
		LoadTodayNews();
		// to load Team Leads data
	   	LoadTeamLeads();
	   	// to load Recent Activities data
	   	LoadRecentActivities();
		// to load Upcoming leave data
	   	LoadUpcomingLeave();
	}

	// chart
	// Total no. of Employees
	LoadEmployeeChart();
	function LoadEmployeeChart(){
		$.ajax({
			method: 'GET',
			url: "{{ route('getEmployeeChart-ajax') }}",
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				var leaves = '';
				var labels = '';
				var labels_Data = [];
				var count = 0;
				var count_Data = [];
				if(data.length > 0){
				console.log('chartData : ', data);

					// Make monochrome colors
					var pieColors = (function () {
					    var colors = [],
					        base = Highcharts.getOptions().colors[0],
					        i;

					    for (i = 0; i < 10; i += 1) {
					        // Start out with a darkened base color (negative brighten), and end
					        // up with a much brighter color
					        colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
					    }
					    return colors;
					}());

		        	// Pie Chart	
					Highcharts.chart('employees_chart', {
					    chart: {
					        plotBackgroundColor: null,
					        plotBorderWidth: null,
					        plotShadow: false,
					        type: 'pie'
					    },
					    title: {
					        text: 'Total Employees'
					    },
					    subtitle: {
					        text: 'Based on Job Title'
					    },
					    tooltip: {
					        pointFormat: '{series.name}: <b>{point.y}</b>'
					    },
					    accessibility: {
					        point: {
					            valueSuffix: ''
					        }
					    },
					    plotOptions: {
					        pie: {
					            allowPointSelect: true,
					            cursor: 'pointer',
					            dataLabels: {
					                enabled: true,
					                format: '{point.percentage:.1f} %',
					                distance: 13,
					            },
					            showInLegend: true
					        }
					    },
					    series: [{
					        name: 'No. of Employee',
					        colorByPoint: true,
					        data:  data
					    }]
					});

					// to remove the watermark
					$('.highcharts-credits').html('');

		        }
			}
		});
	}

	// no. of Requests
	LoadRequestChart();
	function LoadRequestChart(){
		$.ajax({
			method: 'GET',
			url: "{{ route('getRequestChart-ajax') }}",
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				var role = '';
				var leave = 0;
				var attendance = 0;
				var timesheet = 0;
				console.log('bar chartData : ', data.leave);
				if(data.role){
					role = data.role;
		        }
				if(data.leave){
					leave = data.leave;
		        }
		        if(data.attendance){
					attendance = data.attendance;
		        }
		        if(data.timesheet){
					timesheet = data.timesheet;
		        }

	        	// bar Chart
	        	var color = {
				    Leave: 'rgb(124,181,236)',
				  	Attendance: 'rgb(67,67,72)',
				  	Timesheet: 'rgb(144,237,125)'
				}

	        	Highcharts.chart('pending_request_chart', {
				    chart: {
				        type: 'column'
				    },
				    title: {
				        text: 'Pending Approval Requests'
				    },
				    subtitle: {
				        text: 'From: '+ role
				    },
				    xAxis: {
				        categories: ['Leave', 'Attendance', 'Timesheet'],
				        crosshair: true,
				        title: {
				            // text: 'Request Type',
				            // style: { fontWeight: 'bold'}
				        },
				        labels: {
				        	formatter: function() {
								return '<a id='+this.value+'>' + this.value +'</a>';
							}
					      // formatter () {
					      // 	return `<span style="color: ${color[this.value]}">${this.value}</span>`
					      // }
					    }
				    },
				    yAxis: {
				        min: 0,
				        title: {
				            text: 'No. of Requests',
				            style: { fontWeight: 'bold'}
				        }
				    },
				    legend: {
				    	enabled: false
				    },
				    tooltip: {
				        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				            '<td style="padding:0">{point.y} Pending</td></tr>',
				        footerFormat: '</table>',
				        shared: true,
				        useHTML: false
				    },
				    plotOptions: {
				        series: {
				            dataLabels: {
				                enabled: true,
				                style: {
				                    fontWeight: 'bold'
				                }
				            }
				        },
				        column: {
				            pointPadding: 0.3,
				            borderWidth: 0
				        }
				    },
				    series: [{
				        name: '',
				        colorByPoint: true,
				        data: [leave, attendance, timesheet]

				    }]
				});

				// set link to the xAxis categories // $("#Leave").attr("href", "leave-list");
				var link1 = document.getElementById("Leave");
			    link1.setAttribute('href', "leave-list");

			    var link2 = document.getElementById("Attendance");
			    link2.setAttribute('href', "employee-records");

				var link3 = document.getElementById("Timesheet");
			    link3.setAttribute('href', "timesheets");

				// to remove the watermark
				$('.highcharts-credits').html('');
			}
		});
	}
</script>
@endpush