   <div class="header">
            <h2>Edit Delivery Charges</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Select to edit</h2>
            <p>
				<?php
					$chargeList = $_SESSION['controller']->findCharge($_POST['search']);
					print "<table ><tr><th>select&nbsp&nbsp</th><th>Zip &nbsp &nbsp &nbsp</th><th>Place&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp</th><th>Shipping &nbsp &nbsp &nbsp</th><th>Handling &nbsp &nbsp &nbsp</th><th>Tax &nbsp &nbsp &nbsp</th><th>Extra &nbsp &nbsp &nbsp</th></tr>";
					foreach ($chargeList as $chr) {
						print "<tr><td><form method=POST action=index.php?page=editCharge>";
						print "<button name='zip' value='" . $chr->zip . "'>Edit</button></form></td>";
						print "<td>" . $chr->zip . "&nbsp &nbsp&nbsp &nbsp</td>";
					    print "<td>&nbsp;" . $chr->state . "&nbsp &nbsp&nbsp &nbsp&nbsp</td>";
					    print "<td>&nbsp;" . $chr->shipping . "</td>";
					    print "<td>&nbsp;" . $chr->handling . "</td>";
					    print "<td>&nbsp;" . $chr->tax . "</td>";
					    print "<td>&nbsp;" . $chr->extra . "</td></tr>";
					}
					print "</table>";
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div>       
	