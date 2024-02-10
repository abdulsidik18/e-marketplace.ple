<?php
include("conn.php");
?>
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
    <style type="text/css">
    .konten
{
    margin-top: 20px;
    margin-left: 350px;
    margin-right: 15px;
	color: black;
	font-family: calibri;
    font-size: 20px;
    font-weight: none;	
}
.komentar
{
    position: center;
    margin-top: 20px;
    margin-left: 340px;
    margin-right: 15px;
	color: gray;
	font-family: calibri;
    font-size: 16px;
    font-weight: none;	
    border: 1px solid #;
    width: 700px;
    height: 260px;
    overflow: scroll;
}
    </style>
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
	<?php include "header.php"; ?>
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container"> 
			<h2><i class="ico-comments ico-white"></i>Komentar</h2>


			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->

	
<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container"> 
        <center><div class="title" style="margin-left: ;"><h3>Isi Testimonial untuk mendapatkan update produk terbaru kami.</h3></div></center>   
        <form  class="form-horizontal" method="post" action="testimoni.php">
        	<table style="font-style: oblique; font-weight: bold; margin-left: 140px;">
<tr>
 <td width="150">Nama</td>
<td width="30">:</td>
<td width="550"><input type="text" name="nama" size="30" class="required" minlength="3" placeholder="Nama Anda" required /></td>
</tr>
 <td width="150">Email</td>
<td width="30">:</td>
<td width="550"><input type="email" name="email" size="30" class="required" minlength="3" placeholder="Email Anda" required /></td>
</tr>
 <td width="150">Komentar</td>
<td width="30">:</td>
<td width="550"><textarea type="text" name="pesan" size="30" class="required" minlength="3" placeholder="Komentar Anda"  required/></textarea></td>
</tr>

    <tr>
<td width="150"></td>
<td width="30"></td>
<td width="550">
<br><input type="submit" name="submit" class="btn btn-primary" value="KIRIM PESAN"> 
	</td></br>
</tr>
</form>
</div>
</table>
<br> </br>

<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container"> 
        <center><div class="title" style="margin-left: ;"></div></center>   
        <form id = "formku" class="form-horizontal" method="post" action="testimoni.php">
        	<table style="font-style: oblique; font-weight: bold; margin-left: 140px;">

        <?php
        //definisikan variabel untuk tiap-tiap inputan
        $nama       = $koneksi->real_escape_string($_POST['nama']);
        $email      = $koneksi->real_escape_string($_POST['email']);
        $pesan      = $koneksi->real_escape_string($_POST['pesan']);
        $tanggal    = date('Y-m-d');
    
        
		//jika di klik tombol kirim pesan menjalankan script di bawah ini
		if($_POST['submit']){
			$input = $koneksi->query("INSERT INTO testimonial(tanggal,nama,email,pesan) VALUES('$tanggal','$nama','$email','$pesan')") or die($koneksi->error);
			if($input){
				echo '<div class="alert alert-success">Pesan anda berhasil di simpan!</div>';
			}else{
				echo '<div class="alert alert-warning">Gagal menyimpan pesan!</div>';
			}
		}
        ?>
		
		
		<?php
		//menampilkan 5 buku tamu terbaru
		$res = $koneksi->query("SELECT * FROM testimonial ORDER BY id DESC LIMIT 5") or die($koneksi->error);
		
		if($res->num_rows){
			while($row = $res->fetch_assoc()){
				echo '
				<table class=" table-condensed table-striped">

					<tr>
						<th width="150">Tanggal</th>
						<th width="10">:</th>
						<td>'.$row['tanggal'].'</td>
					</tr>
					<br>Comments</br>
					
					<tr>
						<th width="150">Nama</th>
						<th width="10">:</th>
						<td width="1000">'.$row['nama'].'</td>
					</tr>
					<tr>
						<th>Email</th>
						<th>:</th>
						<td>'.$row['email'].'</td>
					</tr>
					
					<tr>
						<th>Isi Pesan</th>
						<th>:</th>
						<td>'.$row['pesan'].'</td>
					</tr>
				</table>
				';
			}
		}else{
			echo 'Belum ada komentar';
		}
		
		?>
		<p><a class="btn btn-primary btn-sm" href="data.php">Lihat semua data</a></p>
    </div>   
    </table>

				
		<!--start: Container -->
    	<div class="container">	
      		
			<hr>
		
					
		</div>
		<!--end: Container-->	

	</div>
	<!-- end: Wrapper  -->		


 </div>
			<!-- end: Row -->
     
			
	


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
    
    <script type="text/javascript">
    x=0;
    $(document).ready(function(){
       $(".komentar").scroll(function(){
        $("span").text(x+=1);
       }); 
    });
    </script>
<!-- end: Java Script -->

</body>
</html>	