<?php
session_start();

if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../auth/login.html');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    header('location: ../auth/login.html');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FONDAMEM | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link href="../data/logo.png" rel="shortcut icon"/>



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>ONDAMEM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Fondamem</b>LTD</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../data/users.jpg" class="user-image" alt="User Image">
              <?php  if (isset($_SESSION['email'])) : ?>
                                     <span class="hidden-xs"><strong><?php echo $_SESSION['name']; ?></strong></span>

                                 <?php endif ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../data/users.jpg" class="img-circle" alt="User Image">
                <?php  if (isset($_SESSION['email'])) : ?>
                                     <p><strong><?php echo $_SESSION['name']; ?></strong></p>

                                 <?php endif ?>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../connection/auth/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../data/users.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <?php  if (isset($_SESSION['email'])) : ?>
                                     <p><strong><?php echo $_SESSION['name']; ?></strong></p>

                                 <?php endif ?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          <a href="../home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li >
          <a href="#"><i class="fa fa-file-o"></i> <span>Contact Us</span></a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Profile</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">  <i class="fa fa-angle-left pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="password.php"><i class="fa fa-gear"></i> Change Password</a></li>
            <li><a href="profile.php"><i class="fa fa-user-edit"></i> Edit Profile</a></li>
         </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> All Products</a></li>
          </ul>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

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
        <li class="active">Contact Us</li>
      </ol>
    </section>

      <!-- Main content -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Message Sent Through Contact us</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="contactus" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Telephone</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>


                </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 <a href="/">Fondamem</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../dist/js/bootbox.min.js" ></script>
<script>

    var table;
    function deleteContact(id) {
    var url = "../connection/deleteContactus.php/";
    // var button = $(".js-delete");
        bootbox.confirm("Are you sure you want to Delete this Message?", function (result) {
            if (result) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data:{id:id},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        
                        table.destroy();
                        myFunc();
                        bootbox.alert({
                            title: "success",
                            message: "<i class='fa fa-warning'></i>" +
                            " Message Deleted successful"
                        });
                        // table.rows(tr).remove().draw(true);
                    }, error: function (data) {
                        console.log(data)
                        bootbox.alert({
                            title: "Error",
                            message: "<i class='fa fa-warning'></i>" +
                            " Mesaage not deleted"
                        });
                    }
                });
    
            }
        })
}
    var table;
var manageTable = $("#contactus");

function myFunc() {
    table = manageTable.DataTable({
        ajax: {
            url: "../connection/contacted.php",
            dataSrc: ''
        },
        columns: [

            {data: 'names'},
            {data: 'email'},
            {data: 'telephone'},
            {data: 'dates'},
            {data: 'messages'},
            {
                data: 'id',
                render: function (data, type, row) {
                    return "<button class='btn btn-danger btn-sm btn-flat js-delete' onclick='deleteContact("+row.id +")' data-url='../connection/deleteContactus.php/" + row.user_id + "'> <i class='glyphicon glyphicon-trash'></i> Delete</button>";
                }
            }
        ]
    });
}

$(document).ready(function() {
    myFunc();
    // manageTable.on('click', '.js-delete', function () {
    //     var button = $(this);
    //     bootbox.confirm("Are you sure you want to Delete this Message?", function (result) {
    //         if (result) {
    //             $.ajax({
    //                 url: button.attr('data-url'),
    //                 method: 'POST',
    //                 data:{id:button.attr('data-id')},
    //                 success: function (data) {
    //                     console.log(data);
                        
    //                     var tr = button.parents("tr");
    //                     bootbox.alert({
    //                         title: "success",
    //                         message: "<i class='fa fa-warning'></i>" +
    //                         " Message Deleted successful"
    //                     });
    //                     table.rows(tr).remove().draw(true);
    //                 }, error: function (data) {
    //                     console.log(data)
    //                     bootbox.alert({
    //                         title: "Error",
    //                         message: "<i class='fa fa-warning'></i>" +
    //                         " Mesaage not deleted"
    //                     });
    //                 }
    //             });
    
    //         }
    //     })
    // });

});
</script>
</body>
</html>
