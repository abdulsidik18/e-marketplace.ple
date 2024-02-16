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
        <link rel="stylesheet" href="../assets4/fancybox/jquery.fancybox.min.css">
    
        


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
$logout_redirect_url = "../login.php"; // Set logout URL

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
                        Konfirmasi
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Konfirmasi</a></li>
                        <li class="active">Konfirmasi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php
            $kd = $_GET['kode'];
			$sql = mysqli_query($koneksi, "SELECT * FROM konfirmasi WHERE id_kon='$kd'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: konfirmasi.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['update'])){
				$id_kon	        = $_POST['id_kon'];
				$nopo	        = $_POST['nopo'];
				$kd_cus	        = $_POST['kd_cus'];
				$bayar_via      = $_POST['bayar_via'];
        $biaya_kirim      = $_POST['biaya_kirim'];
				$tanggal        = $_POST['tanggal'];
                $jumlah         = $_POST['jumlah'];
                //$bukti_transfer = $_POST['bukti_transfer'];
                $status         = $_POST['status'];
				
				$update = mysqli_query($koneksi, "UPDATE konfirmasi SET status='$status' WHERE id_kon='$id_kon'") or die(mysqli_error());
				if($update){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			//if(isset($_GET['pesan']) == 'sukses'){
			//	echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			//}
			?>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Konfirmasi Pembayaran </h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID Konfirmasi</label>
                              <div class="col-sm-8">
                                  <input name="id_kon" type="text" id="id_kon" value="<?php echo $row['id_kon']; ?>" class="form-control" autocomplete="off" readonly style="width: 50px"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No PO</label>
                              <div class="col-sm-3">
                            <input name="nopo" type="text" id="nopo" value="<?php echo $row['nopo']; ?>" class="form-control" autocomplete="off" readonly style="width: 166px"/>
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Pelanggan</label>
                              <div class="col-sm-3">
                            <input name="kd_cus" type="text" id="kd_cus" value="<?php echo $row['kd_cus']; ?>" class="form-control" autocomplete="off" readonly style="width: 166px" />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Metode Pembayaran</label>
                              <div class="col-sm-3">
                            <input name="bayar_via" type="text" id="bayar_via" value="<?php echo $row['bayar_via']; ?>" class="form-control" autocomplete="off" readonly style="width: 166px"/>
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Desa</label>
                              <div class="col-sm-3">
                            <input name="nama_desa" type="text" id="nama_desa" value="<?php echo $row['nama_desa']; ?>" class="form-control" autocomplete="off" readonly style="width: 166px"/>
                              
                            </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Biaya Kirim</label>
                              <div class="col-sm-3">
                            <input name="biaya_kirim" type="text" id="biaya_kirim" value="<?php echo number_format( $row['biaya_kirim'],2,",","."); ?>" class="form-control" autocomplete="off" readonly style="width: 106px"/>
                              
                            </div>
                          </div>


                    
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Pembayaran</label>
                              <div class="col-sm-3">
                            <input name="tanggal" type="text" id="tanggal" value="<?php echo $row['tanggal']; ?>" class="form-control" autocomplete="off" readonly style="width: 145px"/>
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Pembelian Produk</label>
                              <div class="col-sm-3">
                            <input name="jumlah" type="text" id="jumlah" value="<?php echo number_format( $row['jumlah'],2,",","."); ?>" class="form-control" autocomplete="off" readonly style="width: 106px"/>
                              
                            </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Total Pembelian</label>
                              <div class="col-sm-3">
                            <input name="total" type="text" id="total" value="<?php echo number_format( $row['total'],2,",","."); ?>" class="form-control" autocomplete="off" readonly style="width: 106px"/>
                              
                            </div>
                          </div>


                          <div class="form-group" id="galeri">
                              <label class="col-sm-2 col-sm-2 control-label">Bukti Transfer</label>
                              <div class="col-sm-3">
                                <div></div>
                               <a href="<?php echo $row['bukti_transfer']; ?>" width="150" height="200" style="border: 2px solid #666;"/> <img src="<?php echo $row['bukti_transfer']; ?>" width="150" height="200" style="border: 2px solid #666;"/> </a>
                            </div>
                          </div>
                      
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-3">
                            <select id="status" name="status" class="form-control" autofocus required style="width: 326px">
                            <option> -- Pilih Status -- </option>
                            <option value="Bayar">Sudah di Bayar</option>
                            <option value="Belum">Belum di Bayar</option>
                            </select>
                              
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label" style="width: 230px">Status Sebelumnya : </label>
                            <div class="col-sm-3">
                            <?php
                            if($row['status'] == 'Bayar'){
								echo '<span class="label label-success">Sudah di Bayar</span>';
							}
                            else if ($row['status'] == 'Belum' ){
								echo '<span class="label label-danger">Belum di Bayar</span>';
							}
                    ?>
                            
                            </span>
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="konfirmasi.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
          		</div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


  
        <script src="../assets/dist/jquery.js"></script>
        
  <script src="../assets4/fancybox/jquery.fancybox.min.js"></script>
  <script>
    $(function(){
      $('#galeri a').fancybox();
    });
  </script>
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
    
  
    </body>
</html>
