        <div class="header">
            <h2>Delete Delivery Charge Type</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Delivery Charges Information</h2>
            <p>
				<?php
					print $_SESSION['controller']->deleteCharge($_POST['ChargeID']);
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div>       
