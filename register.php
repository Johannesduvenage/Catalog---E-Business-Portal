<?php
    session_start();
    require 'init.php';
        if(isset($_GET['submit1']))
        {
                $email_id = $_GET['email1'];
                $password = $_GET['pass1'];
                $fname = $_GET['fname'];
                $lname = $_GET['lname'];
                $p_num = $_GET['phone'];
                $address = $_GET['address'];

                $log_text = "New User Registration : " . $email_id . " -- Contact : " . $p_num;
                $log_register = "INSERT INTO `$db_name`.`logs`(`logs_text`) values('$log_text')";


                $query_register = "INSERT INTO `$db_name`.`users`(`email_id`,`pass_key`,`first_name`,`last_name`,`phone_number`,`address_details`) values('$email_id','$password','$fname','$lname','$p_num', '$address')";

                $result0 = mysqli_query($conn, $log_register);
                $result1 = mysqli_query($conn, $query_register);
                if($result0&&$result1)
                {
                    $_SESSION['firstname'] = $fname;
                    $_SESSION['lastname'] = $lname;
                    $_SESSION['emailID'] = $email_id;
                    header('Location: index.php');  
                    
                }
                else
                {
                    echo "Something went wrong.";
                }
        }
?>

<!doctype html>
<html>

     <head>
        <title>Online Shopping: Catalog</title>
        <link rel="shortcut icon" href="images/logo.png" />
        <style> 

            html {
                background-color: black;
            }
            body {
                font-family: Open Sans, arial, verdana;
            }
            /*form styles*/
            #msform {
                margin: 50px auto;
                text-align: center;
                position: relative;
            }
            #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 20px;
                box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
                padding: 30px 40px;
                box-sizing: border-box;
                
                /*stacking fieldsets above each other*/
                position: relative;
            }
            /*Hide all except first fieldset*/
            #msform fieldset:not(:first-of-type) {
                display: none;
            }
            /*inputs*/
            #msform input, #msform textarea {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                margin-bottom: 10px;
                width: 100%;
                box-sizing: border-box;
                font-family: Open Sans;
                color: #2C3E50;
                font-size: 13px;
            }
            /*buttons*/
            #msform .action-button {
                width: 100px;
                background: #27AE60;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 1px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
            }
            #msform .action-button:hover, #msform .action-button:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
            }
            /*headings*/
            .fs-title {
                font-size: 15px;
                text-transform: uppercase;
                color: #2C3E50;
                margin-bottom: 10px;
            }
            .fs-subtitle {
                font-weight: normal;
                font-size: 13px;
                color: #666;
                margin-bottom: 20px;
            }
            /*progressbar*/
            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                /*CSS counters to number the steps*/
                counter-reset: step;
            }
            #progressbar li {
                list-style-type: none;
                color: white;
                text-transform: uppercase;
                font-size: 9px;
                width: 33.33%;
                float: left;
                position: relative;
            }
            #progressbar li:before {
                content: counter(step);
                counter-increment: step;
                width: 20px;
                line-height: 20px;
                display: block;
                font-size: 10px;
                color: #333;
                background: white;
                border-radius: 3px;
                margin: 0 auto 5px auto;
            }
            /*progressbar connectors*/
            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: white;
                position: absolute;
                left: -50%;
                top: 9px;
                z-index: -1; /*put it behind the numbers*/
            }
            #progressbar li:first-child:after {
                /*connector not needed before the first step*/
                content: none; 
            }
            /*marking active/completed steps green*/
            /*The number of the step and the connector before it = green*/
            #progressbar li.active:before,  #progressbar li.active:after{
                background: #27AE60;
                color: white;
            }
            </style>
     </head>

     <body style="font-family: Open Sans;">
            <form id="msform" action="register.php" method="GET">

              <fieldset>
                <center><img src="images/logo.png" height=30></center>
                <h2 class="fs-title">Create your account</h2>
                <hr><br>
                <input type="text" name="email1" placeholder="Email" />
                <input type="password" name="pass1" placeholder="Password" />
                <input type="password" name="cpass" placeholder="Confirm Password" />
                <h2 class="fs-title">Personal Details</h2>
                <hr><br>
                <input type="text" name="fname" placeholder="First Name" />
                <input type="text" name="lname" placeholder="Last Name" />
                <input type="text" name="phone" placeholder="Phone" />
                <textarea name="address"  placeholder="Address"></textarea>
                <input type="submit" name="submit1" id="submit1" class="submit action-button" value="Submit" />
              </fieldset>
            </form>
     </body>
</html>