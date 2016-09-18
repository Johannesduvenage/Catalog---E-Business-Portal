<?php

	session_start();
	require 'init.php';

	if(isset($_GET['login1']))
	{
		$username = $_GET['email1'];
		$password = $_GET['pass1'];

		$query_login = "SELECT * FROM `$db_name`.`users` WHERE `email_id`='$username' AND `pass_key`='$password'";
		
		$result = mysqli_query($conn, $query_login);

		if(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION['firstname'] = $row['first_name'];
			$_SESSION['lastname'] = $row['last_name'];
			$_SESSION['emailID'] = $row['email_id'];

			if($username == "admin@catalog.com")
				header('Location: admin.php');
			else
				header('Location: index.php');
		}
		else
			echo "failed_user_login";
	}
	else if(isset($_GET['login_seller']))
	{
		$username = $_GET['email1'];
		$password = $_GET['pass1'];

		$query_login = "SELECT * FROM `$db_name`.`sellers` WHERE `email_id`='$username' AND `pass_key`='$password'";
		
		$result = mysqli_query($conn, $query_login);

		if(mysqli_num_rows($result) == 1)
		{
			$log_text = "Logged in";
            $log_login = "INSERT INTO `$db_name`.`sellerlogs`(`email_id`,`log_text`) values('$username','$log_text')";
            $result0 = mysqli_query($conn, $log_login);
            if($result0)
            {
				$row = mysqli_fetch_assoc($result);
				$_SESSION['sellername'] = $row['seller_name'];
				$_SESSION['emailID'] = $row['email_id'];
				header('Location: seller/dashboard.php');
			}
			else
				echo "Failed in logs";	
		}
		else
			echo "failed_seller_login";
	}

?>