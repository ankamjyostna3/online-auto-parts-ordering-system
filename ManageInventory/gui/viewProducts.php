        <div class="header">
            <h2>View Existing Inventory</h2>
        </div>

        <div class="content">

           <p>
				<?php
					$partList = $_SESSION['controller']->getParts();
					$invList = $_SESSION['controller']->getAllInventory();
					print "<div class=\"container\">";
					print "<table class=\"table table-nonfluid\"><tr><th>Inventory Name &nbsp &nbsp &nbsp</th><th>Inventory Count</th></tr>";
					foreach ($invList as $inv) 
					{
					foreach($partList as $part){
					if ($part->number == $inv->number){
					print "<tr><td>".$part->description."</td>";
					break;
					}
					}
					
					print "<td>&nbsp;" . $inv->count . "</td></tr>";
					}
					print "</table>";
				
				?>
           </p>              
			<?php include 'php/footer.php'; ?>

       </div>

	