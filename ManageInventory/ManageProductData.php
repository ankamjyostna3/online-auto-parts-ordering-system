<?php
/**
 * Controller class
 *
 * 
 */

// this class is associated with the PartDateway and Product store persistence class
include 'InventoryStore.php';
include 'PartGateway.php';
class ManageProductData {
	var $invStore;
	var $partGtwy;
	function __construct() {
		$this->invStore = new InventoryStore ();
		$this->partGtwy = new PartGateway ();
	}
	
	public function getInventory($number) {
		return $this->invStore ->getInventory( $number );
	}
	public function updateInventory($inv) {
		return $this->invStore->updateInventory($inv);
	}
	public function findParts($name) {
		return $this->partGtwy ->findParts( $name );
	}

	
	public function getAllInventory() {
		return $this->invStore->getAllInventory( );
	}
	public function getParts() {
		return $this->partGtwy->getParts ();
	}
}

?>
