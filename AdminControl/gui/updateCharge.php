        <div class="header">
            <h2>Update Delivery Charges Rates</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Delivery Charges Information</h2>
            <p>
				<?php
					$chr = new Charge($_POST);
					print $_SESSION['controller']->updateCharge($chr);
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div>       
    </div>
