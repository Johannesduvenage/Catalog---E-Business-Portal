<?php
    session_start();
    if(isset($_SESSION['emailID']))
    {
        $user_name_first = $_SESSION['firstname'];
        $user_name_last = $_SESSION['lastname'];
        $user_email = $_SESSION['emailID'];
    }
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
    <div class="adv" style="margin-top: -1.8%;">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="1700">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              <li data-target="#carousel-example-generic" data-slide-to="3"></li>
              <li data-target="#carousel-example-generic" data-slide-to="4"></li>
              <li data-target="#carousel-example-generic" data-slide-to="5"></li>
              <li data-target="#carousel-example-generic" data-slide-to="6"></li>
              <li data-target="#carousel-example-generic" data-slide-to="7"></li>
              <li data-target="#carousel-example-generic" data-slide-to="8"></li>
              <li data-target="#carousel-example-generic" data-slide-to="9"></li>
              <li data-target="#carousel-example-generic" data-slide-to="10"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="images/Advt/img2.jpg" alt="">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="images/Advt/img4.jpg" alt="...">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img src="images/Advt/img5.jpg" alt="...">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img src="images/Advt/img6.jpg" alt="...">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img src="images/Advt/img7.jpg" alt="...">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img src="images/Advt/img8.jpg" alt="...">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img src="images/Advt/img9.jpg" alt="...">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img src="images/Advt/img10.jpg" alt="...">
                <div class="carousel-caption">
                  ...
                </div>
              </div>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
    <hr>
    <h4><center>ITEMS</center></h4>
    <div class="products">
        <div class="row">
          <form action="addToCart.php">
            <?php
                require 'init.php';
                $sql_select = "SELECT * FROM `$db_name`.`products` where `quantity`>0 order by `product_title`";
                $result = mysqli_query($conn, $sql_select);
                if($result)
                {
                      if(mysqli_num_rows($result)==0)
                      {
                            echo "<div class='col-md-4 col-md-offset-4'>No products in the catalog. Sorry try again tomorrow.</div>";
                      }
                      else if(mysqli_num_rows($result) > 0)
                      {
                            while($row = mysqli_fetch_assoc($result))
                            {
            ?>
                              <div class="col-md-4" style=" padding: 20px;">
                                    <center><h5><?php $len = strlen($row['product_title']); echo $row['product_title']; ?></h5></center>
                                    <?php if($len<48) echo "<br>"; ?>
                                    <br>
                                    <center><img src="<?php echo 'images/db_dir/'.$row['upload_file']; ?>" alt="Product Image" height="100"><span class="badge"> ₹ <?php echo $row['product_price'];?></span>
                                    <hr style="margin-top: <?php if($len<48) echo "15px"; ?>"></center>
                                    <center><p>Seller: <?php echo $row['Seller_name']; ?></p></center>
                                    <center><button type="submit" id="buyButton"  <?php if($row['quantity']<5) echo "data-placement='right'  data-toggle='tooltip' title='Hurry! Only ".$row['quantity']." left '"; ?>  class="btn btn-default" name="productID" value="<?php echo $row['id']; ?>">Add to Cart</button></center>
                              </div>
            <?php
                            }
                      }
                }
                else
                  echo "<div class='col-md-4 col-md-offset-4'>Something went wrong! Please contact the administrator</div>";
            ?>
          </form>
        <div>
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
    </script>
  </body>
</html>