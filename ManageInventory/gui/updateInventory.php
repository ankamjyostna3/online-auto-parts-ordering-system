        <div class="header">
            <h2>Update Inventory Data</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Inventory Information</h2>
            <p>
				<?php
					$inv = new Inventory($_POST);
					print $_SESSION['controller']->updateInventory($inv);
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div>       
    </div>