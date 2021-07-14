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
										<h4 class="card-title mb-0">Punch In</h4>
									</div>
								</div>
								<div class="card-body">
									@if($message = Session::get('success'))
									<div class="alert alert-success">
										<p>{{$message}}</p>
									</div>
									@endif									
									<form method="POST" action="{{ route('punch.store') }}">
										@csrf
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Date</label>
												</div>
											</div>
											<div class="col-sm-3">
												<!-- <div class="form-group">
													<input class="form-control datetimepicker" type="text" id="in_date" name="in_date" value="{{ $current_date }}">
													<input type="hidden" name="employee_id" value="{{$employee_id}}">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group"><h4 class="card-title mt-3">
													<i class="fa fa-calendar" aria-hidden="true" style="font-size: 30px;"></i></h4>
												</div> -->
												<div class="input-group mb-3">
													<input class="form-control datetimepicker" type="text" id="in_date" name="in_date" value="{{ $current_date }}">
													<input type="hidden" name="employee_id" value="{{$employee_id}}">
													<div class="input-group-append">
														<button class="btn btn-theme text-white" type="button" id="calendar_icon">
															<i class="fa fa-calendar" aria-hidden="true"></i>
														</button>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Time</label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<input type="text" class="form-control time {{ $errors->has('in_time') ? 'is-invalid' : ''}}" name="in_time" id="in_time" value="{{ old('in_time') ? old('in_time') : '00:00' }}">
                                                    {!! $errors->first('in_time', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label>HH:MM</label>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Note</label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : ''}}" rows="3" name="note">{{ old('note') }}</textarea>
                                                    {!! $errors->first('note', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>
										<hr>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-3 text-center">
												<div class="row">
													<div class="col-sm-6">
														<button class="btn btn-theme text-white ctm-border-radius button-1" type="submit">Punch In</button>
													</div>
												</div>
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

@push('scripts')
<script type="text/javascript">
	$('#calendar_icon').on('click', function(){
		$('#in_date').datetimepicker("show");
	});
</script>
@endpush