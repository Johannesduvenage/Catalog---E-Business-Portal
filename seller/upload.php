<?php
		require '../init.php';

		if(isset($_POST['Upload']))
		{
			$target_dir = "../images/db_dir/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} 
			else 
			{
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
			    {
			    		$user_name = $_POST['sellername'];
			    		$user_email = $_POST['emailid'];
			    		$product_title= $_POST['productTitle'];
			    		$product_desc= $_POST['productDesc'];
			    		$product_price= $_POST['productPrice'];
			    		$product_quantity = $_POST['productQuantity'];

			    		$log_text = "New Product from Seller: " . $user_name ." : " . $product_title . " added. Quantity : " . $product_quantity . " & Price : Rs." . $product_price;

			    		$log_seller = "INSERT INTO `$db_name`.`sellerlogs`(`email_id`,`log_text`) values('$user_email','$log_text')";
			    		$log_admin = "INSERT INTO `$db_name`.`logs`(`logs_text`) values('$log_text')";
			            $result0 = mysqli_query($conn, $log_seller);
			            $result1 = mysqli_query($conn, $log_admin);
			            if($result0&&$result1)
			            {
			            	$target_url = basename($_FILES["fileToUpload"]["name"]);
			            	$insert_sql = "INSERT INTO `$db_name`.`products`(`Seller_name`,`product_title`,`product_desc`,`product_price`,`quantity`,`upload_file`) values('$user_name','$product_title','$product_desc','$product_price','$product_quantity','$target_url')";
			            	$result_insert = mysqli_query($conn, $insert_sql);
			            	if($result_insert)
								header('Location: dashboard.php#logs');
							else
								echo "Error in inserting";
						}
						else
							echo "Error in logs";

			    } 
			    else 
			    {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
		}
		
?>