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
															<li class="breadcrumb-item d-inline-block"><a href="/" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Payroll</li>
														</ol>
														<h4 class="text-dark">Payslips</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
                                                                                                          

									</div>
								</div>
								
							</aside>
						</div>
						

						
						<div class="col-xl-9 col-lg-8  col-md-12">

							<div class="row">                                
                                
								<div class="col-md-12">
                                    @if($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{$message}}</p>
                                        </div>
                                    @endif
                                    
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
                                            <div class="row filter-row">
                                                <div class="col-sm-4 col-md-8 col-lg-8 col-xl-8">  
                                                    <div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
                                                        <h4 class="card-title mb-0">Payslips</h4>
                                                    </div>
                                                </div>                                                
                                                
                                            </div>

											
										</div>
										<div class="card-body align-center">
                                            <form method="GET" id="filter_form">
															

                                                <div class="row filter-row">
                                                    <div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
                                                        {{-- <div class="form-group">
                                                            <label>Select Month</label>
                                                            <input autocomplete="off" class="form-control datetimepicker2 cal-icon-input" type="text" placeholder="Choose" name="to_date" id="datetimepicker2">
                                                        </div> --}}

                                                        {{-- <div class="form-group">
                                                            <label>Select Month</label>
                                                            <select class="form-control select" name="payslip_id" id="payslip_id">
                                                                <option value="">Select</option>
                                                                    @foreach($empData as $payslip)
                                                                        <option value="{{ $payslip->id }}"> {{ $payslip->payslip_month }}</option>
                                                                    @endforeach																
                                                            </select>
                                                        </div> --}}

                                                    </div>
                                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label>Month</label>
                                                            <select class="form-control select" name="payslip_month" id="payslip_month">
                                                                <option value="">Select</option>
                                                                    <?php 
                                                                    for($m=1; $m<=12; ++$m){
                                                                        $month = date('M', mktime(0, 0, 0, $m, 1));
                                                                        echo '<option value="'.$month.'">'.$month.'</option>';
                                                                    }                                                                                
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label>Year</label>
                                                            <select class="form-control select" name="payslip_year" id="payslip_year">
                                                                <option value="">Select</option>
                                                                <?php
                                                                    $currentYear = date('Y');
                                                                    $limit = $currentYear - 20;
                                                                    for($x = $currentYear; $x >= $limit; $x-- ) {
                                                                        echo '<option>'.$x.' </option>';
                                                                    }

                                                                ?>															
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">	
                                                        <label> </label>												
                                                        <button type="button" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block" name="search" onclick="getPayslipPdfAjax()"> Download </button>													
                                                    </div>
                                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                                        <label> </label>
                                                        <button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block" onclick="resetAllValues('filter_form')"> Cancel </button>
                                                    </div>

                                                </div>
                                            </form> 

											<div class="">
                                                <div class="col-md-8">
                                                    <div id="payslipDownload"><p> </p></div>
                                                </div>
                                                
                                                {{-- <div class="row filter-row">
                                                    <div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-group">
                                                            <label>From Month</label>
                                                            <input autocomplete="off" class="form-control datetimepicker1 cal-icon-input" type="text" placeholder="From Month" name="from_date" value="{{ Request::get('from_date') }}" id="datetimepicker1">
                                                        </div>
                                                    </div>
                                                </div> --}}
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
        
        <style>
            td .select2-container { width: 150px !important;}
            .download_payslip {
                background: url('{{ assetUrl("img/sample-payslip.png") }}') no-repeat;;
            }
        </style>
        
@endsection
        
@section('my-scripts')
	<script>
        var availableDates = ["2021-09-01","2021-08-02"];
        $('#datetimepicker1').datetimepicker({            
            format: "YYYY-MM",
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            },
            useCurrent: false,
            extraFormats: ['YYYY-MM'],
            enabledDates: availableDates,
            debug: true,
        });

        $('.datetimepicker2').datetimepicker({
            date: '{{ (@Request::get("to_date")) }}',
            format: "YYYY-MM", 
            maxDate: new Date(),
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            }
        });

        function getPayslipPdfAjax() {
            // var payMonth = $('#payslip_id').val();
            var payMonth = $('#payslip_month').val();
            var payYear = $('#payslip_year').val();
            if(payMonth && payYear) {
                // var fileId = window.btoa(payMonth);
                // var htmlTxt = '<div class="download_payslip1"><a href="{{ route("payslip.download") }}?file='+ fileId +' }}" style="position:relative"><img src="{{ assetUrl("img/sample-payslip.png") }}"><div style="position:absolute;left:45%;top:40%;"><i class="fa fa-4x fa-download"></i> </div></a></div>';
                // $('#payslipDownload').html(htmlTxt);

                $.ajax({
                    method: 'POST',
                    url: "{{ route('payslip.ajax') }}",
                    data: JSON.stringify({'date': payYear+'-'+payMonth, '_token': '{{ csrf_token() }}' }),
                    dataType: "json",
                    contentType: 'application/json',
                    success: function(data){
                        console.log('EmployeeHolidays : ', data);			
                        if(data && data.id) {
                            var fileId = window.btoa(data.id);
                            // var htmlTxt = '<div class="download_payslip1"><a href="{{ route("payslip.download") }}?file='+ fileId +' }}" style="position:relative"><img src="{{ assetUrl("img/sample-payslip.png") }}"><div style="position:absolute;left:45%;top:40%;"><i class="fa fa-4x fa-download"></i> </div></a></div>';
                            var htmlTxt = '<div class="col-md-12"><ul class="list-group"><li class="list-group-item">Note:</li>';
                            htmlTxt += '<li  class="list-group-item"> Each month after 5th, you can download your payslip</li>';
                            htmlTxt += '<li class="list-group-item">If you have any clarification in the payslip, Please contact HR for more details </li>';
                            htmlTxt += '</ul></div>';															
																
                            $('#payslipDownload').html(htmlTxt);
                            window.location.href = '{{ route("payslip.download") }}?file='+ fileId;
                        } else {
                            var htmlTxt = '<div class="alert alert-danger">Payslip not uploaded!</div>';
                            $('#payslipDownload').html(htmlTxt);
                        }
                    }
                });
            } else {
                var htmlTxt = '<div class="alert alert-danger">Please select a Month and Year!</div>';
                $('#payslipDownload').html(htmlTxt);                
            }
        }

	</script>
@endsection