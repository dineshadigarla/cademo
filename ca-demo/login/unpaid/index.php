<?php 
include('header.php');
include('sidebar.php');
$useremail=$_SESSION['email'];
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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

