<?php
		session_start();
		require 'init.php';
		if(isset($_SESSION['emailID']))
		{
			if(isset($_GET['productID']))
			{
				$get_id = $_GET['productID'];

				$fetching_query = "SELECT * FROM `$db_name`.`products` WHERE `id`='$get_id'";
				$result0 = mysqli_query($conn, $fetching_query);
				if($result0)
				{
					if(mysqli_num_rows($result0)==1)
					{
						$row = mysqli_fetch_assoc($result0);
						$buyer_id = $_SESSION['emailID'];
						$product_name = $row['product_title'];
						$product_desc = $row['product_desc'];
						$product_value = $row['product_price'];
						$seller_name = $row['Seller_name'];
						$image_file = $row['upload_file'];

						$updating_cart = "INSERT INTO `$db_name`.`cart`(`buyer_id`,`product_name`,`product_value`,`seller_name`,`product_desc`,`product_image`) VALUES('$buyer_id','$product_name','$product_value','$seller_name','$product_desc','$image_file')";
						$result1 = mysqli_query($conn, $updating_cart);
						if($result1)
						{
							header("location: index.php");
						}
						else
							echo "Error in updating the cart ";
						
					}
					else
						echo "Toomany products to fetch.";
				}
				else
					echo "Something went wrong in fetching the product.";
			}
			else
				header("location: index.php");
		}
		else
			header("location: index.php");
?>