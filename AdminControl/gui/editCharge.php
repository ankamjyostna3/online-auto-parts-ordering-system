  <div class="content">
            <h2 class="content-subhead">Delivery Charges Information</h2>
            <p>
				<?php
					$chr = $_SESSION['controller']->getCharge($_POST['zip']);
					print "<form method=POST action=index.php?page=updateCharge>";
					print "<input type=hidden name='zip' value='" . $chr->zip . "'>";
					print "<table>";
					print "<tr><td>Zip Code: </td><td> ". $chr->zip ." </td></tr>";
					print "<tr><td>Zone: </td><td> ". $chr->state . "</td></tr>";
					print "<tr><td>Shipping: </td><td><input type=text name=shipping value='" . $chr->shipping . "'></td></tr>";
					print "<tr><td>Handling: </td><td><input type=text name=handling value='" . $chr->handling . "'></td></tr>";
					print "<tr><td>tax: </td><td><input type=text name=tax value='" . $chr->tax . "'></td></tr>";
					print "<tr><td>extra: </td><td><input type=text name=extra value='" . $chr->extra . "'></td></tr>";
					print "</table><p>";
					print "<button>Update</button>";
					print "</p></form>";
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div> 