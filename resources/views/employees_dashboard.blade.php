@extends('layout.mainlayout')
@section('content')
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
														<h4 class="text-dark">Employees Dashboard</h4>
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
												<img src="{{ $data['my_data']->profile_photo }}" alt="{{ $data['my_data']->first_name }}" class="img-fluid rounded-circle" width="100">
											@else
												<img src="{{ assetUrl('img/profiles/profile.jpg') }}" alt="User Avatar" class="img-fluid rounded-circle" width="100">
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
											<li class="list-group-item text-center active button-5"><a class="text-white" href="javascript:void(0)">Employees Dashboard</a></li>
										</ul>
									</div>
								</div> -->								
								<div class="card shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Leave</h4>
										<a href="leave" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
									</div>
									<div class="card-body text-center">
										@if($leavesInfo = currentUserLeaveBalance())
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
										@endif
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8  col-md-12">
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
								<div class="col-xl-6 col-lg-12 d-flex">
								
									<!-- Team Leads List -->
									<div class="card flex-fill team-lead shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">Team Info </h4>
											<a href="javascript:void(0)" id="refresh_team_leads" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
										</div>
										<div class="card-body" id="team_leads">
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-12 d-flex">
								
									<!-- Recent Activities -->
									<div class="card recent-acti flex-fill shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">Recent Activities</h4>
											<a href="javascript:void(0)" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
										</div>
										<div class="card-body recent-activ admin-activ">
											<div class="recent-comment" id="recent_activity">
												<div class="notice-board">
													<div class="table-img">
														<div class="e-avatar mr-3"><img class="img-fluid" src="img/profiles/img-6.jpg" alt="Maria Cotton"></div>
													</div>
													<div class="notice-body">
														<h6 class="mb-0">Lorem Ipsum dolor sit Amet.</h6>
														<span class="ctm-text-sm">Maria Cotton | 1 hour ago</span>
													</div>
												</div>
												<hr>
												<div class="notice-board">
													<div class="table-img">
														<div class="e-avatar mr-3"><img class="img-fluid" src="img/profiles/img-6.jpg" alt="Maria Cotton"></div>
													</div>
													<div class="notice-body">
														<h6 class="mb-0">Lorem Ipsum dolor sit Amet.</h6>
														<span class="ctm-text-sm">Maria Cotton | 2 hour ago</span>
													</div>
												</div>
												<hr>
												<div class="notice-board">
													<div class="table-img">
														<div class="e-avatar mr-3"><img class="img-fluid" src="img/profiles/img-6.jpg" alt="Maria Cotton"></div>
													</div>
													<div class="notice-body">
														<h6 class="mb-0">Lorem Ipsum dolor sit Amet.</h6>
														<span class="ctm-text-sm">Maria Cotton | 3 hour ago</span>
													</div>
												</div>
												<hr>
												<div class="notice-board">
													<div class="table-img">
														<div class="e-avatar mr-3"><img class="img-fluid" src="img/profiles/img-6.jpg" alt="Maria Cotton"></div>
													</div>
													<div class="notice-body">
														<h6 class="mb-0">Lorem Ipsum dolor sit Amet.</h6>
														<span class="ctm-text-sm">Maria Cotton | 4 hour ago</span>
													</div>
												</div>
												<hr>
												<div class="notice-board">
													<div class="table-img">
														<div class="e-avatar mr-3"><img class="img-fluid" src="img/profiles/img-6.jpg" alt="Maria Cotton"></div>
													</div>
													<div class="notice-body">
														<h6 class="mb-0">Lorem Ipsum dolor sit Amet.</h6>
														<span class="ctm-text-sm">Maria Cotton | 5 hour ago</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- / Recent Activities -->
								
								<div class="col-xl-6 col-lg-12 d-flex">
								
									<!-- Today -->
									<div class="card flex-fill today-list shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">Your Upcoming Leave</h4>
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

