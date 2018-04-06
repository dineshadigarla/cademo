
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user.png" class="img-circle" alt="Client" style="border:2px solid white;">
        </div>
        <div class="pull-left info">
          <p>WELCOME <?php echo $_SESSION['username']; ?></p>
          
        </div>
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Create Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i> Create Vendors</a></li>
            <li><a href="vendorlist.php"><i class="fa fa-circle-o"></i> View Vendors </a></li>
          </ul>
        </li>
		
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="invoice.php"><i class="fa fa-circle-o"></i> Generate Invoice</a></li>
            <li><a href="list.php"><i class="fa fa-circle-o"></i> View Invoices </a></li>
			<li><a href="cancel.php"><i class="fa fa-circle-o"></i> Cancel Invoices </a></li>
          </ul>
        </li>
		
        </ul>

     
  </aside>

  