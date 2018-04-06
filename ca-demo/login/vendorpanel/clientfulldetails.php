<?php include('header.php');
include('sidebar.php');
 $connection = mysqli_connect("localhost", "designmi_user", "Iamdesignmission@123#","designmi_demo");
 $getemail=$_GET['email'];
$clientemail=base64_decode($_GET['email']);
$sql = "SELECT * FROM users where email='$clientemail'";
 $result = mysqli_query($connection, $sql);
 $rows=mysqli_num_rows($result);
 $fetchdata=mysqli_fetch_assoc($result);
 $clientname=$fetchdata['name'];

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <? echo  $clientname; ?>
        <small>Client Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Client Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                 <a href="clientsaleslist.php?email=<? echo  $getemail;?>">
                    <p>List of</p>
              <h4><b>Sales Invoice</b></h4 
                 </a>
              <br>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="clientsaleslist.php?email=<? echo  $getemail;?>" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
          <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                <a href="clientbanklist.php?email=<? echo  $getemail;?>">
                                <p>List of</p>
              <h4><b>Bank Statements</h4></b>  
                    
                </a>
              <br>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="clientbanklist.php?email=<? echo  $getemail;?>" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
          <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <a href="clientcashlist.php?email=<? echo  $getemail;?>">
                 <p>List of</p>
              <h4><b>Cash Statements</h4></b> 
              </a>
              <br>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="clientcashlist.php?email=<? echo  $getemail;?>" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include('footer.php');
?>
