<?php
session_start();
if(!$_SESSION['email'])
{
    header("Location: ../login.php");//redirect to login page to secure the welcome page without login access.
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VENDOR PANEL | Dashboard</title>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <div class="navbar-header text-center">
         <a href="ndex.php" class="navbar-brand"><b>Vendor</b>Panel</a>
          </button>
        </div>
        

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];} ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user.png" class="img-circle" alt="User Image">

                <p>
                  <?php if(isset($_SESSION['username'])){ echo  $_SESSION['username'];} ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<?php 
$useremail=$_SESSION['email'];
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Personal Information
        <small>Add Info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Personal Information</li>
              <li class="active">Add Info</li
      </ol>
    </section>


   <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" accept-charset="utf-8"  action="submitpersonaldetails.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group"  >
                <input class="form-control" placeholder="Organisation Name" name="organisationName" type="text" autofocus required="">
                </div>
                <div class="form-group"  >
                <textarea class="form-control" name="organisationAddress" placeholder="Organisation Address" required=""></textarea>
                </div>
                <div class="form-group">
                <input class="form-control" placeholder="Organisation GST" name="organisationGst" type="text" value="" required="">
                </div>
                <div class="form-group">
                <input class="form-control" placeholder="Organisation PAN" name="organisationPan" type="text" value="" required="">
                </div>
                <div class="form-group">
                <input class="form-control" placeholder="Contact Details" name="organisationContact" type="text" value="" required=""  onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required="" minlength="10" maxlength="12">
                </div>
                <div class="form-group">
                <input class="form-control" placeholder="Bank Account No." name="organisationBankAcc" type="text" value="" required="">
                <input class="form-control" name="useremail" type="hidden" value="<?php echo $useremail; ?>" >
                </div>
                  
                <div class="form-group" >
                  <label for="exampleInputFile">Upload Company Logo</label>
                  <input type="file" id="exampleInputFile" name='fileupload' required image>
                  <p class="help-block">jpg or png format only.</p>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submitpersonaldetails" value="Sign In" >Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->
  
      <!-- Modal -->
<div class="modal fade showModal" id="myModal2" role="dialog" style="margin-top:150px;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body" style="background: #3c8dbc;">
            <p style="color: #000;" class="infmsg text-center"></p>
        </div>
    </div>
</div>
</div>
<?php include('footer.php');
?>
<?php  if(isset($_SESSION['msg']) && $_SESSION['msg']!=''){ ?>
<script type="text/javascript">
  var msg='<?php echo $_SESSION['msg']; ?>';
  $('.infmsg').text(msg);
  $('.showModal').modal('show');
</script>
<?php  unset($_SESSION['msg']);
} ?>

