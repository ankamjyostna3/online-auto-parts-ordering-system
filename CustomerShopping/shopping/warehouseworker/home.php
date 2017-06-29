<?php
session_start();
?>
<!DOCTYPE HTML>
<!--
	Iconic by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html>
	<head>
		<title>Customer Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
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
										<li><a href="home.php"></a></li>
									</ul>
								</nav>

						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					<!-- Main -->
						<div id="page" class="container">

							<!-- Main Content -->
								<div id="main">
									<div class="row">

										<!-- Sidebar -->
											<div id="sidebar" class="4u 12u(narrower)">
												<section class="section-padding">
													<header>
														<h2><?php echo $_SESSION["session_first_name"] . $_SESSION["session_last_name"] ?></h2>
													</header>
													<p>This is your profile</p>
													
													<footer>
														<a href="../products/index.php" class="button small alt2">Start Shopping</a>
													</footer>
												</section>

												<section>
													
												</section>

											</div>

										<!-- Content -->
											<div id="content" class="8u 12u(narrower) important(narrower)">
												<article>
													<p>Name : </p>
													<p>Address : </p>
													<p>Email : </p>
													<p>Phone # : </p>
													<p>Date Registered : </p>
												</article>
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