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
										<h4 class="card-title mb-0">Punch Out</h4>
									</div>
								</div>
								<div class="card-body">	
									@if($message = Session::get('success'))
									<div class="alert alert-success">
										<p>{{$message}}</p>
									</div>
									@endif	
									@if($message = Session::get('error'))
									<div class="alert alert-danger">
										<p>{{$message}}</p>
									</div>
									@endif							
									<form id="punchOutForm" method="POST" action="{{ route('punch.update', $punch_in[0]->id) }}">
										@csrf
										@method('PUT')
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Punched In Time</label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>{{ $punch_in[0]->punch_in_user_time }}</label>
												</div>
											</div>
										</div>

										@if($punch_in[0]->punch_in_note != "")
											<div class="row">
												<div class="col-sm-2">
													<div class="form-group">
														<label>Punch In Note</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label>{{ $punch_in[0]->punch_in_note }}</label>
													</div>
												</div>
											</div>
										@endif

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Date</label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group mb-3">
													<input class="form-control" type="text" id="out_date" name="out_date" value="{{ date('d/m/Y', strtotime($punch_in[0]->punch_in_user_time)) }}" @if($edit_date_time == 0) readonly @endif>
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
													<input type="text" class="form-control time {{ $errors->has('out_time') ? 'is-invalid' : ''}}" name="out_time" id="out_time" value="{{ old('out_time', $current_time) }}" @if($edit_date_time == 0) readonly @endif >
                                                    {!! $errors->first('out_time', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
														<button class="btn btn-theme text-white ctm-border-radius button-1" type="button" id="punch_out">Punch Out</button>
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
	$('#punch_out').on('click', function(){
		if (!confirm("Do you want to Punch out?")){
			return false;
		}
		$('#punchOutForm').submit();
	});

	$('#calendar_icon').on('click', function(){
		$('#out_date').datetimepicker("show");
	});

	$('#out_date').datetimepicker({
		format: "DD/MM/YYYY",
		maxDate: new Date(),
		icons: {
			up: "fa fa-angle-up",
			down: "fa fa-angle-down",
			next: 'fa fa-angle-right',
			previous: 'fa fa-angle-left'
		}
	});

	$('#out_time').datetimepicker({
         format: 'hh:mm a',
		 icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            }
    });
</script>
@endpush