<?php
    session_start();
    if(isset($_SESSION['emailID']))
    {
        $user_name_first = $_SESSION['firstname'];
        $user_name_last = $_SESSION['lastname'];
        $user_email = $_SESSION['emailID'];
    }
    else
      header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Shopping: Catalog</title>
    <link rel="shortcut icon" href="images/logo.png" />

    <style>
        *{
          font-family: Open Sans, Tahoma;
        }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(images/loading.gif) center no-repeat #fff;
            }
    </style>
    <script src="js/jquery.min.js"></script>
    <script>
            //paste this code under head tag or in a seperate js file.
            // Wait for window load
            $(window).load(function() {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });
    </script>


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="font-family: Open Sans, Tahoma">
    <div class="se-pre-con"></div>
    <div class="container">
      <nav class="navbar navbar-default" style="background-color: white;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
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

        <?php
              if(!isset($user_email))
              {
        ?>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li style="margin: -3%;"><a href="seller/index.php"><button type="button" class="btn btn-default">Click Here if you're a Seller</button></a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
                    <ul class="dropdown-menu" style="padding: 15px; height:450%; width: 650%;border-radius: 7px;">
                      <br>
                      <form action="validate.php" method="GET">
                      <li>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" name="email1" id="email1" placeholder="Email" required>
                        </div>
                      </li>
                      <li>
                          <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password" required>
                        </div>
                      </li>
                      <li><center><input type="submit" class="btn btn-default" id="login1" name="login1" value="Login!"></center></li>
                    </ul>
                  </form>
                  </li>

                  <li><a href="register.php">Register</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-th"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">About Catalog</a></li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-collapse -->

        <?php
              }
              else
              {
                ?>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="history.php"><img src="images/acc.png" width="20" data-placement="left"  data-toggle="tooltip" title="Orders"></a></li>
                          <li><a href="mycart.php"><span class="glyphicon glyphicon-shopping-cart" ><span class="badge" style="background-color: red;"><?php
                                    require 'init.php'; 
                                    $id = "";
                                    if(isset($user_email)) 
                                      $id = $user_email;
                                    else
                                      $id = $_SESSION['emailID'];

                                    $get_cart_details = "SELECT * FROM `$db_name`.`cart` WHERE `buyer_id`='$id'";
                                    $result = mysqli_query($conn, $get_cart_details);
                                    if($result)
                                    {
                                      $count = mysqli_num_rows($result);
                                      echo $count;
                                    }
                                    else
                                      echo "-1";

                           ?></span></span></a></li>
                          <li><a href="index.php" data-placement="bottom"  data-toggle="tooltip" title="<?php echo $user_email; ?>">Welcome <?php if(isset($user_name_first)) echo $user_name_first; ?></a></li>
                          <li><a href="logout.php" data-placement="bottom"  data-toggle="tooltip" title="Log Out">Log Out</a></li>
                        </ul>
                      </div><!-- /.navbar-collapse -->
          <?php
              }
          ?>
      </div><!-- /.container-fluid -->
    </nav>
  </div>
      <!-- Cart Panel -->
        <div class="container">
          <div class="panel panel-primary">
            <div class="panel-heading"><center><img src="images/logo.png" width="25"> &nbsp;My Orders</center></div>

            <?php 

                                    $id = "";
                                    if(isset($user_email)) 
                                      $id = $user_email;
                                    else
                                      $id = $_SESSION['emailID'];

                                    $get_orders = "SELECT * FROM `$db_name`.`transaction` WHERE `email_id`='$id'";
                                    $result = mysqli_query($conn, $get_orders);
                                    
                                    if($result)
                                    {
                                      if(mysqli_num_rows($result)>0)
                                      {
                                        $count = 1;
              ?>
                                          <table id="orderTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                              <tr>
                                                          <td>ID</td>
                                                          <td>Product Title</td>
                                                          <td>Image</td>
                                                          <td>Price</td>
                                                          <td>Seller Name</td>
                                                          <td>Time</td>
                                                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                                  <?php  
                                                        while($row = mysqli_fetch_array($result))
                                                      {
                                                  ?>
                                                            <tr>
                                                              <td><?php echo $count++; ?></td>
                                                              <td><?php echo $row['product_name'];?></td>
                                                              <td><img src="<?php echo "images/db_dir/".$row['product_image']; ?>" width="30"></td>
                                                              <td><?php echo "₹".$row['price_paid'];?></td>
                                                              <td><?php echo $row['seller_name']; ?></td>
                                                              <td><?php echo $row['time'];?></td>
                                                            </tr>
                                                  <?php
                                                      }
                                                  ?>
                          </tbody>
                        </table>

              <?php
                        }
                        else
                          echo "<span style='color: red; paddding: 20px; text-align: center'>No Orders placed.</span>";
                      }
                      else
                        echo "<span style='color: red; paddding: 20px; text-align: center'>No Orders placed.</span>";
                    
            ?>
            
          <div class="panel-footer" style="background-color: #337AB7;color: white">
              
          </div>
          </div>
        </div>
    <hr>
    
    <div class="container">
        <center>© 2016 Catalog. All rights reserved.</center>
    </div>
    <hr><br><br>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip('enable'); 
        });
        $(document).ready(function(){
            $('#orderTable').DataTable( {
                  "order": [[ 0, "desc" ]]
             } );
        });
    </script>
  </body>
</html>