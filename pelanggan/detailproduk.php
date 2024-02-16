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
	<link href='../img/icons/favicon.ico' rel='shortcut icon'>

	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->


    <!-- start: CSS --> 
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../assets/css/style.css" rel="stylesheet">

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

				<h2><i class="ico-stats ico-white"></i>Produk Details</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	
      		<!-- start: Row -->
            
      		<div class="row">
            <div class="col-sm-6">
                    <?php                  
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
?>
        		<!--<div class="span4">-->
          			<!--<div class="icons-box">-->
                    <div class="hero-unit1"  style="margin-left: 20px;">
                   <center>
				   <table>
                        <tr>
                          <td width="13" rowspan="7">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="5"><div class="title">
                            <h2><?php echo $data['nama']; ?></h2>
                          </div></td>
                        </tr>
                        <tr>
                          <td width="216" rowspan="5" ><img src="../admin/<?php echo $data['gambar']; ?>"  style=" width:200px; height:200px; /></style>
                          <td width="6" rowspan="4" >                        </tr>
  <td width="120"  size="200"><h4><strong> Harga</strong></h4></td>
      <td width="48" ><h4 align="left">:</h4></td>
    <td width="456"><div>
      <h4><strong>Rp.<?php echo number_format($data['harga'],2,",",".");?></strong></h4>
    </div></td>
  </tr>
  <tr>
    <td height="46" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><h4><strong> Stock</strong></h4></td>
    <td ><h4 align="left">:</h4></td>
    <td><div>
      <h4>
        <?php if ($data['stok'] >= 1){
	                           echo '<strong style="color: blue;">In Stock (Tersedia)</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Out Of Stock (Kosong)</strong>';	
                                }; ?>
      </h4>
    </div></td>
  </tr>
  <!--<tr>
                        <td></td>
                        <td><h3>Satuan</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php //echo $data['br_satuan']; ?></h3></div></td>
                        </tr>-->
  <tr>
    <td height="22"><h4> <strong>Keterangan</strong></h4></td>
    <td ><h4 align="left">:</h4></td>
    <td rowspan="2"><div>
      <h4 align="justify"><?php echo $data['keterangan']; ?></h4>
    </div></td>
  </tr>
  <tr>
    <td height="104"><h4 align="justify">&nbsp;</h4>      </td>
    <td ><h4 align="left">&nbsp;</h4></td>
    </tr>
  <!--	<p>
						
						</p> -->
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
	<td><div class="clear"> <a href="addtocart.php?kd=<?php echo $data['kode']; ?>" class="btn btn-lg btn-success">Beli</a></div></td>
                        </tr>
                      </table>
                    </center> 
                    </div>
                    <!--</div> -->
        		<!--</div> -->
<!---->
      		</div>
			<!-- end: Row -->
					
					
				</div>	
				
					
				</div>
				
                </div>
			</div>
			<!--end: Row-->
	
		</div>
		<!--end: Container-->
				
		<!--start: Container -->
    	<div class="container">	
      		
			<hr>
		
			<!-- start Clients List 
			<div class="clients-carousel">
		
				<ul class="slides clients">
					<li><img src="img/logos/1.png" alt=""/></li>
					<li><img src="img/logos/2.png" alt=""/></li>	
					<li><img src="img/logos/3.png" alt=""/></li>
					<li><img src="img/logos/4.png" alt=""/></li>
					<li><img src="img/logos/5.png" alt=""/></li>
					<li><img src="img/logos/6.png" alt=""/></li>
					<li><img src="img/logos/7.png" alt=""/></li>
					<li><img src="img/logos/8.png" alt=""/></li>
					<li><img src="img/logos/9.png" alt=""/></li>
					<li><img src="img/logos/10.png" alt=""/></li>		
				</ul>
		
			</div>
			end Clients List -->
		
			
		
		</div>
		<!--end: Container-->	

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
						<a href="#"><img src="../img/logo1.png" alt="logo" /></a>
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


</body>
</html>	