@push('scripts')
<script type="text/javascript">

	function news_popup(title, details){
		$('#details_news').modal('toggle');
		$('.modal-title').html(title);
		$('.modal-message').html(details);
	}

	function getHoursDiff(created_date){
		var currentdate = new Date(); 
		var rightNow = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
		var createdDate = moment(created_date).format("YYYY-MM-DD HH:mm:ss");

		var diff = moment(rightNow).diff(createdDate, 'minutes');
		var mins = diff%60; // to get minutes
		var hours = (diff - mins)/60; // to get hours

		var time = '';
		if(hours != 0){
			time += hours+' hours ';
		}
		if(mins != 0){
			time += mins +' mins';
		}
        return time;
	}

	// TodayNews data
	function LoadTodayNews(){
		$.ajax({
			method: 'GET',
			url: '/getTodayNews-ajax',
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				// console.log('TodayNews : ', data);
				var news = '';
				if(data.length > 0){
					data[0].birthday.forEach(function (row,index) {
						news += '<div class="notice-board mb-3">';
						news += '<div class="table-img">';
						var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						news += '<div class="e-avatar mr-3"><img class="img-fluid" src='+profile+' alt="Photo"></div>';
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
						news += '<div class="e-avatar mr-3"><img class="img-fluid" src='+profile+' alt="Danny Ward"></div>';
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
						if (news_index !== data[0].news.length - 1) {
							news += '<hr>';
						}
		        	});
		        }else{
		        	news += '<div class="notice-board">';
					news += '<div class="table-img">';
					news += '<div class="e-avatar mr-3"><img class="img-fluid" src="img/profiles/img-5.jpg" alt="Danny Ward"></div>';
					news += '</div>';
					news += '<div class="notice-body">';
					news += '<h6 class="mb-0">No News</h6>';
					news += '</div></div>';
		        }
		        $('#today_news').html(news);
			}
		});
	}

	// Team Leads data
	function LoadTeamLeads(){
		$.ajax({
			method: 'GET',
			url: '/getTeamLeads-ajax',
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				console.log('length : ', data.length);
				var leads = '';
				if(data.length > 0){
		            // console.log('reporting_manager : ', data[0].reporting_manager.length);
		            data[0].reporting_manager.forEach(function (row,index) {
		            	var designation = row.designation;
		            	data[0].project_admin.forEach(function (admin_row,admin_index) {
		            		if(admin_row.employee_id == row.manager_id){
		            			designation += ' | '+ admin_row.designation;
		            		}
		            	});
		            	data[0].project_manager.forEach(function (project_row,project_index) {
		            		if(project_row.employee_id == row.manager_id){
		            			designation += ' | '+ project_row.designation;
		            		}
		            	});
		            	leads += '<div class="media mb-3">';
		            	var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						leads += '<div class="e-avatar avatar-online mr-3"><img src=' +profile+ ' alt="Profile" class="img-fluid"></div>';
						leads += '<div class="media-body">';
						leads += '<h6 class="m-0">' +row.employee_name+ '</h6>';
						var project = (row.project_name) ? '- <span class="mb-0 ctm-text-sm"> (' +row.project_name+ ' Project)</span>' : "";
						leads += '<p class="mb-0 ctm-text-sm">' +designation+ ' '+ project +'</p>';
						leads += '</div></div>';
						leads += '<hr>';
		        	});
		        	// project admin
		        	data[0].project_admin.forEach(function (row,index) {
		        		var reporting_remove_id = '';
		        		data[0].reporting_manager.forEach(function (reporting_row,reporting_index) {
		            		if(reporting_row.manager_id == row.employee_id){
		            			reporting_remove_id = row.employee_id;
		            		}
		            	});

		        		var designation = row.designation;
		            	data[0].project_manager.forEach(function (project_row,project_index) {
		            		if(project_row.employee_id == row.employee_id){
		            			designation += ' | '+ project_row.designation;
		            		}
		            	});
		            	if(reporting_remove_id != row.employee_id){
		            		leads += '<div class="media mb-3">';
			            	var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
							leads += '<div class="e-avatar avatar-online mr-3"><img src=' +profile+ ' alt="Profile" class="img-fluid"></div>';
							leads += '<div class="media-body">';
							leads += '<h6 class="m-0">' +row.employee_name+ '</h6>';
							var project = (row.project_name) ? '- <span class="mb-0 ctm-text-sm"> (' +row.project_name+ ' Project)</span>' : "";
							leads += '<p class="mb-0 ctm-text-sm">' +designation+ ' '+ project +'</p>';
							leads += '</div></div>';
							leads += '<hr>';
		            	}		            	
		        	});
		        	// project manager
		        	data[0].project_manager.forEach(function (row,index) {
		        		var reporting_remove_id = 0;
		        		var project_remove_id = 0;
		        		data[0].reporting_manager.forEach(function (reporting_row,reporting_index) {
		            		if(reporting_row.manager_id == row.employee_id){
		            			reporting_remove_id = row.employee_id;
		            		}
		            	});
		            	data[0].project_manager.forEach(function (project_row,project_index) {
		            		if(project_row.employee_id == row.employee_id){
		            			project_remove_id = row.employee_id;
		            		}
		            	});
		            	if((reporting_remove_id != row.employee_id)&&(project_remove_id != row.employee_id)){
			            	leads += '<div class="media mb-3">';
			            	var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
							leads += '<div class="e-avatar avatar-online mr-3"><img src=' +profile+ ' alt="Profile" class="img-fluid"></div>';
							leads += '<div class="media-body">';
							leads += '<h6 class="m-0">' +row.employee_name+ '</h6>';
							var project = (row.project_name) ? '- <span class="mb-0 ctm-text-sm"> (' +row.project_name+ ' Project)</span>' : "";
							leads += '<p class="mb-0 ctm-text-sm"> ' +row.designation+ ' '+ project +'</p>';
							leads += '</div></div>';
							leads += '<hr>';
						}
		        	});
		        	// Team Member
		        	data[0].team_member.forEach(function (row,index) {
		            	leads += '<div class="media mb-3">';
		            	var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						leads += '<div class="e-avatar avatar-online mr-3"><img src=' +profile+ ' alt="Profile" class="img-fluid"></div>';
						leads += '<div class="media-body">';
						leads += '<h6 class="m-0">' +row.employee_name+ '</h6>';
						var project = (row.project_name) ? '- <span class="mb-0 ctm-text-sm"> (' +row.project_name+ ' Project)</span>' : "";
						leads += '<p class="mb-0 ctm-text-sm"> ' +row.designation+ ' '+ project +'</p>';
						leads += '</div></div>';
						if (index !== data[0].team_member.length - 1) {
							leads += '<hr>';
						}
		        	});
		        }else{
		        	leads += '<div class="media mb-3">';
		        	leads += '<h6 class="m-0 ctm-text-sm">No Team Data</h6>';
		        	leads += '</div><hr>';
		        }
		        $('#team_leads').html(leads);
			}
		});
	}

	// upcoming leave data
	function LoadUpcomingLeave(){
		$.ajax({
			method: 'GET',
			url: '/getUpcomingLeaves-ajax',
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				// console.log('UpcomingLeave : ', data);
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
						if (index !== data.length - 1) {
							leaves += '<hr>';
						}
		        	});	            
		        }else{
		        	leaves += '<div class="notice-board">';
					leaves += '<h6 class="mb-0 ctm-text-sm">No Upcoming Leave</h6>';
		        	leaves += '</div><hr>';
		        }
		        $('#upcoming_leaves').html(leaves);
			}
		});
	}

	// recent activities data
	function LoadRecentActivities(){
		$.ajax({
			method: 'GET',
			url: '/getRecentActivities-ajax',
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				console.log('response : ', data);
				var activity = '';
				if(data.length > 0){
					console.log('my_activities : ', data[0].my_activities.length);
		            data[0].my_activities.forEach(function (row,index) {
						activity += '<div class="notice-board">';
						activity += '<div class="table-img">';
						var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						activity += '<div class="e-avatar mr-3"><img class="img-fluid" src='+profile+' alt="Danny Ward"></div>';
						activity += '</div>';
						activity += '<div class="notice-body">';
						activity += '<h6 class="mb-0">You '+row.action+' '+row.reciever_name+ ' '+row.module+'</h6>';
						var hours = getHoursDiff(row.date_time);
						var diff = (hours) ? hours+" ago" : "Just Now";
						activity += '<span class="ctm-text-sm">' +row.role_name+ ' | '+diff+'</span>';
						activity += '</div>';
						activity += '</div><hr>';
		        	});
		        	data[0].others_activities.forEach(function (row,index) {
						activity += '<div class="notice-board">';
						activity += '<div class="table-img">';
						var profile = (row.profile_photo) ? row.profile_photo : "img/profiles/img-1.jpg";
						activity += '<div class="e-avatar mr-3"><img class="img-fluid" src='+profile+' alt="Danny Ward"></div>';
						activity += '</div>';
						activity += '<div class="notice-body">';
						activity += '<h6 class="mb-0">' +row.employee_name+ ' '+row.action+' Your '+row.module+'</h6>';
						var hours = getHoursDiff(row.date_time);
						var diff = (hours) ? hours+" ago" : "Just Now";
						activity += '<span class="ctm-text-sm">' +row.role_name+ ' | '+diff+'</span>';
						activity += '</div>';
						activity += '</div>';
						if (index != data[0].others_activities.length - 1) {
							activity += '<hr>';
						}
		        	});	
		        }else{
		        	activity += '<div class="notice-board">';
					activity += '<h6 class="mb-0 ctm-text-sm">No Activities</h6>';
		        	activity += '</div><hr>';
		        }
		        $('#recent_activity').html(activity);
			}
		});
	}


	// onclick of refresh_today_news
	$('#refresh_today_news').click(function() {
	   	LoadUpcomingLeave();
	});
	// onclick of refresh_team_leads
	$('#refresh_team_leads').click(function() {
	   	LoadTeamLeads();
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
		// to load Upcoming leave data
	   	LoadUpcomingLeave();
	   	// to load Recent Activities data
	   	LoadRecentActivities();
	}

</script>
@endpush