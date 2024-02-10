<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
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
    
	<?php include "header.php"; ?>
	
	<!-- start: Slider -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-notes-2 ico-white"></i>Profil Kantor Pulau</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: 
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main herounit for a primary marketing message or call to action -->
            
            <blockquote style="font-size: medium;">
              <p><b><strong>PROFIL KAMI : </b></p></strong>
              <center> <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM profil ORDER BY id DESC limit 6");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
		<img width=500 height=300 src="admin/<?php echo $data['gambar']; ?>" /></center>
					<?php
		//menampilkan 5 buku tamu terbaru
		$res = $koneksi->query("SELECT * FROM profil ORDER BY id DESC LIMIT 5") or die($koneksi->error);
		
		if($res->num_rows){
			while($row = $res->fetch_assoc()){
				echo '
					<tr>
						<td width="1000">'.$row['content'].'</td>
					</tr>
					
				</table>
				';
			}
		}else{
			echo 'Belum ada komentar';
		}
		
		?>
	</div>
	  <?php }?>
</div>
</div>         
        
</blockquote>
</div>
			
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
<script defer src="assets/js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>