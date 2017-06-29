<?php
/**
 * Charge persistence class
 *
 */
class ChargeStore {
	
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
		trace ( "ChargeStore: connected successfully to: " . $conn->host_info );
		
		/* change character set to utf8 */
		$conn->set_charset ( "utf8" );
		return $conn;
	}
	
	// access functions
	public function findCharge($placename) {
		$conn = $this->connect ();
		
		// Collects data from "charges" table
		$sql = "SELECT * FROM charges WHERE state LIKE '%" . $placename . "%';";
		trace ( $sql );
		$result = $conn->query ( $sql );
		
		$chargeList = array ();
		
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$chargeList [$row ['zip']] = new Charge ( $row );
			}
		} else {
			trace ( "0 charges records found" );
		}
		return $chargeList;
	}

	public function getCharge($zip) {
		$conn = $this->connect ();
		// look up Charges in "charges" table
		$sql = "SELECT * FROM charges WHERE zip  = " . $zip . ";";
		trace ( $sql );
		$result = $conn->query ( $sql );
		$row = $result->fetch_assoc ();
		return new Charge ( $row );
	}

	public function getAllCharges(){
		$conn = $this->connect ();
		// look up Charges in "charges" table
		$sql = "SELECT * FROM charges;";
		trace ( $sql );
		$result = $conn->query ( $sql );
		$chargeList = array ();
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$chargeList [$row ['zip']] = new Charge ( $row );
			}
		} else {
			trace ( "0 charges records found" );
		}
		return $chargeList;
		
	}
	
		public function updateCharge($chr) {
		$conn = $this->connect ();
		// update charge in "charges" table
		$sql = "UPDATE charges SET shipping = '" . $chr->shipping . "', ";
		$sql .= "handling = '" . $chr->handling . "',";
		$sql .= "tax = '" .$chr->tax ."',";
		$sql .="extra = '" .$chr ->extra."'	WHERE zip = " . $chr->zip . ";";
		
		trace ( $sql );
		if ($conn->query ( $sql ) === TRUE) {
			return "Charges record updated successfully";
		} else {
			trace ( "Error updating record: " . $conn->error );
		}
	}
	
	
	public function deleteCharge($ChargeID) {
		$conn = $this->connect ();
		// delete Delivery Charge
		$sql = "DELETE FROM charges WHERE ChargeID = " . $ChargeID . ";";
		trace ( $sql );
		if ($conn->query ( $sql ) === TRUE) {
			return "Delivery Charge record deleted successfully";
		} else {
			trace ( "Error updating record: " . $conn->error );
		}
	}
}
class Charge {
	var $zip;
	var $state;
	var $shipping;
	var $handling;
	var $tax;
	var $extra;	
	// create Charge from array
	function __construct($row) {
		$this->zip= $row ['zip'];
		$this->state= $row ['state'];
		$this->shipping= $row ['shipping'];
		$this->handling= $row ['handling'];
		$this->tax = $row ['tax'];
		$this->extra = $row ['extra'];
	}
}
