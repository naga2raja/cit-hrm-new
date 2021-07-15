@extends('layout.mainlayout')
@section('content')

			<!-- Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
                        <div class=" col-xl-6 col-lg-6 col-md-6 offset-xl-3 offset-lg-3 offset-md-3 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="col-md-12">
                                                        <div class="alert alert-primary" style="width: 100%"> {{ $message }}</div>
                                                    </div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</aside>
						</div>
                        <div class="col-xl-9 col-lg-8 col-md-12">
                            
                        </div>
                    </div>
                </div>
            </div>

@endsection