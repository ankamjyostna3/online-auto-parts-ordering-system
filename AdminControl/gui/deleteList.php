        <div class="header">
            <h2>Delete Delivery Charge Date</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Select Charge type to Delete</h2>
            <p>
				<?php
					$chrList = $_SESSION['controller']->findCharge($_POST['search']);
					print "<table><tr><th>select</th><th>Name</th><th>Address</th></tr>";
					foreach ($chrList as $chr) {
						print "<tr><td><form method=POST action=index.php?page=confirmDelete>";
						print "<button name='ChargeID' value='" . $chr->ChargeID . "'>Delete</button></form></td>";
						print "<td>&nbsp;" . $chr->ChargeName . "</td>";
						print "<td>&nbsp;" . $chr->amount . "</td></tr>";
					}
					print "</table>";
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div>       
