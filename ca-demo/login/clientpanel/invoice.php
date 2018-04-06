<?php
session_start(); 
if($_SESSION['loginType']=="Vendor"){
	header("Location:../vendorpanel/index.php");
}
if($_SESSION['loginType']=="Superadmin"){
	header("Location:../superadmin/index.php");
}
include('header.php');
include('sidebar.php');
$count=1;
include('../database/db_conection.php');
$sql = "SELECT count(*) FROM salesinvoice";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
			//print_r(row);
		     $count=$row['count(*)']+1;
			
		     //$count=$row[''];
		}
    }
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
              <h3 class="box-title">Generate Invoice</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" accept-charset="utf-8" autocomplete="off" action="2.php">
              <div class="box-body">
<div class="vendor1">
<div class="form-group"><input type='text' class="form-control" name='vendorname' placeholder="vendor name"></input></div>
<div class="form-group"><input class="form-control" type='text' name='vendoraddress' placeholder='vendor address'></input></div>
<div class="form-group"><input class="form-control" type='text' name='vendorgst' placeholder='vendor gst'></input></div>
<div class="form-group"><input class="form-control" type='number' name='vendorcontact' placeholder='vendor contact'></input></div>
<div class="form-group"><input class="form-control" type='email' name='vendoremail' placeholder='vendor email'></input></div>
</div>
<div class="invoice1">
<div class="form-group"><input type='text' class="form-control" name='financialyear' placeholder="financialyear"></input></div>
<div class="form-group"><input class="form-control" type="number" name="invoiceno" placeholder="invoiceno" value="<?php echo $count; ?>" readonly></input></div>
<div class="form-group"><input class="form-control" type='date' name='invoicedate' placeholder="invoicedate"></input></div>
<div class="form-group"><input class="form-control" type='number' name='clientid' placeholder="clientid"></input></div>
<div class="form-group"><input class="form-control" type='text' name='orderno' placeholder="orderno"></input></div>
<div class="form-group"><input class="form-control" type='text' name='place' placeholder="place"></input></div>
</div>

<div class="description1">
 <div class="row">
 <div class="col-lg-3">
<div class="form-group">
    <input type="text" class="form-control" id="Schoolname" name="description[]" value="" placeholder="description" required>
  </div>   
 </div>
       <div class="col-lg-3">
  <div class="form-group">
    <input type="text" class="form-control" id="Schoolname" name="title[]" value="" placeholder="SAC" required>
  </div>
</div>
<div class="col-lg-3">
  <div class="form-group">
   <input type="text" class="form-control" name="heading[]" placeholder="Amount" required></input>
  </div>
</div>

<div class="col-lg-3">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>

</div>
 <div id="education_fields">
          
        </div>
<div class="clear"></div>
</div>

<div class="bank1">
 <div class="row">
 <div class="col-lg-3">
<div class="form-group">
    <input type="text" class="form-control" id="Schoolname" name="bankname[]" value="" placeholder="bankname">
  </div>   
 </div>
       <div class="col-lg-3">
  <div class="form-group">
    <input type="text" class="form-control" id="Schoolname" name="ac[]" value="" placeholder="A/C">
  </div>
</div>
<div class="col-lg-3">
  <div class="form-group">
   <input type="text" class="form-control" name="ifsc[]" placeholder="IFSC"></input>
  </div>
</div>

<div class="col-lg-3">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="education_fields1();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>

</div>
 <div id="education_fields1">
          
        </div>
<div class="clear"></div>


</div>

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
<script type="text/javascript">
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="row"><div class="col-lg-3"><div class="form-group"> <input type="text" class="form-control" id="Schoolname" name="description[]" value="" placeholder="Title" required></div></div><div class="col-lg-3"><div class="form-group"> <input type="text" class="form-control" id="Schoolname" name="title[]" value="" placeholder="SAC" required></div></div><div class="col-lg-3"><div class="form-group"> <input type="text" class="form-control" name="heading[]" placeholder="Amount" required></input> </div></div><div class="col-lg-3"><div class="form-group"><div class="input-group"> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
   var room1=1;
   function education_fields1() {
 
    room++;
    var objTo = document.getElementById('education_fields1')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room1);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="row"><div class="col-lg-3"><div class="form-group"> <input type="text" class="form-control" id="Schoolname" name="bankname[]" value="" placeholder="Title" required></div></div><div class="col-lg-3"><div class="form-group"> <input type="text" class="form-control" name="ac[]" placeholder="A/C"></input> </div></div><div class="col-lg-3"><div class="form-group"> <input type="text" class="form-control" name="ifsc[]" placeholder="IFSC"></input> </div></div><div class="col-lg-3"><div class="form-group"><div class="input-group"> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room1 +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div>';
    
    objTo.appendChild(divtest)
}

</script>
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

