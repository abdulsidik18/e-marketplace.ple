<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
    <title>E-COMMERCE | Tanaman Florikultura </title> 
	<link href='img/icons/favicon.ico' rel='shortcut icon'>

	<!-- end: Meta -->
	

    <!-- start: CSS --> 
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">

	<!-- end: CSS -->

</head>
<body>
    
	<?php include "header2.php"; ?>
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-user ico-white"></i>Registrasi Pelanggan Baru</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">

			<!-- start: Table -->
            <?php
            include "conn.php";
            	if(isset($_POST['input'])){
				 $nama       = $_POST['nama'];
		         $alamat     = $_POST['alamat'];
		         $no_ktp	 = $_POST['no_ktp'];
                 $no_telp    = $_POST['no_telp'];   
                 $e_mail     = $_POST['e_mail'];
                 $username   = $_POST['username'];
                 $password1  = $_POST['password'];
                 $password   = sha1($password1);
                 $kd_cus     = date("YmdHis");
                 $tanggal = date('Y-m-d');
				
                
				$cek = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE username='$username'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO pelanggan (kd_cus, nama, alamat, e_mail, no_telp, no_ktp, username, password, tanggal) VALUES ('$kd_cus', '$nama', '$alamat','$no_telp','$no_ktp','$e_mail','$username', '$password','$tanggal')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button"  class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Member Sudah Ada..!</div>';
				}

				
			} ?> 

                 <div class="table-responsive">
                 <div class="title"><h3>Form Registrasi</h3></div>
                 <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!
                 <p></p> Setelah form terisi selanjutnya Login sebagai Pelanggan !</div>
    <form role="formku" id="formku" method="post" action="">
    <table class="table table-hover">
    <tr>
        <td><label for="nama">Nama</label></td>
        <td><input name="nama" type="text" class="required" minlength="3" placeholder="Masukan Nama" id="nama" size="200" style="width: 236px;" /></td>
      </tr>
      <tr>
        <td><label for="no_ktp">NIK </label></td>
        <td><input name="no_ktp" type="digits" class="required" minlength="5" id="no_ktp" placeholder="Masukan NIK" style="width: 159px;" /></td>
    </tr>
      <tr>
        <td><label for="alamat">Alamat</label></td>
        <td><input name="alamat" type="text" class="required"  minlength="5" id="alamat" placeholder="Masukan Alamat" style="width: 390px;" /></td>
      </tr>
      <tr>
        <td><label style="right: 20px" for="no_telp">No Telepon</label></td>
        <td><input name="no_telp" type="digits" class="required" minlength="12"  placeholder="Masukan No Telepon" id="no_telp" style="width: 140px;" /></td>
      </tr>
      <tr>
        <td><label for="e_mail">Email</label></td>
        <td><input name="e_mail" type="email" class="required" minlength="5" id="e_mail" placeholder="Masukan Email" style="width: 236px;" /></td>
      </tr>
      <tr>
        <td><label for="username">Username</label></td>
        <td><input name="username" type="text" class="required" id="username" placeholder="Masukan Username" style="width: 120px;" /></td>
      </tr>
      <tr>
        <td><label for="password">Password</label></td>
        <td><input name="password" type="password" class="required" id="password" style="width: 506px;"  placeholder="Masukan Password"/></td>
      </tr>					

      <td></td>
        <td><input type="submit" value="Simpan" name="input" id="input" class="btn btn-sm btn-success"/>&nbsp;<a href="index.php" class="btn btn-sm btn-warning">Kembali</a></td>
        </tr>
    </table>
    </form>
                   </div>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						<a href="#"><img src="img/logo1.png" alt="logo" /></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">

							<li><a href="#">E-Commerce Tanaman Florikultura</a></li>

							


						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<?php include "footer.php"; ?>

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery-1.8.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/flexslider.js"></script>
<script src="assets/js/carousel.js"></script>
<script src="assets/js/jquery.cslider.js"></script>
<script src="assets/js/slider.js"></script>
<script def src="assets/js/custom.js"></script>

<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
    
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>
<!-- end: Java Script -->

</body>
</html>