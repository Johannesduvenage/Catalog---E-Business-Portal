<?php
    require 'init.php';
    session_start();
    if(isset($_SESSION['emailID']))
    {
      if($_SESSION['emailID']!='admin@catalog.com')
        header('Location: index.php');
    }
    else
      header('Location: index.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Online Shopping: Catalog</title>
    <link rel="shortcut icon" href="images/logo.png" />

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  </head>
  <body>
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
              <a class="navbar-brand" href="index.php"><img src="images/logo.png" height=20></a>
              <a class="navbar-brand" href="index.php"><span style="font-family: Tahoma;">Catalog Kart</span></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="admin.php">Welcome <span style="color: red;">Admin!</span></a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </div>
          </div>
        </nav>
        
      </div>

      <div class="container">
        <ul class="nav nav-pills">
          <li role="presentation" class="active"><a data-toggle="tab" href="#home"><img src="images/home.png" align="middle" height="15" /> Home</a></li>
          <li role="presentation"><a data-toggle="tab" href="#accounts"><img src="images/acc.png" align="middle" height="15" /> Accounts</a></li>
          <li role="presentation"><a data-toggle="tab" href="#products"><img src="images/product.png" align="middle" height="15" /> Products</a></li>
          <li role="presentation"><a data-toggle="tab" href="#logs"><img src="images/monitor.png" align="middle" height="15" /> Logs</a></li>
          <li role="presentation"><a data-toggle="tab" href="#request"><img src="images/friend-request.png" align="middle" height="15" /> Requests</a></li>
          <li role="presentation"><a data-toggle="tab" href="#sellers"><img src="images/team.png" align="middle" height="15" /> Sellers</a></li>
          <li role="presentation"><a data-toggle="tab" href="#users"><img src="images/user.png" align="middle" height="15" /> Users</a></li>
        </ul>
      </div>
      <div class="container">
        <hr>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <center><h3>Transactions</h3></center>
            <br>
            <form action="settle.php">
            <table id="transTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                            <td>ID</td>
                            <td>User ID</td>
                            <td>Seller Name</td>
                            <td>Product Name</td>
                            <td>Product Image</td>
                            <td>Amount Paid</td>
                            <td>Time</td>
                            <td>Settle?</td>
                          
                  </tr>
              </thead>
              <tbody>
                    <?php 
                        $sql_sellers_pending = "SELECT * FROM `$db_name`.`transaction`";
                        $result_sellers_pending = mysqli_query($conn,$sql_sellers_pending); 
                          while($row = mysqli_fetch_array($result_sellers_pending))
                        {
                    ?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['email_id'];?></td>
                          <td><?php echo $row['seller_name'];?></td>
                          <td><?php echo $row['product_name'];?></td>
                          <td><img src="<?php echo "images/db_dir/".$row['product_image'];?>" width="30"></td>
                          <td><?php echo "₹".$row['price_paid'];?></td>
                          <td><?php echo $row['time']; ?></td>

                          <?php 
                                if($row['settle_status']=="Pending")
                                {
                          ?>
                                  <center><td><button type="submit" class="btn btn-warning btn-sm" name="settle" value="<?php echo $row['id']; ?>">Settle</button></td></center>
                          <?php
                                }
                                else
                                {
                          ?>
                                  <td>Settled</td>
                          <?php 
                                }
                          ?>
                        </tr>
                    <?php
                        }
                    ?>
              </tbody>
            </table>
          </form>
          </div>


          <div id="accounts" class="tab-pane fade">
            
            <div class="row">
              <div class="col-md-4 col-md-offset-4"><h3>Accounts</h3></div>
              <div class="col-md-1 col-md-offset-3"><button class="btn btn-success" onclick="printDiv('printTable')">Print</button></div>
            </div>
            <br>
            <div id="printTable">
              <table id="settleTable" class="table table-striped table-bordered" style="font-size: 12px;">
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
                        $sql_settlement = "SELECT * FROM `$db_name`.`settlement`";
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
            <center><h3>Showing All Products in Catalog</h3></center>
            <br>
            <table id="productTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                            <td>ID</td>
                            <td>Product Title</td>
                            <td>Product Desc</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Image</td>
                            <td>Seller</td>
                            <td>Time</td>
                          
                  </tr>
              </thead>
              <tbody>
                    <?php 
                        $sql_sellers_pending = "SELECT * FROM `$db_name`.`products`";
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
                          <td><img src="<?php echo "images/db_dir/".$row['upload_file'];?>" width="30"></td>
                          <td><?php echo $row['Seller_name']; ?></td>
                          <td><?php echo $row['time'];?></td>
                        </tr>
                    <?php
                        }
                    ?>
              </tbody>
            </table>
          </div>
          <div id="logs" class="tab-pane fade">
            <h3>Logs</h3>
            <table id="logsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                            <td>Token No.</td>
                            <td>Log</td>
                            <td>Time</td>
                          
                  </tr>
              </thead>  
              <tbody>
                    <?php 
                        $sql_logs = "SELECT * FROM `$db_name`.`logs`";
                        $result_logs = mysqli_query($conn,$sql_logs); 
                          while($row = mysqli_fetch_array($result_logs))
                        {
                    ?>
                        <tr>
                          <td><?php echo $row['tokenid'];?></td>
                          <td><?php echo $row['logs_text'];?></td>
                          <td><?php echo $row['timeoflog'];?></td>
                        </tr>
                    <?php
                        }
                    ?>
              </tbody>
            </table>
          </div>
          <div id="request" class="tab-pane fade">
            <form action="verifyRequest.php">
            <table id="sellerRequestTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                            <td>ID</td>
                            <td>Email Address</td>
                            <td>Seller Name</td>
                            <td>Contact Number</td>
                            <td>Address</td>
                            <td>Date of Joining</td>
                            <td>Validate?</td>
                          
                  </tr>
              </thead>
              <tbody>
                    <?php 
                        require 'init.php';
                        $sql_sellers_pending = "SELECT * FROM `$db_name`.`sellers` where status='Pending'";
                        $result_sellers_pending = mysqli_query($conn,$sql_sellers_pending); 
                          while($row = mysqli_fetch_array($result_sellers_pending))
                        {
                    ?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['email_id'];?></td>
                          <td><?php echo $row['seller_name'];?></td>
                          <td><?php echo $row['phone_number'];?></td>
                          <td><?php echo $row['address_details'];?></td>
                          <td><?php echo $row['doj'];?></td>
                          <center><td><button type="submit" class="btn btn-warning btn-sm" name="validate" value="<?php echo $row['email_id']; ?>">Validate</button></td></center>
                        </tr>
                    <?php
                        }
                    ?>
              </tbody>
            </table>
          </form>
          </div>
          <div id="sellers" class="tab-pane fade">
            <table id="sellerTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                            <td>ID</td>
                            <td>Email Address</td>
                            <td>Seller Name</td>
                            <td>Contact Number</td>
                            <td>Address</td>
                            <td>Date of Joining</td>
                          
                  </tr>
              </thead>
              <tbody>
                    <?php 
                        $sql_sellers = "SELECT * FROM `$db_name`.`sellers` where status!='Pending'";
                        $result_sellers = mysqli_query($conn,$sql_sellers); 
                          while($row = mysqli_fetch_array($result_sellers))
                        { 
                    ?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['email_id'];?></td>
                          <td><?php echo $row['seller_name'];?></td>
                          <td><?php echo $row['phone_number'];?></td>
                          <td><?php echo $row['address_details'];?></td>
                          <td><?php echo $row['doj'];?></td>
                        </tr>
                    <?php
                        }
                    ?>
              </tbody>
            </table>
          </div>
          <div id="users" class="tab-pane fade">
            <table id="usersTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                            <td>ID</td>
                            <td>Email Address</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Contact Number</td>
                            <td>Address</td>
                            <td>Date of Joining</td>
                          
                  </tr>
              </thead>
              <tbody>
                    <?php 
                        $sql_users = "SELECT * FROM `$db_name`.`users`";
                        $result_users = mysqli_query($conn,$sql_users); 
                          while($row = mysqli_fetch_array($result_users))
                        {
                    ?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['email_id'];?></td>
                          <td><?php echo $row['first_name'];?></td>
                          <td><?php echo $row['last_name'];?></td>
                          <td><?php echo $row['phone_number'];?></td>
                          <td><?php echo $row['address_details'];?></td>
                          <td><?php echo $row['doj'];?></td>
                        </tr>
                    <?php
                        }
                    ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#sellerTable').DataTable({
                  "order": [[ 5, "desc" ]]
             } );
        });
        $(document).ready(function(){
            $('#usersTable').DataTable(
              {
                  "order": [[ 5, "desc" ]]
             } );
        });
        $(document).ready(function(){
            $('#sellerRequestTable').DataTable({
                  "order": [[ 5, "desc" ]]
             } );
        });

        $(document).ready(function(){
            $('#logsTable').DataTable( {
                  "order": [[ 2, "desc" ]]
             } );
        });
        $(document).ready(function(){
            $('#transTable').DataTable( {
                  "order": [[ 7, "asc" ]]
             } );
        });
         $(document).ready(function(){
            $('#settleTable').DataTable( {
                  "order": [[ 12, "desc" ]]
             } );
        });
         $(document).ready(function(){
            $('#productTable').DataTable( {
                  "order": [[ 7, "desc" ]]
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
