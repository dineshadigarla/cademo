<?php session_start();?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Registration</title>
</head>
<style>
.login-panel 
{
    margin-top: 150px;
}

</style>
<body style="background-color: orange;">
    <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
        <div class="row"><!-- row class is used for grid system in Bootstrap-->
            <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="registrationsubmit.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="name" type="text" autofocus required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mobile" name="mobile" type="text" value=""  onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required="" minlength="10" maxlength="12">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="" required="">
                                </div>
                                <div class="form-group">
                                    <select name="loginType" class="form-control"  required>
                                        <option value=" ">Select Type</option>
                                        <option value="Vendor">Vendor</option>
                                        <option value="Client">Client</option>
                                    </select>
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >
                            </fieldset>
                        </form>
                        <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade showModal" id="myModal2" role="dialog" style="margin-top:150px;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body" style="background: orange;">
            <p style="color: #000;" class="infmsg text-center"></p>
        </div>
    </div>
</div>
</div>

<div class="modal fade showModal2" id="myModal3" role="dialog" style="margin-top:150px;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body" style="background: orange;">
            <p style="color: #000;" class="infmsg2 text-center"></p>
        </div>
        </div>
    </div>
</div>

</body>

<?php  if(isset($_SESSION['msg']) && $_SESSION['msg']!=''){ ?>
<script type="text/javascript">
  var msg='<?php echo $_SESSION['msg']; ?>';
  $('.infmsg').text(msg);
  $('.showModal').modal('show');
</script>
<?php  unset($_SESSION['msg']);
} ?>

<?php  if(isset($_SESSION['msg2']) && $_SESSION['msg2']!=''){ ?>
<script type="text/javascript">
  var msg2='<?php echo $_SESSION['msg2']; ?>';
  $('.infmsg2').text(msg2);
  $('.showModal2').modal('show');
</script>
<?php  unset($_SESSION['msg2']);
} ?>

</html>

