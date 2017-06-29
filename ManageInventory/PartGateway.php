<?php
/**
 * Boundary class to Product Database
 *
 */
class PartGateway {
	
	// create database connection
	function connect() {
		$servername = "blitz.cs.niu.edu";
		$username = "student";
		$password = "student";
		$dbname = "csci467";
		
		// Create persistent connection connection
		$conn = new mysqli ( 'p:' . $servername, $username, $password, $dbname );
		
		// Check connection
		if ($conn->connect_error) {
			die ( "Connection failed: " . $conn->connect_error );
		}
		trace ( "ProductGateway: connected successfully to: " . $conn->host_info) ;
		
		/* change character set to utf8 */
		$conn->set_charset ( "utf8" );
		return $conn;
	}
		
public function getParts() {
		$conn = $this->connect ();
		$sql = "SELECT * FROM parts;";
		trace ( $sql );
		$result = $conn->query ( $sql );
		
		$partList = array ();
		
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$partList [$row ['number']] = new Part ( $row );	
				}
		} else {
			trace ( "0 records found" );
			$partList[0]=NULL;
		}

		return $partList;
	}


public function findParts($name){
	   $conn = $this->connect ();
		
		// Collects data from "parts" table
		$sql = "SELECT * FROM parts WHERE description LIKE '%" . $name . "%';";
		trace ( $sql );
		$result = $conn->query ( $sql );
		
		$partList = array ();
		
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$partList [$row ['number']] = new Part ( $row );
			}
		} else {
			trace ( "0 charges records found" );
		}
		return $partList;
}
}
class Part {
	var $number;
	var $description;
	var $price;
	// create instance from array
	function __construct($row) {
		$this->number = $row ['number'];
		$this->description = $row ['description'];
		$this->price = $row ['price'];
	}
}
