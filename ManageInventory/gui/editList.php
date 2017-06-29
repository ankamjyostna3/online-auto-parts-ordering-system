  <div class="header">
            <h2>Edit Inventory Count</h2>
        </div>

        <div class="content">

           <p>
				<?php
					$partList = $_SESSION['controller']->findParts($_POST['search']);
					$invList = $_SESSION['controller']->getAllInventory();
					print "<div class=\"container\">";
					print "<table class=\"table table-nonfluid\"><tr><th>Select</th><th>Inventory Name &nbsp &nbsp &nbsp</th><th>Inventory Count</th></tr>";
					foreach ($partList as $part) 
					{	
					foreach($invList as $inv){
					if ($part->number == $inv->number){
					print "<tr><td><form method=POST action=index.php?page=editInventory>";
					print "<button name='number' value='" . $inv->number . "'>Edit</button></form></td>";
					print "<td>".$part->description."</td>";
					print "<td>".$inv->count."</td></tr>";
					break;
					}
					}
					}
					print "</table>";
				
				?>
           </p>              
			<?php include 'php/footer.php'; ?>

       </div>
