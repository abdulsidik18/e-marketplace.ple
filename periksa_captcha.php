<!DOCTYPE html>
<html>
<head>
	 <title>E-COMMERCE | Tanaman Florikultura </title> 
     <link href='img/icons/favicon.ico' rel='shortcut icon'>
	 <link href="assets/css/style1.css" type="text/css" rel="stylesheet">
	
</head>
<body>
	<div class="kotak">	
		<?php
		session_start();
		if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
			header("location:index3.php?pesan=salah");
		}else{		
			echo "<p>Captcha Anda Benar</p>";
			header("location:register.php?pesan=salah");

		}
		?>
	</div>
</body>
</html>
