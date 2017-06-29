<?php
/**
 * InventortStore persistence class
 *

 */
class InventoryStore {
	
	// database connection info
	function connect() {
		$servername = "courses";
		$username = "z1789593";
		$password = "Charvi123$";
		$dbname = "z1789593";
		
		// Create persistent connection connection
		$conn = new mysqli ( 'p:' . $servername, $username, $password, $dbname );
		
		// Check connection
		if ($conn->connect_error) {
			die ( "Connection failed: " . $conn->connect_error );
		}
		trace ( "InventoryStore: connected successfully to: " . $conn->host_info );
		
		/* change character set to utf8 */
		$conn->set_charset ( "utf8" );
		return $conn;
	}
	
	// access functions
	public function getInventory($number) {
		$conn = $this->connect ();
		// look up Inventory in "Inventory Products" table
		$sql = "SELECT * FROM InventoryProducts WHERE number = " . $number . ";";
		trace ( $sql );
		$result = $conn->query ( $sql );
		if($result){
		$row = $result->fetch_assoc ();
		return new Inventory ( $row );
		}
		else return null;
	}



	
	public function updateInventory($inv) {
		$conn = $this->connect ();
			// update Inventory in "InventoryProducts" table
		$sql = "UPDATE InventoryProducts SET count = '" . $inv->count . "' WHERE number = " . $inv->number . ";";
		trace ( $sql );
		if ($conn->query ( $sql ) === TRUE) {
			return "Quantity updated successfully with count ".$inv->count;
		} else {
			trace ( "Error updating record: " . $conn->error );
		}
	}
	
	public function getAllInventory(){
		$conn = $this->connect ();
		// look up Inventory in "InventoryProducts" table
		$sql = "SELECT * FROM InventoryProducts;";
		trace ( $sql );
		$result = $conn->query ( $sql );
		$invList = array ();
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$invList [$row ['number']] = new Inventory ( $row );
			}
		} else {
			trace ( "0 charges records found" );
		}
		return $invList;
		
	}
}
	
class Inventory {
	var $number;
	var $count;
	function __construct($row) {
		$this->number = $row ['number'];
		$this->count = $row ['count'];
		}
}
