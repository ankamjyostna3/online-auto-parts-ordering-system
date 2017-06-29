        <div class="header">
            <h2>Required Inventory Data</h2>
        </div>

        <div class="content">
                       <p>
				<?php
					$partList = $_SESSION['controller']->findParts($_POST['search']);
					$invList = $_SESSION['controller']->getAllInventory();
					
					if(!$partList==NULL){
					print "<table border=\"1\"><tr><th>Inventory Name</th><th>Quantity</th></tr>";
					foreach ($partList as $part) {
						foreach($invList as $inv){
							
							if ($inv->number == $part->number){
							print "<tr><td>".$part->description."</td>";
							}
						}
						print "<td>&nbsp;" . $inv->count . "</td></tr>";
						
					}
					print "</table>";
					}
					else {
					print "------- No records Found to your search--------";
					
					}
					
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div>  