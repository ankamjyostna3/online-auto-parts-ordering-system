<?php include 'php/header.php'; ?>

<!DOCTYPE html>
<html lang="en">



<body>

<div id="layout">
	
	<?php include 'php/menu.php'; ?>

    <div id="main">
		<?php
			trace(print_r($_REQUEST, true));
			if (array_key_exists('page', $_REQUEST)) {
				$page = $_GET['page'];
			} else {
				$page = 'home';
			}
			include('gui/' . $page . '.php');
        ?>
	</div>
</div>

</body>
</html>
