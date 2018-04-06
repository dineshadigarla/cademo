<?php
// print_r($_POST);die();
session_start();
include("database/db_conection.php");//make connection here

if(isset($_POST['register']))
{
    $user_name=$_POST['name'];//here getting result from the post array after submitting the form.
    $user_pass=$_POST['pass'];//same
    $password=md5(trim($user_pass));
    $user_email=$_POST['email'];//same
    $encodeemail=base64_encode($user_email);
    if(isset($_POST['mobile']){$user_mobile=$_POST['mobile'];}//same
    $user_logintype=$_POST['loginType'];//same
    $updateuserstatus=base64_encode('Active');
    
    $verifyemail="https://www.designmissionseries.com/ca-demo/login/verifyemail.php?verifyemail=$updateuserstatus&email=$encodeemail";

    if($user_name=='')
    {
         $_SESSION['msg2']='Please enter the username.';
          header("location: registration.php");
    }

      if($user_mobile=='')
    {
        $_SESSION['msg2']='Please enter the mobile.';
          header("location: registration.php");
    }

    if($user_pass=='')
    {
       $_SESSION['msg2']='Please enter the password.';
          header("location: registration.php");
    }

    if($user_email=='')
    {
        $_SESSION['msg2']='Please enter the email.';
          header("location: registration.php");
    }

     if($user_logintype=='')
    {
      $_SESSION['msg2']='Please select the login Type.';
          header("location: registration.php");
    }

   
    //here query check wheather if user already registered so can't register again.
    $check_email_query="select * from users WHERE email='$user_email'";
    $run_query=mysqli_query($conn,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
          $_SESSION['msg2']='You are already registered with us. Please login.';
          header("location: registration.php");
    }
    else{
    $insert_user="insert into users (name,password,email,userName,mobile,loginType,Status,paidStatus) VALUE ('$user_name','$password','$user_email','$user_email','$user_mobile','$user_logintype','Inactive','unpaid')";
    if(mysqli_query($conn,$insert_user))
    {
        //echo"<script>window.open('welcome.php','_self')</script>";

            $message="<html><body><h3>Please Validate your emailid</h3><table border='1' style='width:100%'>
    <tr>
    <th>Email</th>
    <th>Password</th>
    </tr>
    <tr>
    <td>$user_email</td>
    <td>$user_pass</td>
    </tr><tr>
     <th>Click this url to verify your emailid: </th>
    <td><a href=$verifyemail>$verifyemail</a></td>
    </tr>
    </table></body></html>";
    // $emailarray=$user_email; //For sending user email
    $emailarray=array('sapna@ide-global.com');
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $subject="Email Verification - Totalika Registration";
    $headers .= 'From:  Email Verification<mail@hospitalityseries.com>' . "\r\n";
    $emailSendStatus='';
    foreach($emailarray AS $emailid)
    {
     if(mail($emailid,$subject,$message,$headers))
        {
            $emailSendStatus='sent';
            //echo "Sent";die();
        }
        else{
            //echo "Not Sent";die();
        }
    }
      $_SESSION['msg']='Thank you for registering with us. Please check your email and verify your emailid to login.';
      header("location: registration.php");
    }
}

}



?>