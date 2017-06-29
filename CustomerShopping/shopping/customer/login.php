<?php
session_start();
	$loginmessage = "";
	if(isset($_POST["login_id"]))
	{ 
		$login = $_POST["login_id"];
		$password = $_POST["login_password"];
		
		$servername = "courses";
		$username = "z1789593";
		$dbname = "z1789593";
		
		// Create persistent connection connection
		$conn = new mysqli ( 'p:' . $servername, $username, "Charvi123$", $dbname );
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			print "errrrr";
		} 
		
		$sql = "select * from customer where cust_id='". $login ."' and password='".$password ."'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
			
			while($row = $result->fetch_assoc()) 
			{
				$_SESSION["session_cust_id"] = $row["cust_id"];
				$_SESSION["session_first_name"] = $row["first_name"];
				$_SESSION["session_last_name"] = $row["last_name"];
				$_SESSION["session_email_address"] = $row["email_address"];
				$_SESSION["session_phonenumber"] = $row["phonenumber"];
				$_SESSION["session_address1"] = $row["address1"];
				$_SESSION["session_Zip"] = $row["Zip"];
				$_SESSION["session_last_City"] = $row["City"];
				$_SESSION["session_last_state"] = $row["state"];
				$_SESSION["session_register_date"] = $row["register_date"];
				
			}
			header("Location: home.php"); 
		} 
		else 
		{

			$loginmessage = "No such user".$sql;
		}
		$conn->close();
	}
?><!DOCTYPE HTML>
<html>
	<head>
		<title>Customer Login</title>
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
								<h1><a href="../customer/home.php" id="logo">SHOPPING</a></h1>

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
											<p>Please login to Access your account</p>
										</header>
											<?php 
												if(!empty($loginmessage))
												{
											?>
											<div class="row 50%" style="color:black";>
														<?php echo $loginmessage;?>
											</div>
											<?php
											 }
											?>
										<form method="post" action="login.php" style="float :center;">
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li><input type="text" name="login_id" id="login_id" placeholder="Login Id" required/></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li><input type="password" name="login_password" id="login_password" placeholder="Password" required /></input></li>
													</ul>
												</div>	
											</div>
											<div class="row 50%">
												<div class="12u">
													<ul class="actions">
														<li><input type="submit" value="SUBMIT" class="button alt2"></input></li>
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

				-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>