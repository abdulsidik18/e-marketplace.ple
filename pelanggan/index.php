<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>E-COMMERCE | Tanaman Florikultura </title> 
    <link href='../img/icons/favicon.ico' rel='shortcut icon'>
	<!-- end: Meta -->


    <!-- start: CSS --> 
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/dist/css/style.css" rel="stylesheet" >
	   <link rel="stylesheet" href="../assets4/fancybox/jquery.fancybox.min.css">

	<!-- end: CSS -->

  <script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);  
function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>
<script language="JavaScript">
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
}
</script>
<style type="text/css">
	.box{
		border: 2px solid #fff;
		box-shadow: 0 0 5px #ccc;
		z-index: 10;
		
		position: absolute;
		width: 200px;
		height: 300px;
		top: 50px;
		left: 30px;
	}
	.close{
		width: 15px;
		height: 15px;
		background: url(../images/close.png) no-repeat;
		cursor: pointer;
		position: absolute;
		right: 5px;
		top: 5px;
		
		border-radius: 50%;
	}
	#content{
		width: 940px;
		margin: 0 auto;
	}
	img{
		width: 100%;
	}
</style>
<script type="text/javascript" src="../js1/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$('document').ready(function(){
		var top = parseInt($('.box').css('top'));
		var posY = top;
		
		$('.close').click(function(){
			$('.box').fadeOut(500);
		});	
		$(window).scroll(function(){
			$('.box').clearQueue();
			
			posY = top + $(this).scrollTop(); 
			$('.box').animate({'top' : posY},500);
		});
	});
</script>

<style type="text/css">
	.gelembung{
		position: absolute;
		top: 0;
		border: 2px solid #888;
		border-radius: 50%;
		z-index: 10;
	}
</style>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$('document').ready(function(){
		var top;
		
		$(window).mousemove(function(e){
				var mouseX = e.pageX;
				var mouseY = e.pageY;
				var width = Math.random() * 25 + 5;
				var height =  width;
					
					$('<div class="gelembung"></div>').appendTo('body')
						.css({'left': mouseX, 'top': mouseY, 'width': width, 'height': height});
		
					
					$('.gelembung').each(function(){						
						top = parseInt($(this).css('top'));
						$(this).animate({'top': top - (Math.random() * 200 + 50)},Math.random()* 600 + 400,function(){
							$(this).remove();
						});
					});				
		});
	});
</script>
	<style type="text/css">
		#to-top{
			display: none;
			width: 30px;
			height: 30px;
			position: fixed;
			right: 40px;
			bottom: 40px;
			background: url(../images/up.png) no-repeat;
			border: 2px solid #fff;
			border-radius: 50%;
		}
	</style>
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(window).scroll(function(){
				if($(this).scrollTop() > 200){
					$('#to-top').fadeIn();
				}else{
					$('#to-top').fadeOut();
				}
			});
			$('#to-top').click(function(){
				$('html, body').animate({scrollTop:0},600);
				return false;
			});
		});
	</script>
</head>
<body>
    
	<?php include "header.php"; ?>
	<div id="loading"></div>
	
	<!-- start: Slider -->
	<div class="slider-wrapper">

	<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2>E-COMMERCE | Tanaman Florikultura</h2>
				<p>Kami melayani pesanan Tanaman Florikultura untuk kebutuhan hiasan halaman dirumah anda dan bisa diantar langsung ketempat anda. </p>
				<a href="florikultura.php" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="../img/parallax-slider/shop.png" alt="image01" /></div>
			</div>
			<div class="da-slide">
				<h2>Belanja Yuk</h2>
				<p>Semakin Anda banyak berbelanja dan akan mendapatkan bonus pengantaran barang yang telah dipesan diantar oleh helper Kantor Pulau dengan ongkos antar GRATIS.</p>
				<a href="utility.php" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="../img/parallax-slider/belanja.png" alt="image03" /></div>
				
			</div>
			<div class="da-slide">
				<h2>E-Commerce</h2>
				<p>E-Commerce kantor pulau, kec. arut sel, kabupaten kotawaringin barat, kalimantan tengah banyak mempunyai fasilitas seperti pemesanan online untuk mempermudah pembelian barang.</p>
				<a href="florikultura.php" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="../img/parallax-slider/portal.png" alt="image02" /></div>
			</div>
			<div class="da-slide">
				<h2>Clik</h2>
				<p>Tinggal Clik untuk melakukan pemesan dan efisien dan efektif dalam berbelanja, Hemat Uang, Transaksi Mudah, Langsung Antar. </p>
				<a href="utility.php" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="../img/parallax-slider/satu jari.png" alt="image04" /></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
		
	</div>
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<div class="hero-unit">
        		<p>
        	<table width="900">
            <tr>
            <td width="300"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
            <td align="left" width="30">/Jam:</td>
            <td align="left" width="1000"> <h4><div id="output" class="jam" ></div></h4></td>
            </tr>
            </table>


            <?php
		//menampilkan content
		$res = $koneksi->query("SELECT * FROM editor ORDER BY id DESC LIMIT 1") or die($koneksi->error);
		
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
        		<p><a class="btn btn-info btn-large" href="profil.php">Tentang &raquo;</a></p>
                                
      		</div>
            <!--<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            </div> -->
			<!-- end: Hero Unit -->

      		<!-- start: Row -->
            
      		<div class="row">
	                  <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kode DESC limit 9");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
        	<div class="span4">
          			<div class="icons-box">
          				<div id="galeri" >
                        <div  class="title"><h3><?php echo $data['nama']; ?></h3></div>
                         <a href="../admin/<?php echo $data['gambar']; ?>"><img src="../admin/<?php echo $data['gambar']; ?>" style="
    height: 250px;"/></a></style>
                         <div><h3>Rp.<?php echo number_format($data['harga'],2,",",".");?></h3></div></div>
					<!--	<p>
						
						</p> -->
						<div class="clear"><a href="detailproduk.php?kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-danger">Details</a> <a href="addtocart.php?kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>
					
                    </div>
        		</div>
                <?php   
              }
              
              
              ?>


<!---->
      		</div>
			<!-- end: Row -->
      		
		<!--	<hr>
		
		
			<hr>
			
			<!-- start: Row -->
			<div class="row">
				
				<!-- start: Icon Boxes -->
				<div class="icons-box-vert-container">

				</div>
				<!-- end: Icon Boxes -->
				<div class="clear"></div>
			</div>
			<!-- end: Row -->
			
			<hr>
			
		</div>
		<!--end: Container-->
	
	</div>
	<!-- end: Wrapper  -->	

	<div class="box" style="margin-top:30px">
		<div class="close"></div> 
		  <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM iklan ORDER BY kode DESC limit 6");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
		<img width=200 height=300 src="../admin/<?php echo $data['gambar']; ?>"  />
	</div>
	  <?php }?>
</div>
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
						<a href="#"><img src="../img/logo2.png" alt="logo" /></a>
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
<script> var loading = document.getElementById('loading');
  window.addEventListener('load',function(){
      loading.style.display="none";
    });
    </script>
<a id="to-top" href="#"></a>

<script src="../assets4/fancybox/jquery.fancybox.min.js"></script>
<script src="../assets4/fancybox/jquery.fancybox.min.js"></script>
  <script>
    $(function(){
      $('#galeri a').fancybox();
    });
  </script>

</body>
</html>