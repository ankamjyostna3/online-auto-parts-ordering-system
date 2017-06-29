
<!DOCTYPE HTML>
<html>
	<head>
		<title>Products Home</title>
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
										<form action="cart.php" method="post">
										<table>
													<tr style="margin-bottom: 15px;">
														<td><b>Inventory Name</b></td>
														<td><b>Available Units</b></td>
														<td><b>Cost in ( $ )</b></td>
														<td><b>Required units</b> </td>
													</tr>
										<?php
											$conn1 = new mysqli("blitz.cs.niu.edu","student","student","csci467");
											$conn2 = new mysqli("courses","z1789593","Charvi123$","z1789593");
											// Check connection
											if ($conn1->connect_error) {
												die("Connection failed: " . $conn->connect_error);
												print "failed to connect blitz";
											}
											if ($conn2->connect_error) {
												die("Connection failed: " . $conn->connect_error);
												print "failed to connect local DB";
											}
											$sql1 = "select * from parts";
											$sql2 = "select * from InventoryProducts";
											$result1 = $conn1->query($sql1);
											$result2 = $conn2->query($sql2);
											if ($result1->num_rows > 0 and $result2->num_rows > 0) 
											{
												
												
												while($row1 = $result1->fetch_assoc()) 
												{
													?>
													<tr style="margin-bottom: 15px;">
														<td><?php echo $row1["description"]?></td>
														<td><?php 
															while($row2 = $result2->fetch_assoc()){
																if($row1[number]=$row2[number]){
																	echo $row2["count"];
																	break;
															} 
															}?></td>
															
														<td>$<?php echo $row1["price"]?></td>
														<td class="1u"><input type="number" name="<?php echo $row2["number"]?>" id="<?php echo $row2["number"] ?>" placeholder="0" min="0" max="<?php echo $row2["count"]?>"/></td>
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
														<li><input type="submit" name="submit" id="submit" value="Add to Cart" class="button alt2"></input></li>
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