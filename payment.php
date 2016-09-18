<?php
    session_start();
    require 'init.php';
    if(isset($_SESSION['emailID']))
    {
        $flag = false;
    	//Taking the cart details from user
    	$val = $_GET['paymentConfirm'];
    	//Fetching all the values of the products from cart table
    	$fetch_from_cart = "SELECT * FROM `$db_name`.`cart` WHERE `buyer_id`='$val'";
    	$result0 = mysqli_query($conn, $fetch_from_cart);
    	if($result0)
    	{
            $flag = false;
    		while($row = mysqli_fetch_assoc($result0))
    		{
    			$id = $row['id'];
    			$buyer = $row['buyer_id'];
    			$p_name = $row['product_name'];
    			$p_value = $row['product_value'];
    			$s_name = $row['seller_name'];
    			$p_image = $row['product_image'];

    			$insert_transc = "INSERT INTO `$db_name`.`transaction`(`email_id`,`seller_name`,`product_name`,`product_image`,`price_paid`,`settle_status`) VALUES('$buyer','$s_name','$p_name','$p_image','$p_value','Pending')";
    			$result1 = mysqli_query($conn, $insert_transc);
    			if($result1)
    			{
    				$update_quantity = "UPDATE `$db_name`.`products` SET `quantity` = `quantity` - 1 WHERE `product_title`='$p_name' and `quantity` > 0";
    				$result2 = mysqli_query($conn, $update_quantity);
    				if($result2)
    				{
    					$text = "Product Bought : " . $p_name . " by " . $_SESSION['emailID'];
    						$update_logs = "INSERT INTO `$db_name`.`logs`(`logs_text`) VALUES('$text')";
    						$result3 = mysqli_query($conn, $update_logs);
    						if($result3)
    						{
    							$clear_cart = "DELETE FROM `$db_name`.`cart` WHERE `id`='$id'";
    							$result4 = mysqli_query($conn, $clear_cart);
    							if($result4)
    							{
    								$flag = true;
    							}
    							else
                                {
                                    $flag = false;
    								echo "Error in clearing cart";
                                }
    						}
    						else
                            {
                                $flag = false;
    							echo "Error updating the logs table";
                            }
    				}
    				else
    					header("location: soldout.php");
    			}
    			else
    				echo "Error inserting values in transaction table";
    		}
            if($flag == true)
            {
                header("location: thankyou.php");
            }
            else
                echo "Something went wrong. Stop";
    	}
    	else
    		echo "Error fetching values from cart";
    	//Delete the rows from the cart table
    	//Updating the logs table
    }
    else
      header("Location: index.php");
?>