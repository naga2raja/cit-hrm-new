@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left">
										<h4 class="card-title mb-0">Attendance Configuration</h4>
									</div>
								</div>
								<div class="card-body">
								@if($message = Session::get('success'))
								<div class="alert alert-success">
									<p>{{$message}}</p>
								</div>
								@endif									
									<form method="POST" action="{{ route('configurations.store') }}">
										@csrf
										@foreach($configurations as $configure)
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ $configure->action }} </label>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group">
														<div class="custom-control custom-switch float-right">
															<input type="checkbox" class="custom-control-input" name="checkbox[]" value="{{$configure->id}}" id="{{ 'customeSwitch'.$configure->id }}" @if($configure->action_flag != 0){{'checked'}}@endif>
															<label class="custom-control-label" for="{{ 'customeSwitch'.$configure->id }}"></label>
														</div>
													</div>
												</div>
											</div>
										@endforeach
										<hr>

										<div class="row">
											<div class="col-sm-1 text-center">
												<button class="btn btn-theme text-white ctm-border-radius button-1" type="submit">Save </button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection