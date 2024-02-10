<?php<?php
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
    font-size: 14px;
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
        </div>
    </nav>
    
    <div class="container" style="margin-top: 50px">
        <h1>Komentar!</h1>
        <hr />
        <?php
		//menampilkan data buku tamu
		$res = $koneksi->query("SELECT * FROM testimonial ORDER BY nama DESC") or die($koneksi->error);
		
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
			echo 'Belum ada Komentar';
		}
		
		?>


        <!--start: Container -->
        <div class="container"> 
            
            <hr>
        
                    
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
