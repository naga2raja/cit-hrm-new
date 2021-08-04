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
											<h4><b>Welcome</b></h4>
											<h4>
												<b>@if (!Auth::guest()) {{ Auth::user()->name }} @endif</b>					
											</h4>
											<p>{{ date('D, d M Y') }}</p>
										</div>
									</div>
								</div>
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
								
									<div class="card-body">
										<ul class="list-group">
											@hasrole('Admin')
											<li class="list-group-item text-center active button-5"><a href="javascript:void(0)" class="text-white">Admin Dashboard</a></li>
											@endrole
											@hasrole('Employee')
											<li class="list-group-item text-center active button-5"><a class="text-white" href="javascript:void(0)">Employees Dashboard</a></li>
											@endrole
										</ul>
									</div>
								</div>
								<div class="card shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Permission</h4>
										<a href="leave" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
									</div>
									<div class="card-body text-center">
										<div class="time-list">
											<div class="dash-stats-list">
												<span class="btn btn-outline-primary">9.00 Hrs</span>
												<p class="mb-0">Approved</p>
											</div>
											<div class="dash-stats-list">
												<span class="btn btn-outline-primary">10.00 Hrs</span>
												<p class="mb-0">Remaining</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Leave</h4>
										<a href="leave" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
									</div>
									<div class="card-body text-center">
										<div class="time-list">
											<div class="dash-stats-list">
												<span class="btn btn-outline-primary">4.5 Days</span>
												<p class="mb-0">Taken</p>
											</div>
											<div class="dash-stats-list">
												<span class="btn btn-outline-primary">7.5 Days</span>
												<p class="mb-0">Remaining</p>
											</div>
										</div>
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-xl-6 col-lg-12 d-flex">
									<div class="card shadow-sm flex-fill">
										<div class="card-header align-items-center">
											<h4 class="card-title mb-0 d-inline-block">Today ({{ date('d M Y') }})</h4>
											<a href="javascript:void(0)" id="refresh_today_news" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
										</div>
										<div class="card-body recent-activ">
											<div class="recent-comment" id="today_news">
												<!-- <a href="javascript:void(0)" class="dash-card text-dark">
													<div class="dash-card-container">
														<div class="dash-card-icon text-primary">
															<i class="fa fa-birthday-cake" aria-hidden="true"></i>
														</div>
														<div class="dash-card-content">
															<h6 class="mb-0">No Birthdays Today</h6>
														</div>
													</div>
												</a>
												<hr> -->
												<!-- <a href="javascript:void(0)" class="dash-card text-dark">
													<div class="dash-card-container">
														<div class="dash-card-icon text-warning">
															<i class="fa fa-bed" aria-hidden="true"></i>
														</div>
														<div class="dash-card-content">
															<h6 class="mb-0">Ralph Baker is off sick today</h6>
														</div>
														<div class="dash-card-avatars">
															<div class="e-avatar"><img class="img-fluid" src="img/profiles/img-9.jpg" alt="Avatar"></div>
														</div>
													</div>
												</a>
												<hr>
												<a href="javascript:void(0)" class="dash-card text-dark">
													<div class="dash-card-container">
														<div class="dash-card-icon text-success">
															<i class="fa fa-child" aria-hidden="true"></i>
														</div>
														<div class="dash-card-content">
															<h6 class="mb-0">Ralph Baker is parenting leave today</h6>
														</div>
														<div class="dash-card-avatars">
															<div class="e-avatar"><img class="img-fluid" src="img/profiles/img-9.jpg" alt="Avatar"></div>
														</div>
													</div>
												</a>
												<hr>
												<a href="javascript:void(0)" class="dash-card text-dark">
													<div class="dash-card-container">
														<div class="dash-card-icon text-danger">
															<i class="fa fa-suitcase"></i>
														</div>
														<div class="dash-card-content">
															<h6 class="mb-0">Danny ward is away today</h6>
														</div>
														<div class="dash-card-avatars">
															<div class="e-avatar"><img class="img-fluid" src="img/profiles/img-5.jpg" alt="Avatar"></div>
														</div>
													</div>
												</a>
												<hr>
												<a href="javascript:void(0)" class="dash-card text-dark">
													<div class="dash-card-container">
														<div class="dash-card-icon text-pink">
															<i class="fa fa-home" aria-hidden="true"></i>
														</div>
														<div class="dash-card-content">
															<h6 class="mb-0">You are working from home today</h6>
														</div>
														<div class="dash-card-avatars">
															<div class="e-avatar"><img class="img-fluid" src="img/profiles/img-6.jpg" alt="Maria Cotton"></div>
														</div>
													</div>
												</a> -->
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
											<div class="recent-comment">
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
@endsection

@push('scripts')
<script type="text/javascript">

	// TodayNews data
	function LoadTodayNews(){
		$.ajax({
			method: 'GET',
			url: '/getTodayNews-ajax',
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				console.log('TodayNews : ', data);
				var news = '';
				if(data.length > 0){
		            data.forEach(function (row,index) {
		            	news += '<a href="javascript:void(0)" class="dash-card text-dark">';
						news += '<div class="dash-card-container">';
						news += '<div class="dash-card-icon text-primary">';
						news += '<i class="fa fa-suitcase" aria-hidden="true"></i>';
						news += '</div>';
						news += '<div class="dash-card-content">';
						news += '<h6 class="mb-0">'+row.news+'</h6>';
						news += '</div>';
						news += '</div>';
						news += '</a>';
						if (index !== data.length - 1) {
							news += '<hr>';
						}					
		        	});	            
		        }else{
		        	news += '<a href="javascript:void(0)" class="dash-card text-dark">';
		        	news += '<div class="dash-card-container">';
						news += '<div class="dash-card-icon text-primary">';
						news += '<i class="fa fa-birthday-cake" aria-hidden="true"></i>';
						news += '</div>';
						news += '<div class="dash-card-content">';
						news += '<h6 class="mb-0">No News</h6>';
						news += '</div>';
		        	news += '</div></a><hr>';
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
				console.log('TeamLeads : ', data);
				var leads = '';
				if(data.reporting_manager.length > 0){
		            console.log('reporting_manager : ', data.reporting_manager);
		            data.forEach(function (row,index) {
		            					
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
						leaves += row.from_date;
						if(row.from_date != row.to_date){
							leaves += " - "+row.to_date;
						}
						leaves += '<span class="ctm-text-sm"> ('+ row.name+ ')</span>';
						leaves += '</h6>';
						leaves += '<span class="ctm-text-sm">';
						leaves += (row.leave_days+1) * row.length_days+ ' ('+row.leave_duration+') | '+status+'</span>';
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
	}

</script>
@endpush