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
            <div class="panel-heading"><center><img src="images/logo.png" width="25"> &nbsp;My Cart</center></div>

            <?php 
            $total_value = 0;
              $get_id = "";
                    if($result)
                    {
                      if(mysqli_num_rows($result)>0)
                      {
                        $total_value = 0;
                        while($row = mysqli_fetch_assoc($result))
                        {
                          $get_id = $get_id . $row['id'] . '&';
                          $total_value += $row['product_value'];
              ?>
                        <div class="panel panel-default" style="border-radius: 0;">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-md-10"><b><?php echo $row['product_name']; ?></b></div>
                                  <div class="col-md-1"><b><i><?php echo " ₹ ".$row['product_value']; ?></i></b></div>
                              </div>
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                  <img src="<?php echo "images/db_dir/".$row['product_image']; ?>" width="100">
                                </div>
                                <div class="col-md-4">
                                  <p><h4><u>Description</u></h4><br><?php echo $row['product_desc']; ?></p>
                                </div>
                                <div class="col-md-3">
                                  <p><h4><u>Seller</u></h4><br><?php echo $row['seller_name']; ?></p>
                                </div>
                              </div>
                          </div>
                        </div>

              <?php
                        }
                      }
                      else
                        echo "<span style='color: red; paddding: 20px; text-align: center'>No Products Found in cart.</span>";
                    }
            ?>
            
          <div class="panel-footer" style="background-color: #337AB7;color: white">
              <div class="row">
                <div class="col-md-10">Total Items : <?php echo $count; ?></div>
                <div class="col-md-2"><b><em>Total Value : <?php echo " ₹ ".$total_value; ?></em><b></div>
              </div>
          </div>
          </div>
        </div>
      <!--  End of Panel -->
      <center><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#confirm" <?php if($total_value <= 0) echo "disabled"; ?> >Checkout</button></center>
    <hr>
    <!-- Modal -->
    <form action="payment.php">
        <div id="confirm" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Confirm to pay <?php echo " ₹ ".$total_value; ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" value="<?php echo $user_email; ?>" name="paymentConfirm"  class="btn btn-warning" >Pay</button>
              </div>
            </div>

          </div>
        </div>
  </form>
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
    </script>
  </body>
</html>