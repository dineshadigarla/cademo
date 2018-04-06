<?php
session_start();//session starts here
// if(isset($_SESSION['paidStatus']=='paid'))
// {
//  echo "<script>window.open('clientpanel/index.php','_self')</script>";
// }
// else
// {
//  echo "<script>window.open('unpaid/index.php','_self')</script>"; 
// }
// if(isset($_SESSION['paidStatus'])=='paid' ){
// header('location:clientpanel/index.php');
// }
// else if(isset($_SESSION['paidStatus'])=='unpaid' )
// {
//     header('location:unpaid/index.php');
// }
// else{
//      header('location:login.php');
// }
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Login</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
}
</style>

<body style="background-color:orange;">

<?php if(!isset($_SESSION['username'])) {?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title text-center"> LOGIN</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                            <!-- Change this to a button or input when using this as a form -->
                            <!--<a href="registration.php" class="btn btn-lg btn-success btn-block">Registration</a> -->
                        </fieldset>
                    </form>
                    <center><b>Not registered yet?</b> <br></b><a href="registration.php">Register here</a></center>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  } ?>
</body>

</html>

<?php

include("database/db_conection.php");

if(isset($_POST['login']))
{
    $user_email=$_POST['email'];
    $user_pass=md5($_POST['pass']);

    $check_user="select * from users WHERE email='$user_email'AND password='$user_pass' ";

    $run=mysqli_query($conn,$check_user);

    if(mysqli_num_rows($run))
    {
        $rows=mysqli_fetch_assoc($run);
        $username=$rows['name'];
        $paidStatus=$rows['paidStatus'];
        $loginType=$rows['loginType'];
        if($loginType=='Client')
        {
        if($paidStatus=='paid')
        {
        echo "<script>window.open('clientpanel/index.php','_self')</script>";
        }
        else
        {
         echo "<script>window.open('unpaid/index.php','_self')</script>"; 
        }
        }
          else if($loginType=='Vendor') 
        {
        if($paidStatus=='paid')
        {
         echo "<script>window.open('vendorpanel/index.php','_self')</script>";
        }
        else
        {
         echo "<script>window.open('vendorpanel/unpaidvendors.php','_self')</script>"; 
        }
           
        }
          else if($loginType=='Superadmin'){
			  echo "<script>window.open('superadmin/index.php','_self')</script>"; 
		  }
		  $_SESSION['loginType']=$loginType;
        $_SESSION['email']=$user_email;
        $_SESSION['username']=$username;
        $_SESSION['paidStatus']=$paidStatus;
        //here session is used and value of $user_email store in $_SESSION.
    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}
?>