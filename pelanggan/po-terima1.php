<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksidb.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Pelanggan</title>
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

         <!-- FONTAWESOME STYLES-->
    <link href="../assets1/css1/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
 
     <!-- GOOGLE FONTS-->
    <link href='../assets1/http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--FOR TABLE -->
    <link href="../assets1/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="../assets1/js/jquery.js"></script>
 
    <script src="../assets1/js/bootbox.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <div id="loading"></div>
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Pelanggan
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
$logout_redirect_url = "../index.html"; // Set logout URL

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
                    <?php include "menu.php"; ?>
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
                    <?php
             if(isset($_GET['hal']) == 'hapus'){
                $kode = $_GET['kd'];
                $cek = mysqli_query($koneksi, "SELECT * FROM po_terima1 WHERE id='$kode'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else {
                    $delete = mysqli_query($koneksi, "DELETE FROM po_terima1 WHERE id='$kode'");
                    if($delete){
                        echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                    }
                }
            }

            ?>


<?php
             if(isset($_GET['kd']) == 'hapus'){
                $kd_cus = $_GET['kd'];
                $cek = mysqli_query($koneksi, "SELECT * FROM konfirmasi1 WHERE id_kon='$kd_cus'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else{
                    $delete = mysqli_query($koneksi, "DELETE FROM konfirmasi1 WHERE id_kon='$kd_cus'");
                    if($delete){
                        echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                    }
                }
            }
            ?>

                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Purchase Order</a></li>
                        <li class="active">Data PO Terima</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              <div class="col-lg-4">
              <form action='po-terima1.php' method="POST">
          
	       <!--<input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari No PO & Kode Customer' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='po-terima.php' class="btn btn-sm btn-success" >Refresh</i></a>-->
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
                    $kodeku = $_SESSION['user_id'];
                    $query1="select * from po_terima1 where kd_cus='$kodeku'";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    $no = 1;
                    ?>
                  <table class="table table-bordered table-hover datatab">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>No PO</i></center></th>
                        <th><center>Kode Produk </center></th>
                        <th><center>Tanggal </center></th>
                        <th><center>Warna </center></th>
                        <th><center>Ukuran </center></th>
                        <th><center>Qty </center></th>
                        <th><center>Total </center></th>
                        <th><center>Tools </center></th>
                      </tr>
                  </thead>
                    <tbody>
                          <?php 
                     while($data=mysqli_fetch_array($hasil))
                    { ?>
          <td><center><?php echo $no++; ?></center></td>
                    <td><center><?php echo $data['nopo'];?></center></td>
                    <td><center><?php echo $data['kode'];?></center></td>
                    <td><center><?php echo $data ['tanggal'];?></center></td>  
                    <td><center><?php echo $data['color'];?></center></td>
                    <td><center><?php echo $data['size'];?></center></td>
                    <td><center><?php echo $data['qty'];?></center></td>
                    <td><center>Rp. <?php echo number_format($data['total'],2,",",".");?></center></td>
                    <td><center><div id="thanks"><a class="btn btn-sm btn-info" data-placement="bottom" data-toggle="tooltip" title="Cetak Invoice" href="cetak-po.php?hal=cetak&kd=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-print"></span></a> 
                    <a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Status PO" href="status-po.php?hal=status&kd=<?php echo $data['nopo'];?>"><span class="glyphicon glyphicon-tag"></span></a> 
                    <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit PO Terima" href="edit-po-terima.php?hal=edit&kode=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
                   <!-- <a onclick="return confirm ('Yakin hapus PO <?php echo $data['id'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus PO Terima" href="index1.php?hal=hapus&kd=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></center></td></tr></div>-->

                    </div></center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                             <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
  </script>
       <!-- </div>-->
       </div> 
                        </section><!-- right col -->

   <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-12 connectedSortable"> 
                        <div class="panel panel-info">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-tag"></span> Konfirmasi Pembayaran </h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                            <?php
             if(isset($_GET['hal']) == 'hapus'){
                $id_kon = $_GET['kd'];
                $cek = mysqli_query($koneksi, "SELECT * FROM konfirmasi1 WHERE id_kon='$id_kon'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else{
                    $delete = mysqli_query($koneksi, "DELETE FROM konfirmasi1 WHERE id_kon='$id_kon'");
                    if($delete){
                        echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                    }
                }
            }
            ?>
                    <?php
                    $kd = $_SESSION['user_id'];
                    $query3="select * from konfirmasi1 where kd_cus='$kd'";
                    $hasil2=mysqli_query($koneksi, $query3) or die(mysqli_error());
                     $no = 1;
                    ?>
               <table class="table table-bordered table-hover datatab">
                  <thead>
                      <tr>
                        <th><center>ID </center></th>
                        <th><center>No PO</i></center></th>
                        <th><center>Kode Pelanggan </center></th>
                        <th><center>Pembayaran</center></th>
                        <th><center>Tanggal </center></th>
                        <th><center>Jumlah </center></th>
                        <th><center>Status</center></th>
                        <th><center>Tools </center></th>
                      </tr>
                  </thead>
                    <tbody>
                        <?php 
                     while($data2=mysqli_fetch_array($hasil2))
                    { ?>
              
                    <td><center><?php echo $data2['id_kon'];?></center></td>
                    <td><center><?php echo $data2['nopo'];?></center></td>
                    <td><center><?php echo $data2['kd_cus'];?></center></td>
                    <td><center><?php echo $data2['bayar_via'];?></center></td>
                    <td><center><?php echo $data2['tanggal'];?></center></td>
                    <td><center>Rp. <?php echo number_format($data2['jumlah'],2,",",".");?></center></td>
                    <td><center><?php
                            if($data2['status'] == 'Bayar'){
								echo '<span class="label label-success">Sudah di Bayar</span>';
							}
                            else if ($data2['status'] == 'Belum' ){
								echo '<span class="label label-danger">Belum di Bayar</span>';
							}
                    
                    ?>
                    
                    </center></td>
                    <td><center><div id="thanks"><a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Detail Pembayaran" href="detail-konfirmasi.php?hal=detail&kd=<?php echo $data2['id_kon'];?>"><span class="glyphicon glyphicon-search"></span></a> 
                    <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Konfirmasi Pembayaran" href="edit-konfirmasi1.php?hal=edit&kode=<?php echo $data2['id_kon'];?>"><span class="glyphicon glyphicon-edit"></span></a>
                     <a onclick="return confirm ('Yakin hapus Pembayaran <?php echo $data2['id_kon'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Pembayaran" href="index1.php?hal=hapus&kd=<?php echo $data2['id_kon'];?>"><span class="glyphicon glyphicon-trash"></span></a> -->
  
                    </div></center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                             <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
  </script>
                  <!-- </div>-->
              </div> 
                        </section><!-- right col -->
		
               
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
        
        <!-- Morris.js charts -->
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
        <script> var loading = document.getElementById('loading');
    window.addEventListener('load',function(){
      loading.style.display="none";
    });
    </script>
        
  <!-- METISMENU SCRIPTS -->
    <script src="../assets1/js/jquery.metisMenu.js"></script>
    <!--DATA TABLE-->
    <script src="../assets1/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets1/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
      $(document).ready(function () {
        $('#tabelku').dataTable();
      });
    </script>
    <script>
    $(document).on("click", "#alertHapus", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      bootbox.confirm("Lanjutkan Menghapus!", function(confirmed){
        if (confirmed) {
          window.location.href = link;
        };
      });
    });
    </script>
    <script src="../assets1/js/custom.js"></script>
        
    </body>
</html>

