<?php
session_start();
if (isset($_SESSION['name'])) {
error_reporting(0);
require_once "../core/conn.php";
$msg = "";
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
if (mysqli_num_rows($sql) > 0) {
	$row = mysqli_fetch_assoc($sql);
}
$sql = mysqli_query($con, "SELECT * FROM pay ");
if (mysqli_num_rows($sql) > 0) {
	$pay = mysqli_fetch_assoc($sql);
}
$das="7";

?>
<?php
$autofund=$row['autofund'];
 $bankname=$row['bankname'];
 $accountnumber=$row['accountnumber'];
 $rolexbank=$row['rolexbank'];
 $rolexnumber=$row['rolexnumber'];


if($monnify == '1'){
if ($autofund !='ACTIVE' || $bankname==" ") {

	require("../assets/monnify.php");

		 }
}

?>  

	<?php include '../includes/header.php'; ?>

			<div class="main-panel ">



				<style>
					.col-25 {
						-ms-flex: 25%;
						/* IE10 */
						flex: 25%;
					}

					.col-50 {
						-ms-flex: 50%;
						/* IE10 */
						flex: 50%;
					}

					.col-75 {
						-ms-flex: 75%;
						/* IE10 */
						flex: 75%;
					}

					.col-25,
					.col-50,
					.col-75 {
						padding: 0 16px;
					}

					.box {
						background-color: #f2f2f2;
						padding: 5px 20px 15px 20px;
						border: 1px solid lightgrey;
						border-radius: 3px;
					}

					input[type=number] {
						width: 100%;
						margin-bottom: 20px;
						padding: 12px;
						border: 1px solid #ccc;
						border-radius: 3px;
					}

					label {
						margin-bottom: 10px;
						display: block;
					}

					.icon-container {
						margin-bottom: 20px;
						padding: 7px 0;
						font-size: 24px;
					}

					.btn {
						background-color: rgb(10, 22, 197);
						color: white;
						padding: 12px;
						margin: 10px 0;
						border: none;
						width: 100%;
						border-radius: 3px;
						cursor: pointer;
						font-size: 17px;
					}

					.btn:hover {
						background-color: #45a049;
					}

					a {
						color: #2196F3;
					}

					hr {
						border: 1px solid lightgrey;
					}

					span.price {
						float: right;
						color: grey;
					}

					/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
					@media (max-width: 800px) {
						.row {
							flex-direction: column-reverse;
						}

						.col-25 {
							margin-bottom: 20px;
						}
					}
				</style>
				</head>

				<body>

					<div style="padding:90px 15px 20px 15px">

						<h2 class="w3-center">Automanted Bank Transfer </h2>

						<?php
if($monnify == "1"){
if ($bankname=="" || $accountnumber==""){

	echo '<div class="alert alert-default">

	<div>

	Dear '.$row['name'].',<br/> We are working hard to make wallet funding easy for you. Our Tech Experts are working tirelessly to enable you fund your wallet conveniently with a dedicated Account Number with no cost charges.

	</div>

	</div>';
}

else{

	echo '
	
	
					<div class="mt-4">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
									aria-controls="home" aria-selected="true">WEMA BANK</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
									aria-controls="profile" aria-selected="false">ROLEZ BANK</a>
							</li>
						</ul>

						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="card card-dark bg-secondary-gradient">
									<div class="card-body skew-shadow">
										<img src="https://upload.wikimedia.org/wikipedia/en/e/ef/Wema_Bank_Plc.jpg"
											height="60" alt="Visa Logo">

										
										<h2 class="py-4 mb-0">
											Account Number:'.$accountnumber.'
										</h2>

										<div class="row">
											<div class="col-8 pr-0">
												<h3 class="fw-bold mb-1">Account Name: '.$web['name'].' - '.$accountname.'
												</h3>
												<h3 class="fw-bold mb-1">Bank Name: '.$bankname.'</h3>
												<br>
												<div class="text-small text-uppercase fw-bold op-8">Automated Bank
													Transfer</div>
												<p class="text-small ">Make transfer to this account to fund your wallet
												</p>
											</div>
											<div class="col-4 pl-0 text-right">
												<h3 class="fw-bold mb-1">50 Naria</h3>
												<div class="text-small text-uppercase fw-bold op-8">Charge</div>
											</div>
										</div>
										

									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="card card-dark bg-primary-gradient">
									<div class="card-body skew-shadow">
										<img src="https://1000logos.net/wp-content/uploads/2017/05/Rolex-logo.png"
											height="60" alt="Rolex Logo">

										
										<h2 class="py-4 mb-0">
											Account Number:'.$rolexnumber.'
										</h2>

										<div class="row">
											<div class="col-8 pr-0">
												<h3 class="fw-bold mb-1">Account Name: '.$web['name'].' - '.$accountname.'
												</h3>
												<h3 class="fw-bold mb-1">Bank Name: '.$rolexbank.'</h3>
												<br>
												<div class="text-small text-uppercase fw-bold op-8">Automated Bank
													Transfer</div>
												<p class="text-small ">Make transfer to this account to fund your wallet
												</p>
											</div>
											<div class="col-4 pl-0 text-right">
												<h3 class="fw-bold mb-1">50 Naria</h3>
												<div class="text-small text-uppercase fw-bold op-8">Charge</div>
											</div>
										</div>
										

									</div>
								</div>
							</div>
						</div>
					</div>
	
	
';
			
}

}
?>

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

					

<script type="text/javascript">
	function payWithMonnify() {
		MonnifySDK.initialize({
			amount: 5000,
			currency: "NGN",
			reference: '' + Math.floor((Math.random() * 1000000000) + 1),
			customerName: "John Doe",
			customerEmail: "monnify@monnify.com",
			apiKey: "MK_TEST_SAF7HR5F3F",
			contractCode: "4934121693",
			paymentDescription: "Test Pay",
			isTestMode: true,
		    metadata: {
                    "name": "Damilare",
                    "age": 45
            },
			paymentMethods: ["CARD", "ACCOUNT_TRANSFER"],
			incomeSplitConfig: 	[
            	{
	    			"subAccountCode": "MFY_SUB_342113621921",
	    			"feePercentage": 50,
		    		"splitAmount": 1900,
		    		"feeBearer": true
    			},
    			{
		    		"subAccountCode": "MFY_SUB_342113621922",
		    		"feePercentage": 50,
	    			"splitAmount": 2100,
	    			"feeBearer": true
	    		}
    	    ],
			onComplete: function(response){
				//Implement what happens when transaction is completed.
	 			console.log(response);
			},
			onClose: function(data){
				//Implement what should happen when the modal is closed here
				console.log(data);
			}
		});
	}
</script>

		</div>
		</div>



		<!-- GetButton.io widget -->
		<?php require_once '../includes/footer.php'; ?>
	</body>

	</html>






<?php
} else {
	echo "<script>document.location.href='logout.php'; </script>";
	exit;
}

?>