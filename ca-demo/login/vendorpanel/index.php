<?php
session_start(); 
if($_SESSION['loginType']=="Client"){
	header("Location:../vendorpanel/index.php");
}
if($_SESSION['loginType']=="Superadmin"){
	header("Location:../superadmin/index.php");
}
 include('header.php');
include('sidebar.php');
 $connection = mysqli_connect("localhost", "designmi_user", "Iamdesignmission@123#","designmi_demo");
$username=$_SESSION['username'];
$sql = "SELECT * FROM users ";
 $result = mysqli_query($connection, $sql);
 $rows=mysqli_num_rows($result);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <?php  if ( $rows > 0) { ?>
              <h3><? echo $rows; ?></h3>
              <?php }
              else {?>
              <h3>0</h3>
              <?php } ?>

              <p>Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include('footer.php');
?>
