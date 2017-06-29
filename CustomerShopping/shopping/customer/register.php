<?php
	$message="";
	// check if the fisrt name was posted
	if(isset($_POST["register_firstname"]))
	{  
		$reg_id = $_POST["register_id"];
		$reg_password = $_POST["register_password"];
		$reg_firstname = $_POST["register_firstname"];
		$reg_lastname = $_POST["register_lastname"];
		$reg_email = $_POST["register_email"];
		$reg_address = $_POST["register_address"];
		$reg_city = $_POST["register_city"];
		$reg_state = $_POST["register_state"];
		$reg_zip = $_POST["register_zip"];
		$reg_phonenumber = $_POST["register_phonenumber"];
		
		$conn = new mysqli("courses","z1789593","Charvi123$","z1789593");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		
		$sqlquery = "select * from customer where cust_id='". $reg_id ."'; ";
		$result1 = $conn->query($sqlquery);

		if ($result1->num_rows > 0) 
		{
			$message = "User Already Exists";
		} 
		else 
		{
			 $message = "New records created successfully";
			$sqlinsert_cust = $conn->prepare("INSERT INTO customer (cust_id, password , first_name,last_name,email_address,phonenumber,address1, Zip, City, state)
			VALUES (?,?,?,?,?,?,?,?,?,?)");
			$sqlinsert_cust->bind_param("ssssssssss", $reg_id, $reg_password, $reg_firstname, $reg_lastname, $reg_email , $reg_phonenumber, $reg_address, $reg_zip, $reg_city, $reg_state);
			$sqlinsert_cust->execute();
			
			$sqlinsert_cust->close();
			
			header("Location: login.php"); 
		}
		$conn->close();
	}		
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Customer Register</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						<div id="header" class="container">

							<!-- Logo -->
								<h1><a href="../customer/login.php" id="logo">SHOPPING</a></h1>

							<!-- Nav -->
								<nav id="nav">
									<ul>
										<li><a href="../customer/login.php">Login</a></li>
										<li><a href="../customer/register.php">New Customer? Register</a></li>
										<li><a href="../customer/cart.php">Cart</a></li>
									</ul>
								</nav>

						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					<!-- Main -->
						<div id="banner-wrapper">
							<section id="banner" class="container">
								<div class="row">
									<div id="content" class="12u">

										<header class="major">
											<h2>Welcome to Shopping</h2>
											<p>New Customer. Please Register</p>
										</header>
										<form method="post" action="register.php" style="float :center;">
											<?php 
												if(!empty($message))
												{
											?>
											<div class="row 50%" style="color:black";>
														User Already Exists
											</div>
											<?php
											 }
											?>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>Name: <input type="text" name="register_id" id="register_id" placeholder="Login Id" required /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>Password: <input type="password" name="register_password" id="register_password" placeholder="Password" /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>First Name: <input type="text" name="register_firstname" id="register_firstname" placeholder="First Name" /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>Last Name: <input type="text" name="register_lastname" id="register_lastname" placeholder="Last Name" /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>Email ID:<input type="email" name="register_email" id="register_email" placeholder="Email Address" /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>Address:<input type="text" name="register_address" id="register_address" placeholder="Address" /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>City: <input type="text" name="register_city" id="register_city" placeholder="City" /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>State: <input type="text" name="register_state" id="register_state" placeholder="State" /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>Zip: <input type="text" name="register_zip" id="register_zip" placeholder="Zip" /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li>PhoneNumber:<input type="number" name="register_phonenumber" id="register_phonenumber" placeholder="Phone Number"  /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li><input type="submit" value="REGISTER" class="button alt2"></input></li>
													</ul>
												</div>
											</div>
										</form>
									</div>
									
								</div>
							</section>
						</div>

				</div>

			<!-- Copyright -->
				<div id="copyright">
					&copy; NIU. All rights reserved.
				</div>

		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>