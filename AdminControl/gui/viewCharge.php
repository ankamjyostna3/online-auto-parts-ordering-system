        <div class="header">
            <h2>View Existing Delivery charges</h2>
        </div>

        <div class="content">

            <p>
				<?php
					$chrList = $_SESSION['controller']->getAllCharges();
					print "<table ><tr><th>Zip &nbsp &nbsp &nbsp</th><th>Place&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp</th><th>Shipping &nbsp &nbsp &nbsp</th><th>Handling &nbsp &nbsp &nbsp</th><th>Tax &nbsp &nbsp &nbsp</th><th>Extra &nbsp &nbsp &nbsp</th></tr>";
					foreach ($chrList as $chr) 
					{
					print "<tr><td>" . $chr->zip . "&nbsp &nbsp&nbsp &nbsp</td>";
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

	