<?php
/**
 * Controller class
 *
 */

// this class is associated with the ChargeStore 
include 'ChargeStore.php';
class ManageChargeData {
	var $chrstore;

	function __construct() {
		$this->chrstore = new ChargeStore ();
	}
	public function findCharge($name) {
		return $this->chrstore->findCharge ( $name );
	}
	public function getCharge($id) {
		return $this->chrstore->getCharge ( $id );
	}
	public function updateCharge($chr) {
		return $this->chrstore->updateCharge ( $chr );
	}
	public function getAllCharges() {
		return $this->chrstore->getAllCharges();
	}	
	public function deleteCharge($id) {
		return $this->chrstore->deleteCharge ( $id );
	}
}

?>
