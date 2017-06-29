<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Cart Details</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						<div id="header" class="container">

							<!-- Logo -->
								<h1><a href="index.html" id="logo">Shopping</a></h1>

							<!-- Nav -->
								<nav id="nav">
									<ul>
										<li><a href="../customer/home.php"><?php echo $_SESSION["session_cust_id"] ?></a></li>
										<li><a href="../customer/cart.php">cart</a></li>
										<li><a href="../logout.php">Logout</a></li>
									</ul>
								</nav>

						</div>

				</div>

			<!-- Main Wrapper --><div id="main-wrapper">
					<?php


						if (!isset($_SESSION['session_cust_id']))
							{
								header("Location: login.php"); 
							}
						else if (isset($_POST["submit"]))
							{
								
								$conn = new mysqli("courses","z1789593","Charvi123$","z1789593");
								// Check connection
								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}
								$customer_id = $_SESSION['session_cust_id'];

								foreach ($_POST as $key => $value)
								{
									if(intval($value) > 0)
									{
										
										print $customer_id."key". $key." value: ".  $value ; 
											
									}
								}
								foreach ($_POST as $key => $value)
								{
										if(intval($value) > 0)
										{
											
											$sqlinsert_cust = $conn->prepare("INSERT INTO cart (customer_id, product_id, quantity) VALUES (?,?,?)");
											$sqlinsert_cust->bind_param("sss", $customer_id, $key, $value ); 
											$sqlinsert_cust->execute(); 
										}
								}
										$conn->close();
							}
											
		
?>
<!-- Main Content -->
								<div id="main">
									<div class="row">
										<div id="content" class="12u">
										
										<table>
													<tr style="margin-bottom: 15px;">
														<td><h3><b>Please view cart for your placed orders</b></h3></td>
														
													</tr>
										</table>
											
										</div>
									</div>
								</div>
									</div>

			<!-- Copyright -->
				<div id="copyright">
					&copy; NIU. All rights reserved.
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>