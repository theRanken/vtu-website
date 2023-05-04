<?php
//Fetch balance from db
	$wallet = mysqli_query($con, "SELECT SUM(balance) FROM wallet");
            if 
            (mysqli_num_rows($wallet) > 0){
              $wallet_bal = mysqli_fetch_assoc($wallet);
              $total_balance = intval($wallet_bal["SUM(balance)"]);
             // var_dump($wallet_bal);
            }
            
            else{
               $total_balance = "0"; 
            }


?>
	<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg bg-secondary-gradient"  >
				
				<div class="container-fluid">
					
					
						

					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link"  href="../logout/">
								<i class="fas fa-power-off"></i> Logout
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
			<div class="sidebar sidebar-style-2" data-background-color="dark">			
				<div class="sidebar-wrapper scrollbar scrollbar-inner">
					<div class="sidebar-content">
						<div class="user">
							<div class="avatar avatar-online avatar-sm float-left mr-2">
								<img src="../static/dashboard/assets/img/avatar.png" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										<?php echo $row['username']; ?>
										<span class="user-level">Total Fund: &#8358; <?php echo $total_balance ; ?></span>
									</span>
								</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<ul class="nav nav-primary">
							
								<li class="nav-item">
							
									<a href="dashboard.php">
										<i class="fas fa-home"></i> <p>Dashboard</p>
									</a>
								</li>
							
												
								<li class="nav-item">
							
								<a data-toggle="collapse" href="#utilities">
									<i class="fa fa-users"></i>
									<p>users</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="utilities">
									<ul class="nav nav-collapse">
										<li>
											<a href="users.php"> <span class="sub-item">verified user</span> </a>
										</li>
										<li>
											<a href="vusers.php"> <span class="sub-item">unverified users</span> </a>
										</li>
										<li>
											<a href="busers.php"> <span class="sub-item">Banned users</span> </a>
										</li>
									</ul>
								</div>
							</li>
							
								<li class="nav-item">
							
								<a data-toggle="collapse" href="#fund">
									<i class="fas fa-credit-card"></i>
									<p>Transaction</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="fund">
									<ul class="nav nav-collapse">
										
										<li>
											<a href="pending.php"> <span class="sub-item">Pending Transaction</span> </a>
										</li>
										
										
										
										<li>
											<a href="success.php"> <span class="sub-item">Sucessful Transaction</span> </a>
										</li>
										
											<li>
											<a href="cancelled.php"> <span class="sub-item">Cancelled Transaction</span> </a>
										</li>
										
										<li>

											<a href="deposit.php"> <span class="sub-item">Deposit</span> </a>
										</li>

										<li>

											<a href="add.php"> <span class="sub-item">Credit User Account</span> </a>
										</li>
										
										<li>
											<a href="all.php"> <span class="sub-item">All  Coupon codes</span> </a>
										</li>
										
									</ul>
								</div>
							</li>
					
								<li class="nav-item">
							
								<a data-toggle="collapse" href="#adex">
							<i class="fas fa-camera"></i>
									<p>Category</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="adex">
									<ul class="nav nav-collapse">
										<li>
											<a href="categories.php"> <span class="sub-item">Add Category</span> </a>
										</li>
										<li>
											<a href="acategories.php"> <span class="sub-item">View Category</span> </a>
										</li>
										</ul>
								</div>
							</li>
						<li class="nav-item">
							
								<a data-toggle="collapse" href="#adex1">
							<i class="fas fa-globe-asia"></i>
									<p>Plans</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="adex1">
									<ul class="nav nav-collapse">
										<li>
											<a href="plans.php"> <span class="sub-item">Add Plan</span> </a>
										</li>
										<li>
											<a href="aplans.php"> <span class="sub-item">View Plan</span> </a>
										</li>
										</ul>
								</div>
							</li>
							
							<li class="nav-item">
							
									<a href="autopay.php">
										<i class="fas fa-money-check"></i><p>Automatic Payment<br> Method</p>
									</a>
								</li>
								
									<li class="nav-item">
							
									<a href="coupon.php">
										<i class="fas fa-credit-card"></i> <p>Create Cupon codes</p>
									</a>
								</li>
									<li class="nav-item">
								<a data-toggle="collapse" href="#adex2">
							<i class="fa fa-quote-right"></i>
									<p>Testimony</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="adex2">
									<ul class="nav nav-collapse">
										<li>
											<a href="ptesti.php"> <span class="sub-item">Pending Testimony</span> </a>
										</li>
										<li>
											<a href="atesti.php"> <span class="sub-item">Successful Testimony</span> </a>
										</li>
										</ul>
								</div>
							</li>
								
							<li class="nav-item">
							
									<a href="bank.php">
									 <i class="fas fa-money-check-alt"></i>
									 <p>Bank Account</p>
									</a>
								</li>
							

								
							
							
								<li class="nav-item">
							
								<a href="account.php">
									<i class="fas fa-user-circle"></i>
									<p>My Account</p>
								</a>
							</li>

							
								<li class="nav-item">
							
								<a href="change.php">
									<i class="fas fa-unlock"></i>
									<p>Change Password</p>
								</a>
							</li>

								</li>
							

						<li class="nav-item">
							
								<a data-toggle="collapse" href="#set">
									<i class="fas fa-cog"></i>
									<p>Settings</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="set">
									<ul class="nav nav-collapse">
										
										<li>
											<a href="setting.php"> <span class="sub-item">General Setting</span> </a>
										</li>
										
										
										
										<li>
											<a href="site.php"> <span class="sub-item">Site Setting</span> </a>
										</li>
										
										
										<li>

											<a href="footer.php"> <span class="sub-item">Footer Setting</span> </a>
										</li>
										
										<li>
											<a href="terms.php"> <span class="sub-item">Front Page Price</span> </a>
										</li>
										<li>
											<a href="term.php"> <span class="sub-item">Terms and Conditions</span> </a>
										</li>
										<li>
											<a href="theme.php"> <span class="sub-item">Theme</span> </a>
										</li>
										<li>
											<a href="email.php"> <span class="sub-item">Email Configuration</span></a>
										</li>
											<li>
											<a href="api.php"> <span class="sub-item">API Configuration</span></a>
										</li>
											<li>
											<a href="sms.php"> <span class="sub-item">SMS Configuration</span></a>
										</li>
									</ul>
								</div>
							</li>
					

                           





							<!-- 
								<li class="nav-item">
							
								<a href="/documentation/">
									<i class="fas fa-code"></i>
									<p>Developer's API</p>
								</a>
							</li> -->
							<li class="nav-item">
								<a href="../logout">
									<i class="fas fa-sign-out-alt"></i>
									<p>Logout</p>
								</a>
							</li>             

							<li class="nav-item">
								<a href="../index.php">
									 <i class="fas fa-laptop-code"></i>
									<p>Developed</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<!-- End Sidebar -->
		