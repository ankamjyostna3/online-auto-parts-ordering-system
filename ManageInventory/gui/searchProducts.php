        <div class="header">
            <h2>Search Inventory</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Enter Search Criteria</h2>
            <p>
				<form method=POST action="index.php?page=productList">
					<input type=text name=search width=10>
					<button class="btn btn-info">Type Matching words</button>
				</form>
           </p>
              
			<?php include 'php/footer.php'; ?>

       </div>
