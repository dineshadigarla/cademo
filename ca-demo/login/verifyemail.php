<?php

$con = mysqli_connect("localhost","designmi_user","Iamdesignmission@123#","designmi_demo");
$userstatus=base64_decode($_GET['verifyemail']);
$email=base64_decode($_GET['email']);
// echo "UserStatus".$userstatus;

$check_email_query="select * from users WHERE email='$email' and Status='Active'";
$result1 = mysqli_query($con,$check_email_query) or die("Invalid1".mysqli_error());
if(mysqli_num_rows($result1)<= 0)
{

	 $query="UPDATE `users` SET `Status`='Active' WHERE email='".$email."'";
	$result2 = mysqli_query($con,$query) or die("Invalid2".mysqli_error());
	$message="Thanks! Your email is verified. Please visit the website and Login.";
}

else
{
 $message="Your email is already verified.Please visit the website and Login.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Email Verification</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body style="background-color: orange;">

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Email Verification for <?php echo $email; ?> </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.designmissionseries.com/ca-demo/login/login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin"><?php echo $message; ?></h3>
  <!--<img src="bird.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">-->
  <h3>Please Login.</h3>
  <br>
   <a href="https://www.designmissionseries.com/ca-demo/login/login.php" target="_blank"><button type="button" class="btn btn-success">Login</button></a>
</div>


<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p> <a href="http://totalica.in">http://totalica.in</a></p> 
</footer>

</body>
</html>
