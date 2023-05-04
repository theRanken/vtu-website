	<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="/upload/adex_me.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $row['username']; ?>
									<span class="user-level">Admin</span>
									
								</span>
							</a>
							</div>
					</div>
					<ul class="nav nav-primary">
					    
						<li class="nav-item <?php if($das==="1") echo "active" ?>">						
						<a href="dashboard.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item <?php if($das==="2") echo "active" ?>">
							<a data-toggle="collapse" href="#user">
								<i class="fas fa-user"></i>
								<p>Manage Users Account</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="user">
								<ul class="nav nav-collapse">
									<li>
										<a href="user.php">
											<span class="sub-item">Verified Users</span>
										</a>
									</li>
									<li>
										<a href="ven.php">
											<span class="sub-item">Unverified User</span>
										</a>
									</li>
									<li>
										<a href="ban.php">
											<span class="sub-item">Banned User</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?php if($das==="3") echo "active" ?>">
							<a data-toggle="collapse" href="#trans">
								<i class="fas fa-user"></i>
								<p>Users Transactions</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="trans">
								<ul class="nav nav-collapse">
									<li>
										<a href="success.php">
											<span class="sub-item">successful Transactions</span>
										</a>
									</li>
									<li>
										<a href="fail.php">
											<span class="sub-item">fail Transactions</span>
										</a>
									</li>
									<li>
										<a href="all.php">
											<span class="sub-item">All Transactions</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						<li class="nav-item <?php if($das==="0") echo "active" ?>">
							<a data-toggle="collapse" href="#message">
								<i class="far fa-comment-alt"></i>
								<p>Messages</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="message">
								<ul class="nav nav-collapse">
									<li>
										<a href="message.php">
											<span class="sub-item">Pending Airtime 2cash</span>
										</a>
									</li>
									<li>
										<a href="cash_approve.php">
											<span class="sub-item">Approved Airtime 2cash</span>
										</a>
									</li>
									<li>
										<a href="deletecash.php">
											<span class="sub-item">Cancelled Airtime 2cash</span>
										</a>
									</li>
									
									
									<li>
										<a href="pen_bank.php">
											<span class="sub-item">Pending Bank Payment</span>
										</a>
									</li>
									<li>
										<a href="aprovebank.php">
											<span class="sub-item">Approve Bank Payment</span>
										</a>
									</li>
									<li>
										<a href="bancash.php">
											<span class="sub-item">Cancelled Bank Payment</span>
										</a>
									</li>
									
									<li>
										<a href="mon_deposit.php">
											<span class="sub-item">Monnify Deposit</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?php if($das==="4") echo "active" ?>">
							<a data-toggle="collapse" href="#fans">
								<i class="fas fa-wallet"></i>
								<p>Finance Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="fans">
								<ul class="nav nav-collapse">
									<li>
										<a href="credit.php">
											<span class="sub-item">Credit User</span>
										</a>
									</li>
									<li>
										<a href="upgrade.php">
											<span class="sub-item">Upgrade user</span>
										</a>
									</li>
									<li>
										<a href="debit.php">
											<span class="sub-item">Debit User</span>
										</a>
									</li>
									<li>
										<a href="cupon.php">
											<span class="sub-item">Create cupon code</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						<li class="nav-item <?php if($das==="5") echo "active" ?>">
							<a data-toggle="collapse" href="#discount">
								<i class="fas fa-percent"></i>
								<p>Discount && Charges</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="discount">
								<ul class="nav nav-collapse">
									<li>
										<a href="airtime.php">
											<span class="sub-item">Airtime Discount</span>
										</a>
									</li>
									<li>
										<a href="share.php">
											<span class="sub-item">share & sell discount</span>
										</a>
									</li>
									<li>
										<a href="2cash.php">
											<span class="sub-item">airtime 2 cash charges</span>
										</a>
									</li>
									<li>
										<a href="cable.php">
											<span class="sub-item">cable charges</span>
										</a>
									</li>
										<li>
										<a href="exam_charge.php">
											<span class="sub-item">Exam Charges</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						<li class="nav-item <?php if($das==="6") echo "active" ?>">
							<a data-toggle="collapse" href="#service">
							<i class="fas fa-unlock-alt"></i>
								<p>Lock and unlock service</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="service">
								<ul class="nav nav-collapse">
									<li>
										<a href="data_service.php">
											<span class="sub-item">Data service</span>
										</a>
									</li>
									<li>
										<a href="airtime_service.php">
											<span class="sub-item">Airtime service</span>
										</a>
									</li>
									<li>
										<a href="cable_service.php">
											<span class="sub-item">cable service</span>
										</a>
									</li>
									<li>
										<a href="exam.php">
											<span class="sub-item">Exam service</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?php if($das==="7") echo "active" ?>">
							<a data-toggle="collapse" href="#bundle">
							<i class="fas fa-file-archive"></i>
								<p>Add Bundles</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="bundle">
								<ul class="nav nav-collapse">
									<li>
										<a href="add_plan.php">
											<span class="sub-item">Add Data Plans</span>
										</a>
									</li>
									<li>
										<a href="data_plan.php">
											<span class="sub-item">View data Plan</span>
										</a>
									</li>
									<li>
										<a href="add_cable.php">
											<span class="sub-item">Add Cable Plans</span>
										</a>
									</li>
									<li>
										<a href="cable_plan.php">
											<span class="sub-item">View cable Plans</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
				  <li class="nav-item <?php if($das == "8") echo "active"?>">
							<a  href="notif.php">
							 <i class="fas fa-envelope-open"></i>
								<p>Notification</p>
								
							</a>
							</li>
							
						<li class="nav-item <?php if($das==="9") echo "active" ?>">
							<a data-toggle="collapse" href="#testi">
							<i class="fas fa-star-half-alt"></i>
								<p>Testimony</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="testi">
								<ul class="nav nav-collapse">
									<li>
										<a href="pen_tes.php">
											<span class="sub-item">pending testimony</span>
										</a>
									</li>
									<li>
										<a href="all_tes.php">
											<span class="sub-item">Approved testimony</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
								
						<li class="nav-item <?php if($das==="10") echo "active" ?>">
							<a data-toggle="collapse" href="#loan">
							<i class="fas fa-coins"></i>
								<p>Loan Activities</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="loan">
								<ul class="nav nav-collapse">
									<li>
										<a href="loan_pending.php">
											<span class="sub-item">pending loan</span>
										</a>
									</li>
									<li>
										<a href="loan_approve.php">
											<span class="sub-item">Approved loan</span>
										</a>
									</li>
									<li>
										<a href="loan_unpaid.php">
											<span class="sub-item">Unpaid Loan</span>
										</a>
									</li>
									<li>
										<a href="loan_paid.php">
											<span class="sub-item">Paid Loan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Website Setting</h4>
						</li>
						<li class="nav-item <?php if($das==="123") echo "active" ?>">
							<a data-toggle="collapse" href="#web">
								<i class="fas fa-cog"></i>
								<p>website setting</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="web">
								<ul class="nav nav-collapse">
									<li>
										<a href="web.php">
											<span class="sub-item">website information</span>
										</a>
									</li>
									<li>
										<a href="config.php">
											<span class="sub-item">Email configuration</span>
										</a>
									</li>
									<li>
										<a href="terms.php">
											<span class="sub-item">Terms and configuration</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
							<li class="nav-item <?php if($das==="123456") echo "active" ?>">
							<a data-toggle="collapse" href="#adex_portal">
							<i class="fa fa-tasks" aria-hidden="true"></i>
								<p>Website Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="adex_portal">
								<ul class="nav nav-collapse">
									<li>
										<a href="upgrade_price.php">
											<span class="sub-item">Upgrade user price</span>
										</a>
									</li>
									<li>
										<a href="welcome.php">
											<span class="sub-item">Welcome Message</span>
										</a>
									</li>
									<li>
										<a href="max.php">
											<span class="sub-item">Minimum and maximum money</span>
										</a>
									</li>
									<li>
										<a href="theme.php">
											<span class="sub-item">Website Theme</span>
										</a>
									</li>
									
									<li>
										<a href="2cash_number.php">
											<span class="sub-item">Airtime 2 Cash Number</span>
										</a>
									</li>
									<li>
										<a href="password.php">
											<span class="sub-item">Change Password</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
							
						<li class="nav-item <?php if($das==="1234") echo "active" ?>">
							<a data-toggle="collapse" href="#api">
								<i class="fas fa-globe"></i>
								<p>Api Integration</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="api">
								<ul class="nav nav-collapse">
							<!-----		<li>
										<a href="sme.php">
											<span class="sub-item">Sme Plug</span>
										</a>
									</li>
									<li>
										<a href="vtpass.php">
											<span class="sub-item">Vt Pass</span>
										</a>
									</li> ------->
									<li>
										<a href="sme.php">
											<span class="sub-item">ADEX PLUG APIKEY</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?php if($das==="12345") echo "active" ?>">
							<a data-toggle="collapse" href="#gateway">
								<i class="fab fa-hackerrank"></i>
								<p>Payment Gateway</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="gateway">
								<ul class="nav nav-collapse">
									<li>
										<a href="monnify.php">
											<span class="sub-item">Monnify</span>
										</a>
									</li>
									<li>
										<a href="bank.php">
											<span class="sub-item">Bank account detials</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
							<li class="nav-item">
							<a  href="logout.php">
							 <i class="fas fa-sign-out-alt"></i>
								<p>Log Out</p>
								
							</a>
							</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->