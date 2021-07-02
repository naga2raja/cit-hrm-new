
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="<?php echo e(Request::is('index') ? 'active' : ''); ?>"> 
								<a href="index"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-cart"></i> <span> Ecommerce</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('products') ? 'active' : ''); ?>" href="<?php echo e(url('products')); ?>">Products</a></li>
									<li><a class="<?php echo e(Request::is('product-details') ? 'active' : ''); ?>" href="<?php echo e(url('product-details')); ?>">Product View</a></li>
									<li><a class="<?php echo e(Request::is('orders') ? 'active' : ''); ?>" href="<?php echo e(url('orders')); ?>">Orders</a></li>
									<li><a class="<?php echo e(Request::is('customers') ? 'active' : ''); ?>" href="<?php echo e(url('customers')); ?>">Customers</a></li>
									<li><a class="<?php echo e(Request::is('invoice') ? 'active' : ''); ?>" href="<?php echo e(url('invoice')); ?>">Invoice</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-tiled"></i> <span> Application</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('chat') ? 'active' : ''); ?>" href="<?php echo e(url('chat')); ?>">Chat</a></li>
									<li><a class="<?php echo e(Request::is('calendar') ? 'active' : ''); ?>" href="<?php echo e(url('calendar')); ?>">Calendar</a></li>
									<li><a class="<?php echo e(Request::is('inbox') ? 'active' : ''); ?>" href="<?php echo e(url('inbox')); ?>">Email</a></li>
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Pages</span>
							</li>
							<li class="<?php echo e(Request::is('profile') ? 'active' : ''); ?>" href="<?php echo e(url('profile')); ?>"> 
								<a href="profile"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('login') ? 'active' : ''); ?>" href="<?php echo e(url('login')); ?>"> Login </a></li>
									<li><a class="<?php echo e(Request::is('register') ? 'active' : ''); ?>" href="<?php echo e(url('register')); ?>"> Register </a></li>
									<li><a class="<?php echo e(Request::is('forgot-password') ? 'active' : ''); ?>" href="<?php echo e(url('forgot-password')); ?>"> Forgot Password </a></li>
									<li><a class="<?php echo e(Request::is('lock-screen') ? 'active' : ''); ?>" href="<?php echo e(url('lock-screen')); ?>"> Lock Screen </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="error-404">404 Error </a></li>
									<li><a href="error-500">500 Error </a></li>
								</ul>
							</li>
							<li class="<?php echo e(Request::is('users') ? 'active' : ''); ?>" href="<?php echo e(url('users')); ?>"> 
								<a href="users"><i class="fe fe-users"></i> <span>Users</span></a>
							</li>
							<li class="<?php echo e(Request::is('blank-page') ? 'active' : ''); ?>" href="<?php echo e(url('blank-page')); ?>"> 
								<a href="blank-page"><i class="fe fe-file"></i> <span>Blank Page</span></a>
							</li>
							<li class="<?php echo e(Request::is('maps-vector') ? 'active' : ''); ?>" href="<?php echo e(url('maps-vector')); ?>"> 
								<a href="maps-vector"><i class="fe fe-map"></i> <span>Vector Maps</span></a>
							</li>
							<li class="menu-title"> 
								<span>UI Interface</span>
							</li>
							<li class="<?php echo e(Request::is('components') ? 'active' : ''); ?>" href="<?php echo e(url('components')); ?>"> 
								<a href="components"><i class="fe fe-vector"></i> <span>Components</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('form-basic-inputs') ? 'active' : ''); ?>" href="<?php echo e(url('form-basic-inputs')); ?>">Basic Inputs </a></li>
									<li><a class="<?php echo e(Request::is('form-input-groups') ? 'active' : ''); ?>" href="<?php echo e(url('form-input-groups')); ?>">Input Groups </a></li>
									<li><a class="<?php echo e(Request::is('form-horizontal') ? 'active' : ''); ?>" href="<?php echo e(url('form-horizontal')); ?>">Horizontal Form </a></li>
									<li><a class="<?php echo e(Request::is('form-vertical') ? 'active' : ''); ?>" href="<?php echo e(url('form-vertical')); ?>"> Vertical Form </a></li>
									<li><a class="<?php echo e(Request::is('form-mask') ? 'active' : ''); ?>" href="<?php echo e(url('form-mask')); ?>"> Form Mask </a></li>
									<li><a class="<?php echo e(Request::is('form-validation') ? 'active' : ''); ?>" href="<?php echo e(url('form-validation')); ?>"> Form Validation </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('tables-basic') ? 'active' : ''); ?>" href="<?php echo e(url('tables-basic')); ?>">Basic Tables </a></li>
									<li><a class="<?php echo e(Request::is('data-tables') ? 'active' : ''); ?>" href="<?php echo e(url('data-tables')); ?>">Data Table </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
            


			<?php /**PATH C:\xampp\htdocs\ventura\template\resources\views/layout/partials/nav.blade.php ENDPATH**/ ?>