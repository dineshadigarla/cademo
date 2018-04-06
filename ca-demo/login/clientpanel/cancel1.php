<?php
$id=$_POST['id'];
echo $id;
 include('../database/db_conection.php');
$sql = mysqli_query($conn,"update salesinvoice set active=0 where id='$id'");
if($sql){
	$_SESSION['msg']='Your invoice have been successfully cancelled.';
                            echo "<script>window.open('list.php','_self')</script>";
}





?>