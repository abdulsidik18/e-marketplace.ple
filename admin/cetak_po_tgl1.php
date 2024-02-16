<?php       
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TOKO ONLINE | PRINT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets3/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets3/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets3/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets3/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">


<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> TOKO ONLINE, Inc.
            <small class="pull-right"><div id="clock"></div><div id="date"></div></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row">
        <div class="col-xs-12">
          <h3><strong>Laporan Penjualan Perbulan</strong></h3><br>
 
        </div>
        <!-- /.col -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped" border="1">
            <thead>
            <tr>
            <th>No.</th>
            <th>Id PO</th>
            <th>customer</th>
            <th>No telpon</th>
            <th>Produk</th>
            <th>Size</th>
            <th>Color</th>
            <th>Qty</th>
            <th>tanggal beli</th>
            <th>price</th>
            <th>status</th>
            <th>Jumlah</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                             <?php
                             include "../conn.php";
                             $tgl = $_POST['tanggal'];
                             $pecah = explode(" - ", $tgl);
                             $tglawal = $pecah[0];

                             $pecahLagi = explode("/", $tglawal);
                             $ddAwal  = $pecahLagi[1];
                             $mmAwal  = $pecahLagi[0];
                             $yyAwal  = $pecahLagi[2];
                             $tglawalFix = $yyAwal."-".$mmAwal."-".$ddAwal;

                             $tglAkhir = $pecah[1];
                             $pecahLagiAkhir = explode("/", $tglAkhir);
                             $ddAkhir  = $pecahLagiAkhir[1];
                             $mmAkhir  = $pecahLagiAkhir[0];
                             $yyAkhir  = $pecahLagiAkhir[2];
                             $tglAkhirFix = $yyAkhir."-".$mmAkhir."-".$ddAkhir;
?>  
                        <strong><?php     echo"PERIODE PENJUALAN : ".$tglawalFix." s/d ".$tglAkhirFix."";?></strong>

                        <?php 



        $query1 ="SELECT customer.*,produk.*,po.*,po_terima.total as jml_jual,po_terima.* FROM po_terima
            INNER JOIN customer ON po_terima.kd_cus=customer.kd_cus
            INNER JOIN po  ON po.nopo=po_terima.id
            INNER JOIN produk ON po_terima.Kode=produk.kd WHERE po_terima.tanggal BETWEEN '$tglawalFix' AND '$tglAkhirFix'";

            $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
            $no = 1;
            $total=msqli_num_rows($tampil);
            while ($baris = mysqli_fetch_array($tampil)) {
             ?>

             <td><?php echo $no++; ?></td>
             <td><?php echo $baris['nopo']; ?></td>
             <td><?php echo $baris['kd_cus']; ?></td>
             <td><?php echo $baris['Kode']; ?></td>
             <td><?php echo $baris['tanggal']; ?></td>
             <td><?php echo $baris['color']; ?></td>
             <td><?php echo $baris['size']; ?></td>
             <td><?php echo $baris['qty']; ?></td>
             <td><?php echo $baris['status']; ?></td>
             <td><?php echo $baris['no_telp']; ?></td>
              <td><?php echo $baris['price']; ?></td>
             <td><?php echo $baris['total']; ?></td>
             
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-9">

        </div>
        <!-- /.col -->
        <div class="col-xs-3">
          <div class="table-responsive">
          <table class="table">  
          <tr>
          <td style="width: 50%"><strong>TERTANDA,</strong></td>

</tr>
          <tr>
            <th>&nbsp;</th>
          </tr>
          <tr>
          <th><strong>
                      <?php
              echo $_SESSION['username'];
            ?></strong></th>
            </tr>
          </table>
               </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
<script type="text/javascript" src="../assets/jam.js">
            function showTime() {
                var a_p = "";
                var today = new Date();
                var curr_hour = today.getHours();
                var curr_minute = today.getMinutes();
                var curr_second = today.getSeconds();
                if (curr_hour < 12) {
                    a_p = "AM";
                } else {
                    a_p = "PM";
                }
                if (curr_hour == 0) {
                    curr_hour = 12;
                }
                if (curr_hour > 12) {
                    curr_hour = curr_hour - 12;
                }
                curr_hour = checkTime(curr_hour);
                curr_minute = checkTime(curr_minute);
                curr_second = checkTime(curr_second);
                document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
            }
             
            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
            setInterval(showTime, 500);         
        </script>
        <script>
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
             
            document.getElementById("date").innerHTML =" " + day + " " + months[month];
        </script>