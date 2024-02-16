<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Admin</title>
        <link href='../img/icons/favicon.ico' rel='shortcut icon'>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../assets/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../assets/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../assets/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="../assets/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Data Tables -->
        <link href="../assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/dist/css/style.css" rel="stylesheet" >


          <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets3/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets3/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets3/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets3/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

    <!-- Select2 -->
  <link rel="stylesheet" href="../assets3/bower_components/select2/dist/css/select2.min.css">
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../assets3/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- daterange picker -->
  <link rel="stylesheet" href="../assets3/bower_components/bootstrap-daterangepicker/daterangepicker.css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <div id="loading"></div>
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Administrator
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['fullname']; ?>
                                    
                                    </p>
                                </li>
                                <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../index.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
                                <!-- Menu Body -->
                                <?php include "menu1.php"; ?>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat" onclick="return confirm ('Apakah Anda Akan Keluar.?');"> Keluar </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" />
                        </div>
                        <div class="pull-left info">
                            <p>Selamat Datang,<br /><?php echo $_SESSION['fullname']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <?php include "menu2.php"; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Purchase Order
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Purchase Order</a></li>
                        <li class="active">Data PO Terima</li>
                    </ol>

                </section>



                <!-- Main content -->
               <section class="content">

<div class="row">

  <div class="col-md-12">
      
    <div class="box box-Default"> 

         <?php 
                include "../conn.php";
                $sql ="SELECT id from po_terima";
                $data = mysqli_query($koneksi, $sql);
                
                
                while($row = mysqli_fetch_array($data)){
              ?>

       
        <div class="box-body">
            <form role="form" action="cetak_po_tgl.php" method="POST" target="_blank">
                        <div class="form-group">
               <h4 class="mb"><span class='glyphicon glyphicon-briefcase'></span> Laporan Perbulan
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>  
                <input type="text" name="tanggal" class="form-control pull-right" placeholder="Masukan Periode Tanggal Agenda" id="reservation">             
              </div>
                          <div class="modal-footer">
                <button type="submit" name="cetak_po_tgl" class="btn btn-info"><i class="fa fa-print"></i> CETAK</button>
            </div> 
            </div>
      </form></div></div></div></div>
<!-- <div class="row">

  <div class="col-lg-6 col-xs-10">
      
    <div class="box box-Default"> 
       
        <div class="box-body">
            <form role="form" action="cetak_smasuk_tgl.php" method="POST" target="_blank">
                        <div class="form-group">
              <label><h3><strong>TANGGA</strong></h3></label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>  
                <input type="text" name="tgl_agenda_sm" class="form-control pull-right" placeholder="Masukan Periode Tanggal Agenda" id="reservation">             
              </div>
                          <div class="modal-footer">
                <button type="submit" name="cetak_tgl_msk" class="btn btn-info"><i class="fa fa-print"></i> CETAK</button>
            </div> 
            </div>
      </form></div></div></div></div> -->



                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              <div class="col-lg-4">
              <form action='po-report.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari No PO & Kode Customer' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='po-report.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
              </div>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data PO Terima</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
                    $query1="select * from po_terima";
                    
                    if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT * FROM  po_terima 
	               where nopo like '%$qcari%'
	               or kd_cus like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>No PO </i></center></th>
                        <th><center>Customer </center></th>
                        <th><center>Produk </center></th>
                        <th><center>Tanggal </center></th>
                        <th><center>Color </center></th>
                        <th><center>Size </center></th>
                        <th><center>Qty </center></th>
                        <th><center>Total </center></th>
                        <th><center>Tools</center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><?php echo $data['nopo'];?></td>
                    <td><a href="detail-customer.php?hal=edit&kd=<?php echo $data['kd_cus'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['kd_cus'];?></td>
                    <td><a href="detail-produk.php?hal=edit&kd=<?php echo $data['kode'];?>"><span class="glyphicon glyphicon-tag"></span> <?php echo $data['kode'];?></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
                    <td><center><?php echo $data['color'];?></center></td>
                    <td><center><?php echo $data['size'];?></center></td>
                    <td><center><?php echo $data['qty'];?></center></td>
                    <td>Rp. <?php echo number_format($data['total'],2,",",".");?></td>
                    <td><center><div id="thanks"><a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Cetak PO" href="cetak-po.php?hal=cetak&kd=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-print"></span></a> </div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               <!-- <div class="text-right">
                  <a href="input-po-terima.php" class="btn btn-sm btn-warning">Tambah Produk <i class="fa fa-arrow-circle-right"></i></a>
              
                </div>-->
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script src="../assets/dist/jquery.js"></script>
        <script src="../assets/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/js/jquery-ui.core.js" type="text/javascript"></script>
        <script src="../assets/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../assets/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../assets/js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../assets/js/AdminLTE/demo.js" type="text/javascript"></script>


        <!-- jQuery 3 -->
<script src="../assets/js/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="../assets3/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../assets3/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->

<script src="../assets3/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets3/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- FastClick -->
<script src="../assets3/bower_components/fastclick/lib/fastclick.js"></script>

<!-- Select2 -->
<script src="../assets3/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../assets3/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- date-range-picker -->
<script src="../assets3/bower_components/moment/min/moment.min.js"></script>
<script src="../assets3/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>



        <script> var loading = document.getElementById('loading');
         window.addEventListener('load',function(){
      loading.style.display="none";
    });
    </script>
    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
   <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()


    //Date picker
    $('#datepicker').datepicker({
      autoclose: true, 
      format : 'yyyy-mm-dd'
    })
    //Date range picker
    $('#reservation').daterangepicker({
      format : 'yyyy-mm-dd'
    })
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    })
</script>
</center>
</td>
</a>
        
    </body>
</html>