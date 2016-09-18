<?php
    require 'init.php';
    session_start();
    if(isset($_SESSION['emailID']))
    {
      if($_SESSION['emailID']=='admin@catalog.com')
      {
      		if(isset($_GET['settle']))
      		{
      			$id_val = $_GET['settle'];
      			$fetch_id = "SELECT * FROM `$db_name`.`transaction` WHERE `id`='$id_val'";
      			$result0 = mysqli_query($conn, $fetch_id);
      			if($result0)
      			{
      					if(mysqli_num_rows($result0)==1)
      					{
      						$row = mysqli_fetch_assoc($result0);
      						$seller_name = $row['seller_name'];
      						$p_name = $row['product_name'];
      						$price = $row['price_paid'];

      						/* Actual Calculation on the price */
      							$commission_fee = $price * 0.1;
      							$shipping_fee = 30;
      							$collection_fee = 0.025 * $price;
      							if($collection_fee<20)
      								$collection_fee = 20;
      							$fixed_fee = 30;

      							$marketplace_fee = $commission_fee + $shipping_fee + $collection_fee + $fixed_fee;
      							$serviceTax = 0.15 * $marketplace_fee;

      							$total_deduction = $marketplace_fee + $serviceTax;
      							$settlement_value = $price - $total_deduction;
      						// End of calculation

      							$sql_insert = "INSERT INTO `$db_name`.`settlement`(`seller_name`,`product_name`,`amount`,`commission`,`shipping`,`collection`,`fixed_fee`,`marketplace`,`service`,`total_ded`,`settle_value`) VALUES('$seller_name','$p_name','$price','$commission_fee','$shipping_fee','$collection_fee','$fixed_fee','$marketplace_fee','$serviceTax','$total_deduction','$settlement_value')";

      							$result1 = mysqli_query($conn, $sql_insert);
      							if($result1)
      							{
      								$sql_update = "UPDATE `$db_name`.`transaction` SET `settle_status` = 'Settled' WHERE `id` = '$id_val'";
      								$result2 = mysqli_query($conn, $sql_update);
      								if($result2)
      								{
      									header("Location: admin.php");
      								}
      								else
      									echo "Error in updating the settlement";
      							}
      							else
      								echo "Error in calculation";
      					}
      					else
      						echo "More than one product found with the same id";
      			}
      			else
      				echo "Error in fetching the product";
      		}
      }
      else
        header('Location: index.php');

    }
    else
      header('Location: index.php')
?>