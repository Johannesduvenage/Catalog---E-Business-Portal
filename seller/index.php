<?php
  session_start();
  session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Shopping: Catalog</title>
    <link rel="shortcut icon" href="../images/logo.png" />
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
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <script>
            //paste this code under head tag or in a seperate js file.
            // Wait for window load
            $(window).load(function() {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });
    </script>
  </head>
  <body>
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
          <a class="navbar-brand" href="../index.php"><img src="../images/logo.png" height=20></a>
          <a class="navbar-brand" href="../index.php"><span style="font-family: Tahoma;">Catalog Kart</span></a>
        </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li style="margin: -5%;"><a href="../index.php"><button type="button" class="btn btn-default">Home <img src="../images/home.png" height="15"></button></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
                    <ul class="dropdown-menu" style="padding: 15px; height:450%; width: 650%;border-radius: 7px;">
                      <br>
                      <form action="../validate.php" method="GET">
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
                      <li><center><input type="submit" class="btn btn-default" id="login_seller" name="login_seller" value="Login!"></center></li>
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
            
      </div><!-- /.container-fluid -->
    </nav>
    
    </div>

    <div class="container">
      <img src="../images/seller/banner.jpg" width="100%">
      <img src="../images/seller/banner2.png" width="100%">
      <div class="row">
        <div class="col-md-12"  style="font-family: Open Sans, Tahoma">
          <h3>PRICING</h3>
          <p>We make the fastest payments in the industry. For every sale you make, you get paid within the next 7-14 business days. You decide the price of your products and we charge you a small fee on the successful orders you make.</p>
        </div>
        <img src="../images/seller/price_structure.png" width="100%">
        <br>
        <div class="col-md-10 col-md-offset-1" style="font-family: Open Sans, Tahoma">
          <center>
            <p style="font-family: Open Sans, Tahoma">Here’s an easy example, which illustrates a sample the above calculation:</p>
        </center>
          <table class="table table-bordered" style="text-align: center">
            <thead>
                <tr>
                    <td><b>ITEM<b></td>
                    <td><b>AMOUNT (RS.)</b></td>
                </tr>
            </thead>
            <tbody>
              <tr>
                  <td>Selling Price (decided by you)</td>
                  <td>1000</td>
              </tr>
              <tr>
                  <td>Commission Fee (varies across sub-categories/verticals)</td>
                  <td>100(assuming 10%)</td>
              </tr>

              <tr>
                  <td>Shipping Fee (Local shipping , weight 0-500 grams)</td>
                  <td>30</td>
              </tr>

              <tr>
                  <td>Collection Fee (2.5 % on the Order item value or Rs 20 whichever is higher)</td>
                  <td>25</td>
              </tr>

              <tr>
                  <td>Fixed Fee</td>
                  <td>30</td>
              </tr>

              <tr>
                  <td>Total Marketplace Fee</td>
                  <td>185</td>
              </tr>

              <tr>
                  <td>Service Tax (15% of Marketplace Fee including Swachh Bharat & Krishi Kalyan cess)</td>
                  <td>27.75</td>
              </tr>

              <tr>
                  <td><b>Total deductions</b></td>
                  <td><b>212.75</b></td>
              </tr>

              <tr>
                  <td><b>Settlement Value</b></td>
                  <td><b>787.25</b></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
            <center><h3>SELL ON CATALOG</h3></center>
            <p style="font-family: Open Sans, Tahoma; font-size: 12px; ">
              Catalog marketplace is India’s leading platform for selling online. Be it a manufacturer, vendor or supplier, simply sell your products online on Catalog and become a top ecommerce player with minimum investment. Through a team of experts offering exclusive seller workshops, training, seller support and convenient seller portal, Catalog focuses on educating and empowering sellers across India.
              <br><br>
              Selling on Catalog.com is easy and absolutely free. All you need is to register, list your catalogue and start selling your products.
              <br><br>
              What's more! We have third party ‘Ecommerce Service Providers’ who provide logistics, cataloging support, product photo shoot and packaging materials. We have Seller Protection Program to safeguard sellers from losses via compensation from Seller Protection Fund (SPF). We provide Catalog Advantage services through which you can ensure faster delivery of your items, quality check by our experts and delightful packaging. Combine these with fastest payments in the industry and an excellent seller portal. No wonder Catalog is India’s favourite place to sell online.
            </p>
        </div>
      </div>
    </div>
    <hr>
    <div class="container">
        <center>© 2016 Catalog. All rights reserved.</center>
    </div>
    <hr><br><br>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>