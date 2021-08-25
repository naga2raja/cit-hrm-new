@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">

						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="accordion add-employee" id="accordion-details">
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header" id="basic1">
										<h4 class="cursor-pointer mb-0">
											<a class="ml-2 coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
												Add News
											</a>
										</h4>
									</div>
									<div class="card-body p-0">
										<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
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

											<form method="POST" action="{{ route('news.store') }}">
												@csrf
												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Title <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" name="title" autocomplete="off" maxlength="39" value="{{ old('title') }}">
															{!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Details <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<textarea class="form-control {{ $errors->has('news') ? 'is-invalid' : ''}}" name="news" rows="3" placeholder="Detailed News"></textarea>
															{!! $errors->first('news', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Category <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<select class="form-control select {{ $errors->has('category') ? 'is-invalid' : ''}}" name="category" id="category" style="width: 100%">
																<option value="">Select Category</option>
																<option value="Information">Information</option>
																<option value="Important">Important</option>
																<option value="Event">Event</option>
																<option value="Project">Project</option>
															</select>
															{!! $errors->first('category', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Project</label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<select class="form-control select" name="project_id">
																<option value="">All</option>
																@if(count($projects) > 0)
																	@foreach($projects as $row)
																    	<option value="{{ $row->project_id }}" {{ old('project_id') == $row->project_id ? 'selected' : '' }}>{{ $row->project_name }}</option>
																    @endforeach
																@endif
															</select>
															{!! $errors->first('project_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
													<div class="col-sm-4">
														<label class="ctm-text-sm mt-2">News will visible only to selected project members</label>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">				
															<label>Status</label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<select class="form-control select" name="status">
															    <option value='Active' {{ Request::get('status') == "Active" ? 'selected' : '' }}>Active</option>
															    <option value='In active' {{ Request::get('status') == "In active" ? 'selected' : '' }}>In-active</option>
															</select>
															{!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
													</div>
												</div>
												<hr>

												<div class="row">
													<div class="col-sm-2"></div>
													<div class="col-sm-3 text-center">
														<div class="row">
															<div class="col-sm-6">
																<div class="submit-section text-center btn-add">
																	<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
																</div>
															</div>
															<div class="col-sm-6">
																<a href="{{ route('news.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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
				</div>
			</div>
			<!--/Content-->
			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection

@push('scripts')
<script type="text/javascript">
</script>    
@endpush