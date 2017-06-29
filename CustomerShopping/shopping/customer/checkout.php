<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	if (!isset($_SESSION['session_cust_id']))
	{
		header("Location: customer/login.php"); 
	}
	else
	{
		$customer_id = $_SESSION['session_cust_id'];
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Cart</title>
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
								<h1><a href="home.php" id="logo">Shopping</a></h1>

							<!-- Nav -->
								<nav id="nav">
									<ul>
										<li><a href="home.php"><?php echo $_SESSION["session_cust_id"] ?></a></li>
										<li><a href="cart.php">cart</a></li>
										<li><a href="../logout.php">Logout</a></li>
									</ul>
								</nav>

						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					<!-- Main -->
						<div id="page" class="container">

							<!-- Main Heading -->
								<div class="title-heading">
								<h2>Welcome</h2>
									<p>Select Your products</p>
								</div>

							<!-- Main Content -->
								<div id="main">
									<div class="row">
										<div id="content" class="12u">
										<form action="checkout.php" method="post">
										<table>
													<tr style="margin-bottom: 15px;">
														<td>Name</td>
														<td>No of Units</td>
														<td>Cost(in $)</td>
													</tr>
										<?php
											$cart_not_empty = false;
											$conn = new mysqli("courses","z1789593","Charvi123$","z1789593");
											// Check connection
											if ($conn->connect_error) {
												die("Connection failed: " . $conn->connect_error);
											}
											$sql = "select p.id as product_id, p.name as product_name , (p.cost*c.quantity) as total_cost, p.quantity product_quantity ,c.quantity cart_quantity from cart AS c , products AS p 
												where c.customer_id='". $customer_id ."' and c.product_id=p.id";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) 
											{
												$cart_not_empty = true;
												while($row = $result->fetch_assoc()) 
												{
													?>
													<tr style="margin-bottom: 15px;">
														<td><?php echo $row["product_name"]?></td>
														<td><?php echo $row["cart_quantity"]?></td>
														<td >$<?php echo $row["total_cost"]?></td>
														
													</tr>
													
													<?php
												} 
											}
											else
											{
												$product_error_message="No products available";
											}
											$conn->close();
										?>
										</table>
											<?php if($cart_not_empty)
											{
											?>	
												<div class="row 50%" style="float: right;">
												<div class="12u">
													<ul class="actions">
														<li><input type="submit" name="payment" id="payment" value="Submit" class="button alt2"></input></li>
													</ul>
												</div>
											</div>
											<?php
											}
											?>
											
										</form>
										</div>
									</div>
								</div>
							<!-- Main Content -->

						</div>
					<!-- Main -->

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