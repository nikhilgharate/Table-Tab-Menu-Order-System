<?php
Class dbObj{
	/* Database connection start */
	var $servername = "127.0.0.1:3307";
	var $username = "root";
	var $password = "";
	var $dbname = "tabeltop";
	var $conn;




	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
       
		/* check connection */
		if (mysqli_connect_errno()) {
			
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}

?>
