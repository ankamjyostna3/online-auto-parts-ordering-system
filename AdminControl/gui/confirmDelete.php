        <div class="header">
            <h2>Delete Delivery Charge Type</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Charge Information</h2>
            <p>
				<?php
					$chr = $_SESSION['controller']->getCharge($_POST['ChargeID']);
					print "<form method=POST action=index.php?page=deleteCharge>";
					print "<input type=hidden name='ChargeID' value='" . $chr->ChargeID . "'>";
					print "<input type=text readonly name=ChargeName value='" . $chr->ChargeName . "'><br>";
					print "<input type=text readonly name=amount value='" . $chr->amount . "'><p>";
					print "<button>Confirm Delete</button>";
					print "</form>";
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div>       
