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
        <link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.min.css"/> <!-- Load file css jquery-ui -->
        
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
<!-- Load file css jquery-ui -->
        <script src="../assets2/js/jquery.min.js"></script>

           <!-- FONTAWESOME STYLES-->
    <link href="../assets1/css1/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
 
     <!-- GOOGLE FONTS-->
    <link href='../assets1/http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--FOR TABLE -->
    <link href="../assets1/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="../assets1/js/jquery.js"></script>
    <script src="../assets1/js/bootstrap.min.js"></script>
    <script src="../assets1/js/bootbox.min.js"></script>

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
                        Transaksi
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Purchase Order</a></li>
                        <li class="active">Data Transaksi</li>
                    </ol>
                </section>

                <!-- Main content -->
               <section class="content">

                  <div class="row mt">
  <div class="col-lg-12">
     <div class="form-panel" style="width:50%;">
        <!--<h4 class="mb"><span class='glyphicon glyphicon-briefcase'></span> Laporan Perbulan  
        </h4> -->
 <div class="row">
 

        </div>
    

     </div>
  </div>
</div>

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



                  
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Laporan Transaksi Per Periode </h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
              

    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />
           <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                $query = "SELECT YEAR(tanggal) AS tahun FROM pelanggan GROUP BY YEAR(tanggal)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>

        <button type="submit" class="btn btn-sm btn-danger"><b>Tampilkan<b></button>
       <a href="customer.php" class="btn btn-sm btn-danger"><b>Batal </b></a>
        <a href="cetak_pelanggan_tgl.php">Reset Filter</a>
    </form>
    <hr />

    <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tanggal = date('d-m-y', strtotime($_GET['tanggal']));

            echo '<b>Data Transaksi Tanggal '.$tanggal.'</b><br /><br />';
            echo '<a href="print2.php?filter=1&tanggal='.$_GET['tanggal'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT * FROM pelanggan WHERE DATE(tanggal)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
            echo '<a href="print2.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT * FROM pelanggan WHERE MONTH(tanggal)='".$_GET['bulan']."' AND YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';
            echo '<a href="print2.php?filter=3&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT * FROM pelanggan WHERE YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Semua Data Transaksi</b><br /><br />';
        echo '<a href="">Cetak PDF</a><br /><br />';

        $query = "SELECT * FROM pelanggan ORDER BY tanggal"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }
    ?>
    <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>

                        <th><center>Kode </center></th>
                        <th><center>Tanggal</center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>No Telepon </center></th>
                        <th><center>Username</center></th>
                        <th><center>Password </center></th>
                   
    </tr>
                </thead>
                <tbody>

    <?php
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            $tanggal = date('d-m-Y', strtotime($data['tanggal'])); // Ubah format tanggal jadi dd-mm-yyyy

            echo "<tr>";
            echo "<td>".$data['kd_cus']."</td>";
            echo "<td>".$data['tanggal']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['alamat']."</td>";
            echo "<td>".$data['no_telp']."</td>";
            echo "<td>".$data['username']."</td>";
            echo "<td>".$data['password']."</td>";
           
            echo "</tr>";
        }
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
    }
    ?>
    <?php ?>
      </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   
    </tbody>
                        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
  </script>
                   </tbody>
                   
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
  

   <!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
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
        <!-- daterangepicker -->
        <script src="../assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
              <script src="../assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
     
        <script src="../plugin/jquery-ui/jquery-ui.min.js"></script>
    <script src="../assets2/plugin/jquery-ui/jquery-ui.min.js"></script>
    <script src="../assets2/jam.js"></script>

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

    </body>
</html>


