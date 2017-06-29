        <div class="header">
            <h2>Update Inventory Count</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead"></h2>
            <p>
				<?php
					$inv = $_SESSION['controller']->getInventory($_POST['number']);
					$partList = $_SESSION['controller']->getParts();
					print "<form method=POST action=index.php?page=updateInventory>";
					print "<input type=hidden name='number' value='" . $inv->number . "'>";
					print "<table>";
					foreach($partList as $part){
					if ($part->number == $inv->number){
					print "<tr><td>Inventory Name: </td><td>".$part->description."</td></tr>";
					break;
					}
					}
					print "<tr><td>Quantity: </td><td><input type=text name=count value='" . $inv->count . "'></td></tr>";
					print "</table><p>";
					print "<button>Update</button>";
					print "</p></form>";
				?>
			</p>
			<?php include 'php/footer.php'; ?>
       </div> 