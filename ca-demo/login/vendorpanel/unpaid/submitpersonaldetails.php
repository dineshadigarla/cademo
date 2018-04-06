<?php
// print_r($_POST);die();
session_start();
include("../database/db_conection.php");//make connection here

if(isset($_POST['submitpersonaldetails']))
{
    $organisationName=$_POST['organisationName'];
    $organisationAddress=$_POST['organisationAddress'];
    $organisationGst=$_POST['organisationGst'];
    $organisationPan=$_POST['organisationPan'];
    $organisationContact=$_POST['organisationContact'];
    $organisationBankAcc=$_POST['organisationBankAcc'];
    $useremail=$_POST['useremail'];
    

    if($organisationName=='')
    {
         $_SESSION['msg']='Please enter the Organisation Name.';
          header("location: index.php");
    }

    else if($organisationAddress=='')
    {
         $_SESSION['msg']='Please enter the Organisation Address.';
          header("location: index.php");
    }
    
    else if($organisationGst=='')
    {
         $_SESSION['msg']='Please enter the Organisation GST.';
          header("location: index.php");
    }
    
    else if($organisationPan=='')
    {
         $_SESSION['msg']='Please enter the Organisation PAN.';
          header("location: index.php");
    }
    
    else if($organisationContact=='')
    {
         $_SESSION['msg']='Please enter the Organisation Contact Details.';
          header("location: index.php");
    }
    
    else if($organisationBankAcc=='')
    {
         $_SESSION['msg']='Please enter the Organisation Bank Account.';
          header("location: index.php");
    }
    
    else 
    {
                /*Upload Logo starts*/
    
    class Files{
        public $filename;
        public $fileextension;
        public function __construct($filename,$fileextension){
           $this->filename=$filename;
           $this->fileextension=$fileextension;
        }
        }
        $final=array();
           $image=$_FILES['fileupload'];
           //print_r($image);
           $filename=$_FILES['fileupload']['name'];
           $filetmp=$_FILES['fileupload']['name'];
           $filetmpname=$_FILES['fileupload']['tmp_name'];
           $filesize=$_FILES['fileupload']['size'];
           $fileerror=$_FILES['fileupload']['error'];
           $fileType=$_FILES['fileupload']['type'];
           $fileext=explode('.',$filename);
           $fileActualExt=strtolower(end($fileext));
           $filenames=$fileext[0];
           //echo $filenames;
           $allowed=array('jpg','png','jpeg');
           if(in_array($fileActualExt,$allowed)){
        	   if($fileerror===0){
        		   if($filesize<51000000){
        			   $filenamenew=$filenames.'.'.$fileActualExt;
        			   $fileDestination='../clientpanel/clientcompanylogos/'.$filenamenew;
        			   move_uploaded_file($filetmpname,$fileDestination);
        			   $connection = mysqli_connect("localhost", "designmi_user", "Iamdesignmission@123#","designmi_demo");
        			   $final=json_encode($final);
        			   $username=$_SESSION['username'];
                        $check_email_query="select * from users WHERE email='$useremail' and organisationName='$organisationName' ";
    $run_query=mysqli_query($dbcon,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
          $_SESSION['msg']='You have already submitted details.';
          header("location: index.php");
    }
    else
    {
         $update_query="UPDATE `users` SET `organisationName`='$organisationName',`organisationAddress`='$organisationAddress',`organisationGst`='$organisationGst',`organisationPan`='$organisationPan',`organisationContact`='$organisationContact',`organisationBankAcc`= '$organisationBankAcc',logo='$filenamenew', logopath='$fileDestination' where `email`='$useremail'";
        //die();

            if(mysqli_query($dbcon,$update_query))
            {
              $_SESSION['msg']='Thank you for submitting your details.';
              header("location: index.php");
            }
    }					 
        			      
        		   }
        		   else{
        		        $_SESSION['msg']='Please select only jpg,jpeg,png format only to upload with less than 5mb.';
        		        header("location: index.php");
                        
        		   }
        	   }
        	    else{
        		        $_SESSION['msg']='Please select only jpg,jpeg,png format only to upload with less than 5mb.';
        		        header("location: index.php");
                        
        		   }
           }
           else{
                $_SESSION['msg']='Please select only jpg,jpeg,png format only to upload.';
                header("location: index.php");
                
           }
    /*Upload Logo ends*/    
    
    }
   

}



?>