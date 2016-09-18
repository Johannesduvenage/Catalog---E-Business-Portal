<html>
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

 <body style="margin:100px">    
 		<div class="container">
  			<center><h1><b>Thankyou.</h1>
  			<h3><br> Your order was completed successfully.</h3></center>
  			<center><h5><br><br><br><br><img src="images/emailimage.png" width="80px" height="80px">
  			 An email recipt including the details about your order has been sent to the email address provided.Please keep it for your record.</h5></center>
  			<center><h6><br><br><br><br>
  				You can visit the <a href="history.php">My Account page at any time to check the status of your order </a> . Or else click here to <a href="window.print();">print a copy of your recipt.</a>
  			<img src="images/laptop.png" width="40px" height="40px"><img src="images/printer.png" width="40px" height="40px"></h6></center>

		</div>      
 </body>
<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</html>