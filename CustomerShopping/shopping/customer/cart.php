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
	if (isset($_POST["update"]))
	{
		$conn = new mysqli("courses","z1789593","Charvi123$","z1789593");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		foreach ($_POST as $key => $value)
		{
			if(intval($value) > 0)
			{
				$sqlinsert_cust = $conn->prepare("UPDATE cart SET quantity=? where customer_id=? and product_id =?");
				$sqlinsert_cust->bind_param("sss", $value, $customer_id, $key  ); 
				$sqlinsert_cust->execute(); 
			}
			else if(intval($value) == 0)
			{
				$sqlinsert_cust = $conn->prepare("DELETE from cart where customer_id=? and product_id =?");
				$sqlinsert_cust->bind_param("ss", $customer_id, $key  ); 
				$sqlinsert_cust->execute();
			}
		}
		$conn->close();
	}
	else if(isset($_POST["addcard"]))
	{
		header("Location: addcard.php"); 
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
								<h2>Welcome <?php echo $_SESSION["session_cust_id"] ?></h2>
									
								</div>

							<!-- Main Content -->
								<div id="main">
									<div class="row">
										<div id="content" class="12u">
										<form action="cart.php" method="post">
										<table>
													<tr style="margin-bottom: 15px;">
														<td>No of Units</td>
														<td>Name</td>
														<td>Cost(in $)</td>
													</tr>
										<?php
											$conn1 = new mysqli("courses","z1789593","Charvi123$","z1789593");
											$conn2 = new mysqli("blitz.cs.niu.edu","student","student","csci467");
											// Check connection
											if ($conn1->connect_error) {
												die("Connection failed: " . $conn1->connect_error);
											}
											if ($conn2->connect_error) {
												die("Connection failed: " . $conn2->connect_error);
											}
											$sql1 = "select * from cart where customer_id='". $customer_id ."';";
											$sql2 = "select * from parts;";
											
											$result1 = $conn1->query($sql1);
											$result2 = $conn2->query($sql2);
											if ($result1->num_rows > 0 and $result2->num_rows > 0) 
											{
												while($row1 = $result1->fetch_assoc()) 
												{
													?>
													<tr style="margin-bottom: 15px;">
														<td><?php echo $row1["product_id"]?></td>
														<td><?php 
															while($row2 = $result2->fetch_assoc()){
																echo $row1[product_id]."  ".$row2[number];
																if($row1[product_id]=$row2[number]){
																	echo $row1["description"];
																	break;
															} 
															}?></td>

														<td ><?php echo $row1["quantity"]." *  $" . $row2["price"]." = $". $row1["quantity"]*$row2["price"] ?></td>
														
													</tr>
													
													<?php
												} 
											}
											else
											{
												$product_error_message="No products available";
											}
											$conn1->close();
$conn2->close();
										?>
										</table>
											<div class="row 50%" style="float: right;">
												<div class="12u">
													<ul class="actions">
														<!--<li><input type="submit" name="update" id="update" value="Update" class="button alt2"></input></li>-->
														<li><input type="submit" name="addcard" id="addcard" value="Add Card" class="button alt2"></input></li>
													</ul>
												</div>
											</div>
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