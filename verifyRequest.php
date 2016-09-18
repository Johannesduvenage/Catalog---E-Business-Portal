<?php
	require 'init.php';
    session_start();
    if(isset($_SESSION['emailID'])&&isset($_GET['validate']))
    {
      	if($_SESSION['emailID']!='admin@catalog.com')
        	header('Location: index.php');
		else
		{
			$user_id = $_GET['validate'];
			$verify_query = "UPDATE `$db_name`.`sellers` SET `status`='Confirmed' WHERE `email_id`='$user_id'";
			$result = mysqli_query($conn, $verify_query);
			if($result)
			{
				header("location: admin.php");
			}
			else
				echo "Error in updating the status of the seller";
		}
    }
    else
      header('Location: index.php')
?>