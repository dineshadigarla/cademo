<?php 
include('header.php');
include('sidebar.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upload Bank Statements
        <small>Upload Files</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upload Bank Statements</li>
              <li class="active">Upload Files </li
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
              <h3 class="box-title">Upload Bank Statements</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" accept-charset="utf-8" autocomplete="off" action="1.php" enctype="multipart/form-data">
              <div class="box-body">
                  
                <div class="form-group" >
                  <label for="exampleInputFile">Upload File</label>
                  <input type="file" id="exampleInputFile" name='fileupload' value='1426572610' required>

                  <p class="help-block">Pdf or Doc or Excel format only.</p>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"name="submit" value="Sign In" >Submit</button>
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

