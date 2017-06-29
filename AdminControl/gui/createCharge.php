        <div class="header">
            <h2>Create new type of Charge</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Charge Information</h2>
            <p>
				<?php
					
					print "<form method=POST action=index.php?page=updateCharge>";
					print "<input type=hidden name='ChargeID' value='-1'>";
					print "<table>";
					print "<tr><td>Charge Name: </td><td><input type=text required name=ChargeName value=''></td></tr>";
					print "<tr><td>Amount: </td><td><input type=text required name=amount value=''></td></tr>";
					print "</table><p>";
					print "<button>Update</button>";
					print "</p></form>";
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div>       
