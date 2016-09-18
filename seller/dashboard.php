<?php
    require '../init.php';
    session_start();
    if(!isset($_SESSION['emailID']))
    {
        header('Location: index.php');
    }

    $user_id = $_SESSION['emailID'];
    $seller_id = $_SESSION['sellername'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Online Shopping: Catalog</title>
    <style>
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(../images/loading.gif) center no-repeat #fff;
            }
    </style>
    <link rel="shortcut icon" href="../images/logo.png" />

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <script src="../js/jquery.min.js"></script>

    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script>
            //paste this code under head tag or in a seperate js file.
            // Wait for window load
            $(window).load(function() {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });
    </script>
  </head>
  <body style="font-family: Open Sans;">
    <div class="se-pre-con"></div>
    <div class="container">
        <nav class="navbar navbar-default" style="background-color: white;">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="../index.php"><img src="../images/logo.png" height=20></a>
              <a class="navbar-brand" href="../index.php"><span style="font-family: Tahoma;">Catalog Kart</span></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.php">Welcome <span style="color: red;"><?php echo $_SESSION['emailID']; ?>!</span></a></li>
                <li><a href="../logout.php">Log Out</a></li>
              </ul>
            </div>
          </div>
        </nav>
        
      </div>

      <div class="container">
        <ul class="nav nav-pills">
          <li role="presentation" class="active"><a data-toggle="tab" href="#home"><img src="../images/home.png" align="middle" height="15" /> Home</a></li>
          <li role="presentation"><a data-toggle="tab" href="#products"><img src="../images/product.png" align="middle" height="15" /> Products</a></li>
          <li role="presentation"><a data-toggle="tab" href="#uploads"><img src="../images/monitor.png" align="middle" height="15" /> Uploads</a></li>
          <li role="presentation"><a data-toggle="tab" href="#logs"><img src="../images/friend-request.png" align="middle" height="15" /> Logs</a></li>
        </ul>
      </div>
      <div class="container">
        <hr>
        <div class="tab-content">

          <div id="home" class="tab-pane fade in active">
            
            <div class="row">
              <div class="col-md-4 col-md-offset-4"><h3>Settlement : <?php echo $seller_id; ?></h3></div>
              <div class="col-md-1 col-md-offset-3"><button class="btn btn-success" onclick="printDiv('printTable')">Print</button></div>
            </div>
            <br>
            
            <div id="printTable">
              <table id="settleTable" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size: 12px;">
              <thead>
                <tr>
                            <td>ID</td>
                            <td>Seller Name</td>
                            <td>Product</td>
                            <td>Amount</td>
                            <td>Commission</td>
                            <td>Shipping</td>
                            <td>Collection Fee</td>
                            <td>Fixed Fee</td>
                            <td>MarketPlace Fee</td>
                            <td>Service Tax</td>
                            <td>Total Deduction</td>
                            <td>Settlement Value</td>
                            <td>Time</td>
                          
                  </tr>
              </thead>
              <tbody>
                    <?php 
                        $sql_settlement = "SELECT * FROM `$db_name`.`settlement` where `seller_name`='$seller_id'";
                        $result_settlement = mysqli_query($conn,$sql_settlement); 
                          while($row = mysqli_fetch_array($result_settlement))
                        {
                    ?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['seller_name'];?></td>
                          <td><?php echo $row['product_name'];?></td>
                          <td><?php echo "₹".$row['amount'];?></td>
                          <td><?php echo "₹".$row['commission'];?></td>
                          <td><?php echo "₹".$row['shipping'];?></td>
                          <td><?php echo "₹".$row['collection'];?></td>
                          <td><?php echo "₹".$row['fixed_fee'];?></td>
                          <td><?php echo "₹".$row['marketplace'];?></td>
                          <td><?php echo "₹".$row['service'];?></td>
                          <td><center><span style="background-color: yellow; color: green;padding: 10px;"><b><?php echo "₹".$row['total_ded'];?></b></span></center></td>
                          <td><center><span style="background-color: yellow; color: red; padding: 10px;"><b><?php echo "₹".$row['settle_value'];?></b></span></center></td>
                          <td><?php echo $row['time'];?></td>
                        </tr>
                    <?php
                        }
                    ?>
              </tbody>
            </table>
            </div>

          </div>

          <div id="products" class="tab-pane fade">
            <center><h3>Showing products uploaded by : <?php echo $seller_id; ?></h3></center>
            
            <br>
            <table id="homeTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                            <td>ID</td>
                            <td>Product Title</td>
                            <td>Product Desc</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Image</td>
                            <td>Time</td>
                          
                  </tr>
              </thead>
              <tbody>
                    <?php 
                        $sql_sellers_pending = "SELECT * FROM `$db_name`.`products` where `Seller_name` = '$seller_id'";
                        $result_sellers_pending = mysqli_query($conn,$sql_sellers_pending); 
                          while($row = mysqli_fetch_array($result_sellers_pending))
                        {
                    ?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['product_title'];?></td>
                          <td><?php echo $row['product_desc'];?></td>
                          <td><?php echo "₹".$row['product_price'];?></td>
                          <td><?php echo $row['quantity'];?></td>
                          <td><img src="<?php echo "../images/db_dir/".$row['upload_file'];?>" width="30"></td>
                          <td><?php echo $row['time'];?></td>
                        </tr>
                    <?php
                        }
                    ?>
              </tbody>
            </table>

          </div>
          <div id="uploads" class="tab-pane fade">

            <?php
                require '../init.php';
                $sql_check = "SELECT * FROM `$db_name`.`sellers` WHERE `email_id`='$user_id'";
                $result_check = mysqli_query($conn, $sql_check);
                if($result_check)
                {
                    if(mysqli_num_rows($result_check)==1)
                    {
                        $row = mysqli_fetch_assoc($result_check);
                        if($row['status']=='Pending')
                          echo "<center><h4>You're not allowed to upload until the administrator validates you as a seller. Please wait.</h4></center>";
                        else
                        {
              ?>
                        <h3>Uploads</h3>
                        <div class="jumbotron">
                          <h3><center>Upload Form.</center></h3>
                          <hr>
                          <form action="upload.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control" id="emailid" value="<?php echo $user_id; ?>" name="emailid" placeholder="<?php echo $user_id; ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Seller Name</label>
                              <input type="text" class="form-control" id="sellername" value="<?php echo $seller_id; ?>" name="sellername" placeholder="<?php echo $seller_id; ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="ProductTitle">Product Name</label>
                              <input type="text" class="form-control" id="productTitle" name="productTitle" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                              <label for="ProductDesc">Product Description</label>
                              <input type="text" class="form-control" id="productDesc" name="productDesc" placeholder="Enter Product Description">
                            </div>
                            <div class="form-group">
                              <label for="ProductPrice">Product Price</label>
                              <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter Product Price">
                            </div>
                            <div class="form-group">
                              <label for="ProductPrice">Product Quantity</label>
                              <input type="number" class="form-control" id="productQuantity" name="productQuantity" placeholder="Enter Product Quantity">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputFile">Image input</label>
                              <input type="file" id="fileToUpload" name="fileToUpload">
                            </div>
                            <input type="submit" class="btn btn-default" value="Upload" name="Upload" id="Upload">
                          </form>
                        </div>
              <?php 
                        }
                    }
                    else
                      echo "More than one user found. Error Error.";
                }
                else
                  echo "Somthing went wrong in checking the user in the database";
            ?>
            
            
          </div>
          <div id="logs" class="tab-pane fade">
            <center>Showing logs for : <?php echo $user_id; ?></center>
            <br>
            <table id="logsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                            <td>ID</td>
                            <td>Log</td>
                            <td>Time</td>
                          
                  </tr>
              </thead>
              <tbody>
                    <?php 
                        $sql_sellers_pending = "SELECT * FROM `$db_name`.sellerlogs where email_id = '$user_id'";
                        $result_sellers_pending = mysqli_query($conn,$sql_sellers_pending); 
                          while($row = mysqli_fetch_array($result_sellers_pending))
                        {
                    ?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['log_text'];?></td>
                          <td><?php echo $row['time'];?></td>
                        </tr>
                    <?php
                        }
                    ?>
              </tbody>
            </table>
          </div>
          
        </div>
      </div>

    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#logsTable').DataTable( {
                  "order": [[ 2, "desc" ]]
             } );
        });
        $(document).ready(function(){
            $('#homeTable').DataTable( {
                  "order": [[ 6, "desc" ]]
             } );
        });
        $(document).ready(function(){
            $('#settleTable').DataTable( {
                  "order": [[ 12, "desc" ]]
             } );
        });

        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;

             document.body.innerHTML = printContents;

             window.print();

             document.body.innerHTML = originalContents;
        }
    </script>
  </body>
</html>
