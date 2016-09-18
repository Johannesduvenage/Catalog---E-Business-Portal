<?php
		error_reporting(E_ERROR);
		
		$hostname_db = "localhost";
		$username_db = "root";
		$password_db = "";

		$db_name = "catalog";
		
		//Creating Connection variable
		$conn = new mysqli($hostname_db, $username_db, $password_db);

		//Checking the connection
		if(!$conn)
			die('There was a problem while connecting to the database. Please contact the administrator');
?>