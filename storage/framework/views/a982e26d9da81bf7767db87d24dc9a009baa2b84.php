
<?php $__env->startSection('content'); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Orders</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Orders</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">Orders</h4>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Purchased</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Quantity</th>
                                                    <th>Shipment</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#0001</td>
                                                    <td>1 Jan 2019</td>
                                                    <td>Justin Lee</td>
                                                    <td>$312</td>
                                                    <td>28</td>
                                                    <td>2 Jan 2019</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                </tr>
                                                <tr>
                                                    <td>#0002</td>
                                                    <td>10 Jan 2019</td>
                                                    <td>Joe Edwards</td>
                                                    <td>$62</td>
                                                    <td>88</td>
                                                    <td>14 Jan 2019</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                </tr>
                                                <tr>
                                                    <td>#0003</td>
                                                    <td>19 Feb 2019</td>
                                                    <td>Mary Wiley</td>
                                                    <td>$78</td>
                                                    <td>14</td>
                                                    <td>21 Feb 2019</td>
                                                    <td><span class="badge badge-danger">Cancelled</span></td>
                                                </tr>
                                                <tr>
                                                    <td>#0004</td>
                                                    <td>25 Feb 2019</td>
                                                    <td>Amy Bond</td>
                                                    <td>$1057</td>
                                                    <td>75</td>
                                                    <td>-</td>
                                                    <td><span class="badge badge-danger">Cancelled</span></td>
                                                </tr>
                                                <tr>
                                                    <td>#0005</td>
                                                    <td>3 Mar 2019</td>
                                                    <td>Clara Brady</td>
                                                    <td>$3018</td>
                                                    <td>115</td>
                                                    <td>-</td>
                                                    <td><span class="badge badge-warning text-white">Shipped</span></td>
                                                </tr>
                                                <tr>
                                                    <td>#0006</td>
                                                    <td>22 Apr 2019</td>
                                                    <td>Robert Martin</td>
                                                    <td>$511</td>
                                                    <td>94</td>
                                                    <td>-</td>
                                                    <td><span class="badge badge-danger">Cancelled</span></td>
                                                </tr>
                                                <tr>
                                                    <td>#0007</td>
                                                    <td>11 May 2019</td>
                                                    <td>Nora Lambert</td>
                                                    <td>$988</td>
                                                    <td>35</td>
                                                    <td>15 May 2019</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                </tr>
                                                <tr>
                                                    <td>#0008</td>
                                                    <td>19 Jun 2019</td>
                                                    <td>Shelly Robertson</td>
                                                    <td>$635</td>
                                                    <td>52</td>
                                                    <td>-</td>
                                                    <td><span class="badge badge-danger">Cancelled</span></td>
                                                </tr>
                                                <tr>
                                                    <td>#0009</td>
                                                    <td>24 Jul 2019</td>
                                                    <td>Everett Garcia</td>
                                                    <td>$222</td>
                                                    <td>18</td>
                                                    <td>24 Jul 2019</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					
					
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ventura_landing\template\resources\views/orders.blade.php ENDPATH**/ ?>